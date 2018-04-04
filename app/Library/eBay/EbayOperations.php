<?php

ini_set('max_execution_time', 3600);

class EbayOperations {

    private $newOrderCount = 0;

    public function __construct() {
        
    }

    public function downloadOrder() {
        $ebayRequest = new \EbayRequest();

        $lastEbayOrderDate = \App\Order::where('ORDER_CHANNEL', 'ebay')
                ->max('ORDER_DATE');

        if (!empty($lastAmazonOrderDate)) {
            $lastEbayOrderDate = strtotime($lastEbayOrderDate . '-1 days');
            $lastEbayOrderDate = date("Y-m-d", $lastEbayOrderDate);
        } else {
            $lastEbayOrderDate = strtotime(date("Y-m-d") . '-7 days');
            $lastEbayOrderDate = date("Y-m-d", $lastEbayOrderDate);
        }

        $request = $ebayRequest->getOrders(1, $lastEbayOrderDate, date("Y-m-d"));

        $ebayCall = new \EbayCall();
        $responseXML = $ebayCall->sendRequest($request, "GetOrders");

        try {
            $orders = new \SimpleXMLElement($responseXML);
        } catch (Exception $ex) {
            echo "getEbayOrder - " . $ex->getMessage();
            exit;
        }

        $ebayOperation = new \EbayOperations();
        if (isset($orders->PaginationResult)) {
            $ebayOperation->store($responseXML);

            $pages = $orders->PaginationResult->TotalNumberOfPages;
            for ($i = 2; $i <= $pages; $i++) {
                $request = $ebayRequest->getOrders($i, $lastEbayOrderDate, date("Y-m-d"));
                $responseXML = $ebayCall->sendRequest($request, "GetOrders");
                $ebayOperation->store($responseXML);
            }
            echo json_encode(array("results" => "success", "response" => $this->newOrderCount . " Orders Imported!"));
        } else {
            if (isset($orders->Ack) && $orders->Ack == "Failure") {
                echo json_encode(array("results" => "error", "response" => (string) $orders->Errors->LongMessage));
                exit;
            } else {
                echo json_encode(array("results" => "error", "response" => "Error Occured Please Try Again Later!"));
                exit;
            }
        }
    }

    public function store($orderXML) {
        try {
            $orders = new SimpleXMLElement($orderXML);
        } catch (Exception $ex) {
            echo "Ebay Order Store Error " . $ex->getMessage();
            exit;
        }

        if (isset($orders->OrderArray->Order)) {
            foreach ($orders->OrderArray->Order as $order) {
                $ebayOrderId = $order->OrderID;
                $ebayOrderStatus = $order->OrderStatus;
                $ebayCheckoutStatus = $order->CheckoutStatus->Status;

                $ebayOrder = array(
                    'ORDER_ID' => $ebayOrderId,
                    'ORDER_CHANNEL' => 'Ebay'
                );

                $orderCount = App\Order::where('ORDER_ID', $ebayOrderId)
                        ->where('ORDER_CHANNEL', 'Ebay')
                        ->count();

                //check order and insert
                if ($orderCount == 0) {
                    $orderId = App\Order::create($ebayOrder)->id;
                    $this->newOrderCount++;
                } else {
                    $orderResp = App\Order::where('ORDER_ID', $ebayOrderId)
                                    ->where('ORDER_CHANNEL', 'Ebay')
                                    ->select('id')->first();

                    $orderId = $orderResp->id;
                }

                $ebayShippingName = $order->ShippingAddress->Name;
                $ebayShippingStreet1 = $order->ShippingAddress->Street1;
                $ebayShippingStreet2 = $order->ShippingAddress->Street2;
                $ebayShippingCity = $order->ShippingAddress->CityName;
                $ebayShippingState = $order->ShippingAddress->StateOrProvince;
                $ebayShippingCountry = $order->ShippingAddress->Country;
                $ebayShippingCountryName = $order->ShippingAddress->CountryName;
                $ebayShippingPhone = $order->ShippingAddress->Phone;
                $ebayShippingPostalCode = $order->ShippingAddress->PostalCode;

                $ebayTransactionArray = $order->TransactionArray->Transaction;
                foreach ($ebayTransactionArray as $ebayTransaction) {
                    $itemTitle = $ebayTransaction->Item->Title;
                    $itemId = $ebayTransaction->Item->ItemID;
                    $quantity = $ebayTransaction->QuantityPurchased;
                    $transactionAmount = $ebayTransaction->TransactionPrice;
                    $buyerEmail = $ebayTransaction->Buyer->Email;

                    $orderLineItem = array(
                        'ORDER_ID' => $orderId,
                        'TITLE' => $itemTitle,
                        'ITEM_ID' => $itemId,
                        'QUANTITY' => $quantity,
                        'AMOUNT' => $transactionAmount
                    );

                    //check order line item and insert
                    $orderLineCount = App\OrderLine::where('ORDER_ID', $orderId)
                            ->where('ITEM_ID', $itemId)
                            ->count();

                    if ($orderLineCount == 0) {
                        $orderLineId = App\OrderLine::create($orderLineItem)->id;
                    }
                }

                $ebayCustomerDetail = array(
                    'ORDER_ID' => $orderId,
                    'NAME' => $ebayShippingName,
                    'STREET_1' => $ebayShippingStreet1,
                    'STREET_2' => $ebayShippingStreet2,
                    'CITY' => $ebayShippingCity,
                    'STATE' => $ebayShippingState,
                    'COUNTRY' => $ebayShippingCountry,
                    'COUNTRY_NAME' => $ebayShippingCountryName,
                    'PHONE' => $ebayShippingPhone,
                    'POSTAL_CODE' => $ebayShippingPostalCode,
                    'EMAIL' => $buyerEmail
                );

                //check customer and insert
                $customerCount = App\Customer::where('ORDER_ID', $orderId)
                        ->count();

                if ($customerCount == 0) {
                    $customerId = App\Customer::create($ebayCustomerDetail)->id;
                }
            }
            //echo $this->newOrderCount . "<br>";
        }
    }

}

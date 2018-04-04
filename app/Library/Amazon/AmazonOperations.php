<?php

ini_set('max_execution_time', 3600);

class AmazonOperations {

    private $newOrderCount = 0;

    public function __construct() {
        
    }

    public function downloadOrder() {

        $amazonRequest = new \AmazonRequest();

        $lastAmazonOrderDate = \App\Order::where('ORDER_CHANNEL', 'amazon')
                ->max('ORDER_DATE');

        if (!empty($lastAmazonOrderDate)) {
            $lastAmazonOrderDate = strtotime($lastAmazonOrderDate . '-1 days');
            $lastAmazonOrderDate = date("Y-m-d", $lastAmazonOrderDate);
        } else {
            $lastAmazonOrderDate = strtotime(date("Y-m-d") . '-7 days');
            $lastAmazonOrderDate = date("Y-m-d", $lastAmazonOrderDate);
        }

        $orderRequest = $amazonRequest->listOrderRequest($lastAmazonOrderDate);

        $amazonCall = new \AmazonCall();
        $ordersResponseXML = $amazonCall->invokeListOrders($orderRequest['service'], $orderRequest['request']);

        try {
            $ordersResponse = new SimpleXMLElement($ordersResponseXML);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        if (isset($ordersResponse->ListOrdersResult->Orders->Order)) {
            $orders = $ordersResponse->ListOrdersResult->Orders->Order;
            foreach ($orders as $order) {
                $orderId = $this->storeOrder($order);
                if ($orderId) {
                    $amazonOrderId = $order->AmazonOrderId;
                    $orderLineResponse = $this->listOrderItems($amazonOrderId);
                    $this->storeOrderLine($orderLineResponse, $orderId);
                }
            }

            if (isset($ordersResponse->ListOrdersResult->NextToken) && !empty($ordersResponse->ListOrdersResult->NextToken)) {
                $nextToken = $ordersResponse->ListOrdersResult->NextToken;
                $this->listOrdersByNextToken($nextToken);
            }

            echo json_encode(array("results" => "success", "response" => $this->newOrderCount . " Orders Imported!"));
        }
    }

    private function listOrdersByNextToken($nextToken) {
        $amazonRequest = new \AmazonRequest();
        $listOrdersByNextTokenResponse = $amazonRequest->listOrdersByNextTokenRequest($nextToken);

        $amazonCall = new \AmazonCall();
        $ordersResponseXML = $amazonCall->invokeListOrdersByNextToken($listOrdersByNextTokenResponse['service'], $listOrdersByNextTokenResponse['request']);
        try {
            $ordersResponse = new SimpleXMLElement($ordersResponseXML);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        if (isset($ordersResponse->ListOrdersByNextTokenResult->Orders->Order)) {
            $orders = $ordersResponse->ListOrdersByNextTokenResult->Orders->Order;
            foreach ($orders as $order) {
                $orderId = $this->storeOrder($order);
                if ($orderId) {
                    $amazonOrderId = $order->AmazonOrderId;
                    $orderLineResponse = $this->listOrderItems($amazonOrderId);
                    $this->storeOrderLine($orderLineResponse, $orderId);
                }
            }

            if (isset($ordersResponse->ListOrdersByNextTokenResult->NextToken) && !empty($ordersResponse->ListOrdersByNextTokenResult->NextToken)) {
                $nextToken = $ordersResponse->ListOrdersByNextTokenResult->NextToken;
                $this->listOrdersByNextToken($nextToken);
                sleep(10);
            }
        }
    }

    private function listOrderItems($amazonOrderId) {
        $amazonRequest = new \AmazonRequest();
        $listOrdersItemResponse = $amazonRequest->listOrderItemsRequest($amazonOrderId);

        $amazonCall = new \AmazonCall();
        $orderLineResponse = $amazonCall->invokeListOrderItems($listOrdersItemResponse['service'], $listOrdersItemResponse['request']);

        return $orderLineResponse;
    }

    private function storeOrder($orderResponse) {

        if (isset($orderResponse->AmazonOrderId)) {
            $amazonOrderId = (string) $orderResponse->AmazonOrderId;
            $orderDate = (string) $orderResponse->PurchaseDate;
            $orderDate = str_replace(array("T", "Z"), array(" ", " "), $orderDate);

            $amazonOrder = array(
                'ORDER_ID' => $amazonOrderId,
                'ORDER_CHANNEL' => 'Amazon',
                'ORDER_DATE' => $orderDate
            );

            $orderCount = App\Order::where('ORDER_ID', $amazonOrderId)
                    ->where('ORDER_CHANNEL', 'Amazon')
                    ->count();

            if ($orderCount == 0) {
                $orderId = App\Order::create($amazonOrder)->id;
                $this->newOrderCount++;
            } else {
                $orderIdResp = App\Order::where('ORDER_ID', $amazonOrderId)
                                ->where('ORDER_CHANNEL', 'Amazon')
                                ->select('id')->first();

                $orderId = $orderIdResp->id;
            }

            $amazonCustomerDetail = array(
                'ORDER_ID' => $orderId,
                'NAME' => (string) $orderResponse->ShippingAddress->Name,
                'STREET_1' => (string) $orderResponse->ShippingAddress->AddressLine1,
                'STREET_2' => isset($orderResponse->ShippingAddress->AddressLine2) ? (string) $orderResponse->ShippingAddress->AddressLine2 : '',
                'CITY' => (string) $orderResponse->ShippingAddress->City,
                'STATE' => (string) $orderResponse->ShippingAddress->StateOrRegion,
                'COUNTRY' => (string) $orderResponse->ShippingAddress->CountryCode,
                'COUNTRY_NAME' => '',
                'PHONE' => (string) $orderResponse->ShippingAddress->Phone,
                'POSTAL_CODE' => (string) $orderResponse->ShippingAddress->PostalCode,
                'EMAIL' => (string) $orderResponse->BuyerEmail
            );

            $customerCount = App\Customer::where('ORDER_ID', $orderId)
                    ->count();

            if ($customerCount == 0) {
                $customerId = App\Customer::create($amazonCustomerDetail)->id;
            }

            return $orderId;
        } else {
            return false;
        }
    }

    private function storeOrderLine($orderLineResponse, $orderId) {
        if (isset($orderLineResponse->ListOrderItemsResult->OrderItems->OrderItem)) {
            $listOrderItems = $orderLineResponse->ListOrderItemsResult->OrderItems->OrderItem;

            foreach ($listOrderItems as $listOrderItem) {
                $amazonItemId = (string) $listOrderItem->OrderItemId;
                $amazonItemTitle = (string) $listOrderItem->Title;
                $amazonItemPrice = (double) $listOrderItem->ItemPrice->Amount;
                $amazonItemQuantity = (int) $listOrderItem->QuantityOrdered;
                $amazonItemSKU = (string) $listOrderItem->SellerSKU;

                $amazonOrderLine = array(
                    'ORDER_ID' => $orderId,
                    'TITLE' => $amazonItemTitle,
                    'ITEM_ID' => $amazonItemId,
                    'QUANTITY' => $amazonItemQuantity,
                    'PRICE' => $amazonItemPrice,
                    'SKU' => $amazonItemSKU
                );


                $amazonOrderLineCount = App\OrderLine::where('ORDER_ID', $orderId)
                        ->where('ITEM_ID', $amazonItemId)
                        ->count();

                if ($amazonOrderLineCount == 0) {
                    $amazonrderLineId = App\OrderLine::create($amazonOrderLine)->id;
                }
            }
        }
    }

    public function requestReport() {
        $amazonRequest = new \AmazonRequest();
        $reportRequest = $amazonRequest->requestReport();

        $amazonCall = new \AmazonCall();
        echo $reportId = $amazonCall->invokeRequestReport($reportRequest['service'], $reportRequest['request']); //67349017007

        if (!empty($reportId)) {
            $this->getReportRequestList($reportId);
        } else {
            echo "error download report";
        }
    }

    private function getReportRequestList($reportId) {
        $amazonRequest = new \AmazonRequest();
        $reportRequestList = $amazonRequest->getReportRequestList($reportId);

        $amazonCall = new \AmazonCall();
        $reportRequestListResponse = $amazonCall->invokeGetReportRequestList($reportRequestList['service'], $reportRequestList['request']);

        echo $reportRequestStatus = $reportRequestListResponse['ReportRequestInfo'][0]['ReportProcessingStatus'];


        while ($reportRequestStatus != "_DONE_") {
            sleep(60);
            $this->getReportRequestList($reportId);
        }

        $generatedReportId = $reportRequestListResponse['ReportRequestInfo'][0]['GeneratedReportId'];
        $getReportRequest = $this->getReport($generatedReportId);
    }

    private function getReport($generatedReportId) {
        $amazonRequest = new \AmazonRequest();
        $getReportRequest = $amazonRequest->getReportRequest($generatedReportId);

        $amazonCall = new \AmazonCall();
        $amazonCall->invokeGetReport($getReportRequest['service'], $getReportRequest['request']);
    }

}

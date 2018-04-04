<?php

use App\Configs;

class EbayRequest {

    private $userToken;

    public function __construct() {
        $this->userToken = Configs::where('config_name', 'ebay_user_token')
                ->pluck('config_value')
                ->first();
    }

    public function getOrders($page, $startTime, $endTime) {
        $request = '<?xml version="1.0" encoding="utf-8"?>
                    <GetOrdersRequest xmlns="urn:ebay:apis:eBLBaseComponents">
                      <RequesterCredentials>
                        <eBayAuthToken>' . $this->userToken . '</eBayAuthToken>
                      </RequesterCredentials>
                      <Pagination>
                        <EntriesPerPage>100</EntriesPerPage>
                        <PageNumber>' . $page . '</PageNumber>
                      </Pagination>
                      <CreateTimeFrom>' . $startTime . '</CreateTimeFrom>
                      <CreateTimeTo>' . $endTime . '</CreateTimeTo>
                      <OrderRole>Seller</OrderRole>
                      <OrderStatus>Completed</OrderStatus>
                      <WarningLevel>High</WarningLevel>
                    </GetOrdersRequest>';

        return $request;
    }

}

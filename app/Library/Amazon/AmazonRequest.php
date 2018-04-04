<?php

class AmazonRequest {

    private $awsAccessKey;
    private $awsSecretAccessKey;
    private $applicationName;
    private $applicationVersion;
    private $merchantId;
    private $marketPlaceId;

    public function __construct() {
        $this->awsAccessKey = App\Configs::where('config_name', 'amazon_aws_access_key_id')->pluck('config_value')->first();
        $this->awsSecretAccessKey = App\Configs::where('config_name', 'amazon_secret_key')->pluck('config_value')->first();
        $this->applicationName = App\Configs::where('config_name', 'amazon_app_name')->pluck('config_value')->first();
        $this->applicationVersion = App\Configs::where('config_name', 'amazon_app_version')->pluck('config_value')->first();
        $this->merchantId = App\Configs::where('config_name', 'amazon_seller_id')->pluck('config_value')->first();
        $this->marketPlaceId = App\Configs::where('config_name', 'amazon_market_place_id')->pluck('config_value')->first();
    }

    public function listOrderRequest($createdAfter) {
        $service = $this->orderConfig();

        $request = new \MarketplaceWebServiceOrders_Model_ListOrdersRequest();
        $request->setSellerId($this->merchantId);
        $request->setMarketplaceId(array($this->marketPlaceId));
        $request->setCreatedAfter($createdAfter . "T00:00:00Z");
        $request->setOrderStatus(array("Unshipped", "PartiallyShipped"));

        return array('service' => $service, 'request' => $request);
    }

    public function listOrdersByNextTokenRequest($nextToken) {
        $service = $this->orderConfig();

        $request = new MarketplaceWebServiceOrders_Model_ListOrdersByNextTokenRequest();
        $request->setSellerId($this->merchantId);
        $request->setNextToken($nextToken);

        return array('service' => $service, 'request' => $request);
    }

    public function listOrderItemsRequest($orderId) {
        $service = $this->orderConfig();

        $request = new MarketplaceWebServiceOrders_Model_ListOrderItemsRequest();
        $request->setSellerId($this->merchantId);
        // object or array of parameters
        $request->setAmazonOrderId($orderId);
        return array('service' => $service, 'request' => $request);
    }

    public function requestReport() {
        $service = $this->reportConfig();

        $request = new MarketplaceWebService_Model_RequestReportRequest();
        $request->setMarketplaceIdList(array("Id" => array($this->marketPlaceId)));
        $request->setMerchant($this->merchantId);
        $request->setReportType('_GET_MERCHANT_LISTINGS_DATA_');
        $request->setReportOptions('ShowSalesChannel=true');

        return array('service' => $service, 'request' => $request);
    }

    public function getReportRequestList($reportId) {
        $service = $this->reportConfig();

        $request = new MarketplaceWebService_Model_GetReportRequestListRequest();
        $request->setMerchant($this->merchantId);
        $request->setMarketplace($this->marketPlaceId);
        //$request->setMWSAuthToken('<MWS Auth Token>'); // Optional
        $reportRequestIdList = new MarketplaceWebService_Model_IdList();
        $reportRequestIdList->setId($reportId);

        $request->setReportRequestIdList($reportRequestIdList);
        return array('service' => $service, 'request' => $request);
    }

    public function getReportRequest($generatedReportId) {
        $service = $this->reportConfig();

        $request = new MarketplaceWebService_Model_GetReportRequest();
        $request->setMerchant($this->merchantId);
        $request->setReport(@fopen('php://memory', 'rw+'));
        $request->setReportId($generatedReportId);

        return array('service' => $service, 'request' => $request);
    }

    private function orderConfig() {
        $config = array(
            'ServiceURL' => "https://mws.amazonservices.com/Orders/2013-09-01",
            'ProxyHost' => null,
            'ProxyPort' => -1,
            'ProxyUsername' => null,
            'ProxyPassword' => null,
            'MaxErrorRetry' => 3,
        );

        $service = new MarketplaceWebServiceOrders_Client(
                $this->awsAccessKey, $this->awsSecretAccessKey, $this->applicationName, $this->applicationVersion, $config);

        return $service;
    }

    private function reportConfig() {
        $config = array(
            'ServiceURL' => "https://mws.amazonservices.com",
            'ProxyHost' => null,
            'ProxyPort' => -1,
            'MaxErrorRetry' => 3,
        );

        $service = new MarketplaceWebService_Client(
                $this->awsAccessKey, $this->awsSecretAccessKey, $config, $this->applicationName, $this->applicationVersion);

        return $service;
    }

}

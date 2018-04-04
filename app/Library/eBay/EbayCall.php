<?php

use App\Configs;

class EbayCall {

    private $userToken;
    private $developerId;
    private $applicationId;
    private $certificateId;
    private $apiURL;
    private $siteId;
    private $compatibilityLevel;

    public function __construct() {
        $this->developerId = Configs::where('config_name', 'ebay_developer_id')->pluck('config_value')->first();
        $this->applicationId = Configs::where('config_name', 'ebay_application_id')->pluck('config_value')->first();
        $this->certificateId = Configs::where('config_name', 'ebay_certification_id')->pluck('config_value')->first();
        $this->userToken = Configs::where('config_name', 'ebay_user_token')->pluck('config_value')->first();
        $this->apiURL = Configs::where('config_name', 'ebay_api_url')->pluck('config_value')->first();
        $this->siteId = Configs::where('config_name', 'ebay_site_id')->pluck('config_value')->first();
        $this->compatibilityLevel = Configs::where('config_name', 'ebay_compatibility')->pluck('config_value')->first();
    }

    public function sendRequest($requestBody, $apiCallName) {
        //build eBay headers using variables passed via constructor
        $headers = $this->buildHeaders($apiCallName);

        //initialise a CURL session
        $connection = curl_init();
        //set the server we are using (could be Sandbox or Production server)
        curl_setopt($connection, CURLOPT_URL, $this->apiURL);

        //stop CURL from verifying the peer's certificate
        curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($connection, CURLOPT_SSL_VERIFYHOST, 0);
        //set the headers using the array of headers
        curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);
        //set method as POST
        curl_setopt($connection, CURLOPT_POST, 1);
        //set the XML body of the request
        curl_setopt($connection, CURLOPT_POSTFIELDS, $requestBody);
        //set it to return the transfer as a string from curl_exec
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($connection, CURLOPT_TIMEOUT, 0);
        //Send the Request
        $response = curl_exec($connection);
        //close the connection
        curl_close($connection);
        //return the response
        return $response;
    }

    private function buildHeaders($apiCallName) {
        $headers = array(
            //Regulates versioning of the XML interface for the API
            'X-EBAY-API-COMPATIBILITY-LEVEL: ' . $this->compatibilityLevel,
            //set the keys
            'X-EBAY-API-DEV-NAME: ' . $this->developerId,
            'X-EBAY-API-APP-NAME: ' . $this->applicationId,
            'X-EBAY-API-CERT-NAME: ' . $this->certificateId,
            //the name of the call we are requesting
            'X-EBAY-API-CALL-NAME: ' . $apiCallName,
            //SiteID must also be set in the Request's XML
            //SiteID = 0  (US) - UK = 3, Canada = 2, Australia = 15, ....
            //SiteID Indicates the eBay site to associate the call with
            'X-EBAY-API-SITEID: ' . $this->siteId,
        );

        return $headers;
    }

}

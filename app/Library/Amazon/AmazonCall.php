<?php

class AmazonCall {

    private $dateFormat;

    public function __construct() {
        $this->dateFormat = 'Y-m-d\TH:i:s\Z';
    }

    public function invokeListOrders(MarketplaceWebServiceOrders_Interface $service, $request) {
        try {
            $response = $service->ListOrders($request);

            //echo ("Service Response\n");
            //echo ("=============================================================================\n");

            $dom = new DOMDocument();
            $dom->loadXML($response->toXML());
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;
            return $dom->saveXML();
            //echo("ResponseHeaderMetadata: " . $response->getResponseHeaderMetadata() . "\n");
        } catch (MarketplaceWebServiceOrders_Exception $ex) {
            //echo("Caught Exception: " . $ex->getMessage() . "\n");
            //echo("Response Status Code: " . $ex->getStatusCode() . "\n");
            //echo("Error Code: " . $ex->getErrorCode() . "\n");
            //echo("Error Type: " . $ex->getErrorType() . "\n");
            //echo("Request ID: " . $ex->getRequestId() . "\n");
            //echo("XML: " . $ex->getXML() . "\n");
            //echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
            echo json_encode(array('results' => 'error', 'response' => $ex->getMessage()));
            exit;
        }
    }

    function invokeListOrdersByNextToken(MarketplaceWebServiceOrders_Interface $service, $request) {
        try {
            $response = $service->ListOrdersByNextToken($request);

            //echo ("Service Response\n");
            //echo ("=============================================================================\n");

            $dom = new DOMDocument();
            $dom->loadXML($response->toXML());
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;
            $responseXML = $dom->saveXML();
            $response = new SimpleXMLElement($responseXML);

            return $dom->saveXML();
            //echo("ResponseHeaderMetadata: " . $response->getResponseHeaderMetadata() . "\n");
        } catch (MarketplaceWebServiceOrders_Exception $ex) {
            echo("Caught Exception: " . $ex->getMessage() . "\n");
            echo("Response Status Code: " . $ex->getStatusCode() . "\n");
            echo("Error Code: " . $ex->getErrorCode() . "\n");
            echo("Error Type: " . $ex->getErrorType() . "\n");
            echo("Request ID: " . $ex->getRequestId() . "\n");
            echo("XML: " . $ex->getXML() . "\n");
            echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
        }
    }

    function invokeListOrderItems(MarketplaceWebServiceOrders_Interface $service, $request) {
        try {
            $response = $service->ListOrderItems($request);

            //echo ("Service Response\n");
            //echo ("=============================================================================\n");

            $dom = new DOMDocument();
            $dom->loadXML($response->toXML());
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;
            $responseXML = $dom->saveXML();
            $response = new SimpleXMLElement($responseXML);
            return $response;
            //echo("ResponseHeaderMetadata: " . $response->getResponseHeaderMetadata() . "\n");
        } catch (MarketplaceWebServiceOrders_Exception $ex) {
            echo("Caught Exception: " . $ex->getMessage() . "\n");
            echo("Response Status Code: " . $ex->getStatusCode() . "\n");
            echo("Error Code: " . $ex->getErrorCode() . "\n");
            echo("Error Type: " . $ex->getErrorType() . "\n");
            echo("Request ID: " . $ex->getRequestId() . "\n");
            echo("XML: " . $ex->getXML() . "\n");
            echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
        }
    }

    public function invokeRequestReport(MarketplaceWebService_Interface $service, $request) {
        try {
            $response = $service->requestReport($request);

            //echo ("Service Response\n");
            //echo ("=============================================================================\n");
            //echo("        RequestReportResponse\n");
            if ($response->isSetRequestReportResult()) {
                //echo("            RequestReportResult\n");
                $requestReportResult = $response->getRequestReportResult();

                if ($requestReportResult->isSetReportRequestInfo()) {

                    $reportRequestInfo = $requestReportResult->getReportRequestInfo();
                    //echo("                ReportRequestInfo\n");
                    if ($reportRequestInfo->isSetReportRequestId()) {
                        //echo("                    ReportRequestId\n");
                        //echo("                        " . $reportRequestInfo->getReportRequestId() . "\n");
                        return $reportRequestInfo->getReportRequestId();
                    }
                    if ($reportRequestInfo->isSetReportType()) {
                        //echo("                    ReportType\n");
                        //echo("                        " . $reportRequestInfo->getReportType() . "\n");
                    }
                    if ($reportRequestInfo->isSetStartDate()) {
                        //echo("                    StartDate\n");
                        //echo("                        " . $reportRequestInfo->getStartDate()->format($this->dateFormat) . "\n");
                    }
                    if ($reportRequestInfo->isSetEndDate()) {
                        //echo("                    EndDate\n");
                        //echo("                        " . $reportRequestInfo->getEndDate()->format($this->dateFormat) . "\n");
                    }
                    if ($reportRequestInfo->isSetSubmittedDate()) {
                        //echo("                    SubmittedDate\n");
                        //echo("                        " . $reportRequestInfo->getSubmittedDate()->format($this->dateFormat) . "\n");
                    }
                    if ($reportRequestInfo->isSetReportProcessingStatus()) {
                        //echo("                    ReportProcessingStatus\n");
                        //echo("                        " . $reportRequestInfo->getReportProcessingStatus() . "\n");
                    }
                }
            }
            if ($response->isSetResponseMetadata()) {
                //echo("            ResponseMetadata\n");
                $responseMetadata = $response->getResponseMetadata();
                if ($responseMetadata->isSetRequestId()) {
                    //echo("                RequestId\n");
                    //echo("                    " . $responseMetadata->getRequestId() . "\n");
                }
            }

            echo("            ResponseHeaderMetadata: " . $response->getResponseHeaderMetadata() . "\n");
        } catch (MarketplaceWebService_Exception $ex) {
            echo("Caught Exception: " . $ex->getMessage() . "\n");
            echo("Response Status Code: " . $ex->getStatusCode() . "\n");
            echo("Error Code: " . $ex->getErrorCode() . "\n");
            echo("Error Type: " . $ex->getErrorType() . "\n");
            echo("Request ID: " . $ex->getRequestId() . "\n");
            echo("XML: " . $ex->getXML() . "\n");
            echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
        }
    }

    public function invokeGetReportRequestList(MarketplaceWebService_Interface $service, $request) {
        $reportRequestListArray = array();
        try {
            $response = $service->getReportRequestList($request);

            //echo ("Service Response\n");
            //echo ("=============================================================================\n");
            //echo("        GetReportRequestListResponse\n");
            if ($response->isSetGetReportRequestListResult()) {
                //echo("            GetReportRequestListResult\n");
                $getReportRequestListResult = $response->getGetReportRequestListResult();
                if ($getReportRequestListResult->isSetNextToken()) {
                    //echo("                NextToken\n");
                    //echo("                    " . $getReportRequestListResult->getNextToken() . "\n");
                    $reportRequestListArray['NextToken'] = $getReportRequestListResult->getNextToken();
                }
                if ($getReportRequestListResult->isSetHasNext()) {
                    //echo("                HasNext\n");
                    //echo("                    " . $getReportRequestListResult->getHasNext() . "\n");
                    $reportRequestListArray['HasNext'] = $getReportRequestListResult->getHasNext();
                }
                $reportRequestInfoList = $getReportRequestListResult->getReportRequestInfoList();
                $i = 0;
                foreach ($reportRequestInfoList as $reportRequestInfo) {
                    //echo("                ReportRequestInfo\n");
                    if ($reportRequestInfo->isSetReportRequestId()) {
                        //echo("                    ReportRequestId\n");
                        //echo("                        " . $reportRequestInfo->getReportRequestId() . "\n");
                        $reportRequestListArray['ReportRequestInfo'][$i]['ReportRequestId'] = $reportRequestInfo->getReportRequestId();
                    }
                    if ($reportRequestInfo->isSetReportType()) {
                        //echo("                    ReportType\n");
                        //echo("                        " . $reportRequestInfo->getReportType() . "\n");
                        $reportRequestListArray['ReportRequestInfo'][$i]['ReportType'] = $reportRequestInfo->getReportType();
                    }
                    if ($reportRequestInfo->isSetStartDate()) {
                        //echo("                    StartDate\n");
                        //echo("                        " . $reportRequestInfo->getStartDate()->format(DATE_FORMAT) . "\n");
                        $reportRequestListArray['ReportRequestInfo'][$i]['StartDate'] = $reportRequestInfo->getStartDate()->format($this->dateFormat);
                    }
                    if ($reportRequestInfo->isSetEndDate()) {
                        //echo("                    EndDate\n");
                        //echo("                        " . $reportRequestInfo->getEndDate()->format(DATE_FORMAT) . "\n");
                        $reportRequestListArray['ReportRequestInfo'][$i]['EndDate'] = $reportRequestInfo->getEndDate()->format($this->dateFormat);
                    }
                    // add start
                    if ($reportRequestInfo->isSetScheduled()) {
                        //echo("                    Scheduled\n");
                        //echo("                        " . $reportRequestInfo->getScheduled() . "\n");
                        $reportRequestListArray['ReportRequestInfo'][$i]['Scheduled'] = $reportRequestInfo->getScheduled();
                    }
                    // add end
                    if ($reportRequestInfo->isSetSubmittedDate()) {
                        //echo("                    SubmittedDate\n");
                        //echo("                        " . $reportRequestInfo->getSubmittedDate()->format(DATE_FORMAT) . "\n");
                        $reportRequestListArray['ReportRequestInfo'][$i]['SubmittedDate'] = $reportRequestInfo->getSubmittedDate()->format($this->dateFormat);
                    }
                    if ($reportRequestInfo->isSetReportProcessingStatus()) {
                        //echo("                    ReportProcessingStatus\n");
                        //echo("                        " . $reportRequestInfo->getReportProcessingStatus() . "\n");
                        $reportRequestListArray['ReportRequestInfo'][$i]['ReportProcessingStatus'] = $reportRequestInfo->getReportProcessingStatus();
                    }
                    // add start
                    if ($reportRequestInfo->isSetGeneratedReportId()) {
                        //echo("                    GeneratedReportId\n");
                        //echo("                        " . $reportRequestInfo->getGeneratedReportId() . "\n");
                        $reportRequestListArray['ReportRequestInfo'][$i]['GeneratedReportId'] = $reportRequestInfo->getGeneratedReportId();
                    }
                    if ($reportRequestInfo->isSetStartedProcessingDate()) {
                        //echo("                    StartedProcessingDate\n");
                        //echo("                        " . $reportRequestInfo->getStartedProcessingDate()->format(DATE_FORMAT) . "\n");
                        $reportRequestListArray['ReportRequestInfo'][$i]['StartedProcessingDate'] = $reportRequestInfo->getStartedProcessingDate()->format($this->dateFormat);
                    }
                    if ($reportRequestInfo->isSetCompletedDate()) {
                        //echo("                    CompletedDate\n");
                        //echo("                        " . $reportRequestInfo->getCompletedDate()->format(DATE_FORMAT) . "\n");
                        $reportRequestListArray['ReportRequestInfo'][$i]['CompletedDate'] = $reportRequestInfo->getCompletedDate()->format($this->dateFormat);
                    }
                    // add end
                    $i++;
                }
            }
            if ($response->isSetResponseMetadata()) {
                //echo("            ResponseMetadata\n");
                $responseMetadata = $response->getResponseMetadata();
                if ($responseMetadata->isSetRequestId()) {
                    //echo("                RequestId\n");
                    //echo("                    " . $responseMetadata->getRequestId() . "\n");
                    $reportRequestListArray['ResponseMetadata'] = $responseMetadata->getRequestId();
                }
            }
            return $reportRequestListArray;
            //echo("            ResponseHeaderMetadata: " . $response->getResponseHeaderMetadata() . "\n");
        } catch (MarketplaceWebService_Exception $ex) {
            echo("Caught Exception: " . $ex->getMessage() . "\n");
            echo("Response Status Code: " . $ex->getStatusCode() . "\n");
            echo("Error Code: " . $ex->getErrorCode() . "\n");
            echo("Error Type: " . $ex->getErrorType() . "\n");
            echo("Request ID: " . $ex->getRequestId() . "\n");
            echo("XML: " . $ex->getXML() . "\n");
            echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
        }
    }

    public function invokeGetReport(MarketplaceWebService_Interface $service, $request) {
        try {
            $response = $service->getReport($request);

            //echo ("Service Response\n");
            //echo ("=============================================================================\n");
            //echo("        GetReportResponse\n");
            if ($response->isSetGetReportResult()) {
                $getReportResult = $response->getGetReportResult();
                //echo ("            GetReport");

                if ($getReportResult->isSetContentMd5()) {
                    //echo ("                ContentMd5");
                    //echo ("                " . $getReportResult->getContentMd5() . "\n");
                }
            }
            if ($response->isSetResponseMetadata()) {
                //echo("            ResponseMetadata\n");
                $responseMetadata = $response->getResponseMetadata();
                if ($responseMetadata->isSetRequestId()) {
                    //echo("                RequestId\n");
                    //echo("                    " . $responseMetadata->getRequestId() . "\n");
                }
            }

            //echo ("        Report Contents\n");
            //echo (stream_get_contents($request->getReport()) . "\n");
            $fp = $request->getReport();
            stream_set_timeout($fp, 2400);
            $report = stream_get_contents($fp);
            file_put_contents(public_path() . "/report.txt", $report);

            //echo("            ResponseHeaderMetadata: " . $response->getResponseHeaderMetadata() . "\n");
        } catch (MarketplaceWebService_Exception $ex) {
            echo("Caught Exception: " . $ex->getMessage() . "\n");
            echo("Response Status Code: " . $ex->getStatusCode() . "\n");
            echo("Error Code: " . $ex->getErrorCode() . "\n");
            echo("Error Type: " . $ex->getErrorType() . "\n");
            echo("Request ID: " . $ex->getRequestId() . "\n");
            echo("XML: " . $ex->getXML() . "\n");
            echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
        }
    }

}

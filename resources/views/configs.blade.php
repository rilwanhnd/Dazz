@extends('layouts.app')

@section('htmlheader_title')
Configurations
@endsection

@section('main-content')

@section('contentheader_title')
Configurations
@endsection
<div class="container spark-screen">
    <div class="col-md-11">
        <!-- Ebay Configuration -->
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Ebay Configurations</div>
                <div class="panel-body">
                    <form class="form-horizontal configurationForm" role="form">
                        <div class="form-group">
                            <label class="control-label col-md-4" for="developerId">Developer Id:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="ebay_developer_id" name="ebay_developer_id" placeholder="Ebay Developer Id" value="{{ $configs['ebay_developer_id'] }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="applicationId">Application Id:</label>
                            <div class="col-md-8"> 
                                <input type="text" class="form-control" id="ebay_application_id" name="ebay_application_id" placeholder="Ebay Application Id" value="{{ $configs['ebay_application_id'] }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="certificationId">Certification Id:</label>
                            <div class="col-md-8"> 
                                <input type="text" class="form-control" id="ebay_certification_id" name="ebay_certification_id" placeholder="Ebay Certification Id" value="{{ $configs['ebay_certificate_id'] }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="token">User Token:</label>
                            <div class="col-md-8"> 
                                <textarea style="resize:vertical;" class="form-control" id="ebay_user_token" name="ebay_user_token" rows="5" placeholder="User Token" required>{{ $configs['ebay_user_token'] }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="site_id">Site Id:</label>
                            <div class="col-md-8"> 
                                <input type="number" class="form-control" id="ebay_site_id" name="ebay_site_id" placeholder="Ebay Site Id" value="{{ $configs['ebay_site_id'] }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="token">API URL:</label>
                            <div class="col-md-8"> 
                                <input type="text" class="form-control" id="ebay_api_url" name="ebay_api_url" placeholder="Ebay API URL" value="{{ $configs['ebay_api_url'] }}" required>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Amazon Configurations -->
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Amazon Configurations</div>
                <div class="panel-body">
                    <form class="form-horizontal configurationForm" role="form">
                        <div class="form-group">
                            <label class="control-label col-md-4" for="sellerId">Seller Id:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="amazon_seller_id" name="amazon_seller_id" placeholder="Amazon Seller Id" value="{{ $configs['amazon_seller_id'] }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="mwsAuthToken">MWS Auth Token:</label>
                            <div class="col-md-8"> 
                                <input type="text" class="form-control" id="amazon_mws_auth_token" name="amazon_mws_auth_token" placeholder="MWS Auth Token (Optional)" value="{{ $configs['amazon_mws_auth_token'] }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="awsAccessKeyId">AWS Access Key:</label>
                            <div class="col-md-8"> 
                                <input type="text" class="form-control" id="amazon_aws_access_key_id" name="amazon_aws_access_key_id" placeholder="Ebay Certification Id" value="{{ $configs['amazon_aws_access_key_id'] }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="secretKey">Secret Key:</label>
                            <div class="col-md-8"> 
                                <input type="text" class="form-control" id="amazon_secret_key" name="amazon_secret_key" placeholder="Secret Key" value="{{ $configs['amazon_secret_key'] }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="marketplaceId">Marketplace Id:</label>
                            <div class="col-md-8"> 
                                <input type="text" class="form-control" id="amazon_market_place_id" name="amazon_market_place_id" placeholder="Marketplace Id" value="{{ $configs['amazon_market_place_id'] }}" required>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Shipping Method CSV -->
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Shipping Methods</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-md-4" for="developerId">Shipping Method:</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" id="email" placeholder="Ebay Developer Id">
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
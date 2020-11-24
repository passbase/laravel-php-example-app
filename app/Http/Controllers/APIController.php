<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Passbase\Configuration;
use Passbase\api\IdentityApi;
use GuzzleHttp\Client;

class APIController extends Controller
{
    public function api_call()
    {
        $config = Configuration::getDefaultConfiguration()->setApiKey('X-API-KEY', env('PASSBASE_SECRET_KEY'));
        $apiInstance = new IdentityApi(
            new Client(),
            $config
        );
        $id = "ebe1c40f-bb69-49d5-9e93-68e3e23da521";

        try {
            $result = $apiInstance->getIdentityById($id);
            $resources = $result['resources'][0]['datapoints'];
            print_r($resources);
            // Prints empty array
            // Passbase\models\DataPoints Object ( [container:protected] => Array ( ) ) 
        } catch (Exception $e) {
            echo 'Exception when calling IdentityApi->getIdentityById: ', $e->getMessage(), PHP_EOL;
        }
    }
}

<?php

namespace App\Http\Controllers;

use Microsoft\Graph\Model;
use Illuminate\Http\Request;
use Microsoft\Graph\Graph as Graph;
use Microsoft\Graph\Exception\GraphException;

trait MicrosoftGraph
{

    public static function connect(): Graph
    {
        $guzzle = new \GuzzleHttp\Client();
        $url = 'https://login.microsoftonline.com/' . env('MS_TENANT_ID') . '/oauth2/token?api-version=' . env('MS_GRAPH_API_VERSION');

        $response  = json_decode($guzzle->post($url, [
            'form_params' => [
                'client_id' => env('MS_CLIENT_ID'),
                'client_secret' => env('MS_CLIENT_SECRET'),
                'resource' => 'https://graph.microsoft.com/',
                // 'scope' => 'https://graph.microsoft.com/.default',
                'grant_type' => 'client_credentials',
            ],
        ])->getBody()->getContents());

        $graph = new Graph();

        return $graph->setBaseUrl("https://graph.microsoft.com")
            ->setApiVersion(env('MS_GRAPH_API_VERSION'))
            ->setAccessToken($response->access_token);
    }

    /**
     * Get all the users in the tenant
     *
     * @return mixed
     * @throws GraphException
     */
    public static function users($keyword)
    {
        $graph = self::connect();
        
        $select = '$select=displayName,id,mail';
        $orderBy = '$orderBy=displayName';
        $search = sprintf('$search="displayName:%s"', $keyword);
        $filter = '$filter=endsWith(mail,\'nmdpra.gov.ng\')';
        $header = '$count=true&ConsistencyLevel=eventual';

        $query = '/users?' . $header . '&' . $search . '&' . $filter . '&' . $select . '&' . $orderBy;

        $response = $graph->createCollectionRequest("GET", $query)
            // ->addHeaders(array("Content-Type" => "application/json"))
            ->setReturnType(Model\User::class)
            ->execute();

        if (count($response) > 0) {
            return $response;
        } else {
            return null;
        }
    }
}

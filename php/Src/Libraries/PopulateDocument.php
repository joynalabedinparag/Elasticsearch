<?php
namespace Src\Libraries;

// use Src\Libraries\SearchEngine;
use Elasticsearch\ClientBuilder;
use Src\Libraries\PopulateDocument;
use Src\Libraries\ElasticSearchClientLibrary;

class PopulateDocument
{
    private $client;

    function __construct() 
    {
        $this->client = ClientBuilder::create()->build();
    }

    public function populateDocuments($index, $type) 
    {
        try
        {   
            for($r = 0; $r <= 200; $r ++ ) {
                $ru = file_get_contents("https://randomuser.me/api/");
                $ru = json_decode($ru, true);
                if(!empty($ru)) {
                    $ru = $ru['results'][0];
                  
                    $body = ['firstname' => $ru['name']['first'], 'lastname' => $ru['name']['last'], 'email' => $ru['email'], 'pic' => $ru['picture']['medium']];
                    
                    $esc = new ElasticSearchClientLibrary();
                    $esc->addDocument('free-palestine', 'palestine', $body);    

                    print_r($params);
                }
            }    
        }
        catch (Exception $e) 
        {
            echo $e->getMessage();
        }
    }

}
<?php
namespace Src\Libraries;

use Elasticsearch\ClientBuilder;

class ElasticSearchClientLibrary
{
    private $client;

    function __construct()
    {
        $this->client = ClientBuilder::create()->build();
    }
    
    public function createIndex($index)
    {
        $params = [
            'index' => $index
        ];

        return $response = $this->client->indices()->create($params);
    }

    public function deleteIndex($index) 
    {
        $params = ['index' => $index];
        
        return $response = $this->client->indices()->delete($params); 
    }

    public function listIndices() {
        // return $this->client->indices();
    }

    public function addDocument($index, $type, $document) 
    {
        $params = [
            'index' => 'free-palestine',
            'type' => 'palestine',
            'body' => ['firstname' => $ru['name']['first'], 'lastname' => $ru['name']['last'], 'email' => $ru['email'], 'pic' => $ru['picture']['medium']]
        ];

        $response = $this->client->index($params);
        print_r($response);
    }

    public function searchDocument($index, $type, $query)
    {
        $params = [
            'index' => $index,
            'type' => $type,
            'body' => $query
        ];
        
        $response = $this->client->search($params);
        print_r($response);
    }
    
}
<?php
namespace App;

require 'vendor/autoload.php';

use Src\Libraries\PopulateDocument;
use Src\Libraries\ElasticSearchClientLibrary;

echo '<pre>';

$primary_index = 'free-palestine';
$primary_type = 'palestine';

/* Populate dummy 200 documents */
$pp = new PopulateDocument();
$pp->populateDocuments($primary_index, $primary_type);

/* Search $primary_index for documents */
$esc = new ElasticSearchClientLibrary();
$query =  [
            'query' => [
                    // 'match' => [
                    //     'testField' => 'abc'
                    // ] 
                    'wildcard' => [
                        'firstname' => '*' /* You can put regex here */
                    ]
                ]
            ];

$esc->searchDocument($primary_index, $primary_type, $query);

/* Delete an index */
$esc->deleteIndex($primary_index);
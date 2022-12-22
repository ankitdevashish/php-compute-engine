<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;
use Google\Cloud\SecretManager\V1\Replication;
use Google\Cloud\SecretManager\V1\Replication\Automatic;
use Google\Cloud\SecretManager\V1\Secret;
use Google\Cloud\SecretManager\V1\SecretManagerServiceClient;

// Authenticating with keyfile data.
$storage = new StorageClient([
    'keyFile' => json_decode(file_get_contents('./avian-slice-371209-3dd89dbc794b.json'), true)
]);

// Authenticating with a keyfile path.
$storage = new StorageClient([
    'keyFilePath' => './avian-slice-371209-3dd89dbc794b.json'
]);

// Providing the Google Cloud project ID.
$storage = new StorageClient([
    'projectId' => 'avian-slice-371209'
]);

$client = new SecretManagerServiceClient();

$secret = $client->createSecret(
    SecretManagerServiceClient::projectName('avian-slice-371209'), 'name2',
    new Secret([
        'replication' => new Replication([
            'automatic' => new Automatic()
        ])
    ])
);

    echo "testint compute engine, from cloud build, iu". $secret->getName();  

    
printf(
    'Created secret: %s' . PHP_EOL,
    $secret->getName()
);

?>
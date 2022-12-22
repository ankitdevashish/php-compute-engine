<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'vendor/autoload.php';

// Import the Secret Manager client library.
use Google\Cloud\SecretManager\V1\Replication;
use Google\Cloud\SecretManager\V1\Replication\Automatic;
use Google\Cloud\SecretManager\V1\Secret;
use Google\Cloud\SecretManager\V1\SecretManagerServiceClient;

/**
 * @param string $projectId Your Google Cloud Project ID (e.g. 'my-project')
 * @param string $secretId  Your secret ID (e.g. 'my-secret')
 */
function create_secret(string $projectId, string $secretId): void
{
    // Create the Secret Manager client.
    $client = new SecretManagerServiceClient();

    // Build the resource name of the parent project.
    echo $parent = $client->projectName($projectId);

    // Create the secret.
   /* $secret = $client->createSecret($parent, $secretId,
        new Secret([
            'replication' => new Replication([
                'automatic' => new Automatic(),
            ]),
        ])
    ); */

    // Print the new secret name.
    printf('Created secret: %s', $secret->getName());
}
echo "testint compute engine, from cloud build, iu " . 
create_secret('avian-slice-371209', 'name');

    
?>
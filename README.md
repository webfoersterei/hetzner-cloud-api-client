# hetzner-cloud-api-client
API Client for managing Hetzner's Cloud

[![Build Status](https://travis-ci.org/webfoersterei/hetzner-cloud-api-client.svg?branch=master)](https://travis-ci.org/webfoersterei/hetzner-cloud-api-client)
[![Packagist](https://img.shields.io/packagist/v/webfoersterei/hetzner-cloud-api-client.svg)](https://packagist.org/packages/webfoersterei/hetzner-cloud-api-client)
[![Packagist Pre Release](https://img.shields.io/packagist/vpre/webfoersterei/hetzner-cloud-api-client.svg)](https://packagist.org/packages/webfoersterei/hetzner-cloud-api-client)
[![GitHub license](https://img.shields.io/github/license/webfoersterei/hetzner-cloud-api-client.svg)](https://github.com/webfoersterei/hetzner-cloud-api-client/blob/master/LICENSE)

## Usage

Install this package via composer ``composer install webfoersterei/hetzner-cloud-api-client``

**Note:** There is no stable release at the moment

After that you can use the client like this:
```php
define('API_KEY', 'MYSECRETAPIKEY'); # See https://docs.hetzner.cloud/#header-authentication-1
$cloudApiClient = Webfoersterei\HetznerCloudApiClient\ClientFactory::create(API_KEY);

# You can now use the cloudApiClient. E.g:
$cloudApiClient->getServers();
```

## Implemented Methods
The client provides implementations for the following methods (grouped by resources).

### Actions
See: https://docs.hetzner.cloud/#resources-actions
* List all: `getActions()`
* Get one: `getAction(int $id)`

### Servers
See: https://docs.hetzner.cloud/#resources-servers
* Get all: `getServers()`
* Get one: `getServer(int $id)`
* Create one: `createServer(CreateRequest $createRequest)`
* Rename: `changeServerName(int $id, string $name)`
* Delete one: `deleteServer(int $id)`

### ServerTypes
See: https://docs.hetzner.cloud/#resources-server-types
* Get all: `getServerTypes()`
* Get one: `getServerType(int $id)`

## Contribute

Feel free to contribute to this github repository by reporting bugs and ideas to improve this API-client.

## Examples

### List of serverTypes
Lists all serverTypes: name and specs
```php
# Require vendors/autoload.php here

define('API_KEY', 'MYSECRETAPIKEY');
$client = \Webfoersterei\HetznerCloudApiClient\ClientFactory::create(API_KEY);

$serverTypes = $client->getServerTypes();

foreach ($serverTypes->server_types as $serverType) {
    printf("%--12s CPU: %2d Cores, RAM: %3d GB, Storage: %4d GB (%s)\n", $serverType->name, $serverType->cores,
        $serverType->memory, $serverType->disk, $serverType->storage_type);
}
```

### My first server
Create a new server and delete it after started
```php
# Require vendors/autoload.php here

define('API_KEY', 'MYSECRETAPIKEY');
$client = \Webfoersterei\HetznerCloudApiClient\ClientFactory::create(API_KEY);

$createServerRequest = new \Webfoersterei\HetznerCloudApiClient\Model\Server\CreateRequest();
$createServerRequest->name = 'my-first-server-created-with-php';
$createServerRequest->server_type = 'cx11';
$createServerRequest->start_after_create = true;
$createServerRequest->image = 1;

echo "Creating server.\n";

$createResponse = $client->createServer($createServerRequest);

$progress = $createResponse->action->progress;
$status = $createResponse->action->status;

while ($progress != 100 && $status != 'success') {
    $actionResponse = $client->getAction($createResponse->action->id);
    echo $actionResponse->action->progress."%\n";
    $progress = $actionResponse->action->progress;
    sleep(1);
}

echo sprintf("Server created. Root-PW: %s\n", $createResponse->root_password);
sleep(10);
echo "Deleting server.\n";

$client->deleteServer($createResponse->server->id);

echo "Done.\n";
```
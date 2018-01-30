# hetzner-cloud-api-client
API Client for managing Hetzner's Cloud

[![Build Status](https://travis-ci.org/webfoersterei/hetzner-cloud-api-client.svg?branch=master)](https://travis-ci.org/webfoersterei/hetzner-cloud-api-client)
[![GitHub license](https://img.shields.io/github/license/webfoersterei/hetzner-cloud-api-client.svg)](https://github.com/webfoersterei/hetzner-cloud-api-client/blob/master/LICENSE)
[![Packagist](https://img.shields.io/packagist/v/webfoersterei/hetzner-cloud-api-client.svg)](https://packagist.org/packages/webfoersterei/hetzner-cloud-api-client)


## Usage

Install this package via composer ``composer install webfoersterei/hetzner-cloud-api-client``.

After that use it like this:
```
define('API_KEY', 'MYSECRETAPIKEY'); # See https://docs.hetzner.cloud/#header-authentication-1
$cloudApiClient = Webfoersterei\HetznerCloudApiClient\ClientFactory::create(API_KEY);

# You can now use the cloudApiClient. E.g:
$cloudApiClient->getServers();
```

## Contribute

Feel free to contribute to this github repository by reporting bugs and ideas to improve this API-client.
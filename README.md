----------
#xsolve-pl/salesforce-client [![Build Status](https://travis-ci.com/xsolve-pl/salesforce-client.svg?token=SjQKyns8C8K1pNxxqcyw&branch=master)](https://travis-ci.com/xsolve-pl/salesforce-client)

## Introduction
This library is for integration with Salesforce via REST API.

## Licence
This library is under the MIT license. See the complete license in [LICENSE](LICENSE) file.

## Getting started

Add the library to your project using Composer as follows:
```
$ composer require xsolve-pl/salesforce-client
```
We are using http://httplug.io/, so you can use any of [existing adapters](https://packagist.org/providers/php-http/client-implementation), for example:
```
$ composer require php-http/guzzle6-adapter
```
Otherwise you need to create your own implementation.

To store access token we have implemented BlaBlaCarRedis token storege, but it needs `blablacar/redis-clien`
```
$ composer require blablacar/redis-client "~1.0"
```
Another option for token storage is `RequestTokenStorage` (this will keep the token in own property (memory) so the token would last until the script is terminated (e.g. current request), which is not really effective). Of course you can create your own storage, everything what you need to do is create class which will implements `StorageInterface`

## Documentation
Documentation is available in the doc directory.
[Read documentation](doc/README.md)

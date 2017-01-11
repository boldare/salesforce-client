----------
#xsolve-pl/salesforce-client

## Introduction
This library is for integration with Salesforce via REST API.

## Licence
This bundle is under the MIT license. See the complete license in LICENSE file.

## Getting started

Add library to your project using Composer as follows:
```
$ composer require xsolve-pl/salesforce-client
```

Guzzle and Redis are not installed for default to keep your project clean, if you wanna use them please run:
```
$ composer require guzzlehttp/guzzle "~6.2"
$ composer require blablacar/redis-client "~1.0"
```
Otherwise you need to implement something to handle HTTP requests, but for token storage you can use `RequestTokenStorageStorage` (this will keep token only during request, which is not effective).

## Documentation
Source of documentation you can find in folder doc.
[Read documentation](doc/README.md)

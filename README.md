----------
#xsolve-pl/salesforce-client

## Introduction
This library is for integration with Salesforce via REST API.

## Licence
This library is under the MIT license. See the complete license in [LICENSE](LICENSE) file.

## Getting started

Add the library to your project using Composer as follows:
```
$ composer require xsolve-pl/salesforce-client
```

Guzzle and Redis are not required by default to keep your project clean. If you wish to use them, please install suggested dependencies:
```
$ composer require guzzlehttp/guzzle "~6.2"
$ composer require blablacar/redis-client "~1.0"
```
Otherwise you must implement your own logic to handle HTTP requests, but for token storage you can use `RequestTokenStorage` (this will keep the token in own property (memory) so the token would last until the script is terminated (e.g. current request), which is not really effective).

## Documentation
Documentation is available in the doc directory.
[Read documentation](doc/README.md)

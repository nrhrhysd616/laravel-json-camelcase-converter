# laravel-camelcase-json

Convert response JSON key to camelCase.
This repository is a fork of the [grohiro](https://github.com/grohiro/laravel-camelcase-json) repository.

## Usage

### In Controller class

```php
return response()->json($model);
// => ['userName' => 'foo', 'userKey' => 'bar', ...]
```

## Requirements

- Laravel 5.5+

## Install

```bash
$composer require 'nrhrhysd616/laravel-json-camelcase-converter'
```

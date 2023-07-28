# Implements a database driver and browser for logs.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/zero-to-prod/applog.svg?style=flat-square)](https://packagist.org/packages/zero-to-prod/applog)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/applog/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/zero-to-prod/applog/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/applog/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/zero-to-prod/applog/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/zero-to-prod/applog.svg?style=flat-square)](https://packagist.org/packages/zero-to-prod/applog)

## Installation

You can install the package via composer:

```bash
composer require zero-to-prod/applog
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="applog-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="applog-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="applog-views"
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [David Smith](https://github.com/zero-to-prod)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

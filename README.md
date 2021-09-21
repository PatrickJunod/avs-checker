# AVS Checker - A library for AVS / AHV Number validation

[![Latest Version on Packagist](https://img.shields.io/packagist/v/patrickjunod/avs-checker.svg?style=flat-square)](https://packagist.org/packages/patrickjunod/avs-checker)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/patrickjunod/avs-checker/run-tests?label=tests)](https://github.com/patrickjunod/avs-checker/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/patrickjunod/avs-checker/Check%20&%20fix%20styling?label=code%20style)](https://github.com/patrickjunod/avs-checker/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/patrickjunod/avs-checker.svg?style=flat-square)](https://packagist.org/packages/patrickjunod/avs-checker)


This small library helps you to validate Swiss Social Security Numbers (AVS / AHV). It will check against regex and checksums to be sure that the number is valid.

## Installation

You can install the package via composer:

```bash
composer require patrickjunod/avs-checker
```

## Usage

```php
use PatrickJunod\AvsChecker\AvsChecker;

$avsNumber = new AvsChecker('756.3026.0705.92');
$avsNumber->isValid();
// Return true if it's a valid AVS Number, false if not
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Patrick Junod](https://github.com/PatrickJunod)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

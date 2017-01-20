# DependencyInjection

[![Latest Stable Version](https://poser.pugx.org/ucsdmath/dependency-injection/v/stable)](https://packagist.org/packages/ucsdmath/dependency-injection)
[![License](https://poser.pugx.org/ucsdmath/dependency-injection/license)](https://packagist.org/packages/ucsdmath/dependency-injection)
[![Total Downloads](https://poser.pugx.org/ucsdmath/dependency-injection/downloads)](https://packagist.org/packages/ucsdmath/dependency-injection)
[![Latest Unstable Version](https://poser.pugx.org/ucsdmath/dependency-injection/v/unstable)](https://packagist.org/packages/ucsdmath/dependency-injection)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ucsdmath/DependencyInjection/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ucsdmath/DependencyInjection/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/ucsdmath/DependencyInjection/badges/build.png?b=master)](https://scrutinizer-ci.com/g/ucsdmath/DependencyInjection/code-structure/master)

DependencyInjection is a testing and development library only. This is not to be used in a production.

## Installation using [Composer](http://getcomposer.org/)
You can install the class ```DependencyInjection``` with Composer and Packagist by
adding the ucsdmath/dependency-injection package to your composer.json file:

```
"require": {
    "php": ">=5.6",
    "ucsdmath/dependency-injection": "dev-master"
},
```
Or you can add the class directly from the terminal prompt:

```bash
$ composer require ucsdmath/dependency-injection
```

## Usage

``` php
$di = new \UCSDMath\DependencyInjection\DependencyInjection();
```

## Documentation

No documentation site available at this time.
<!-- [Check out the documentation](http://math.ucsd.edu/~deisner/documentation/DependencyInjection/) -->

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email deisner@ucsd.edu instead of using the issue tracker.

## Credits

- [Daryl Eisner](https://github.com/UCSDMath)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

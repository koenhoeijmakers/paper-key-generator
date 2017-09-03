# Paper Key Generator
[![Packagist](https://img.shields.io/packagist/v/koenhoeijmakers/paper-key-generator.svg?colorB=brightgreen)](https://packagist.org/packages/koenhoeijmakers/paper-key-generator)
[![license](https://img.shields.io/github/license/koenhoeijmakers/paper-key-generator.svg?colorB=brightgreen)](https://github.com/koenhoeijmakers/paper-key-generator)
[![Packagist](https://img.shields.io/packagist/dt/koenhoeijmakers/paper-key-generator.svg?colorB=brightgreen)](https://packagist.org/packages/koenhoeijmakers/paper-key-generator)

A paper key generator for PHP, simply generates a count of words to be used as a paper key.

## Installation

Require the package with composer.
```php
composer require koenhoeijmakers/paper-key-generator
```

## Usage

Create a new instance of the class and call the `->make()` method.
```php
$factory = PaperKeyFactory::english();
$factory->make();

// surface curtain method raw swap bitter zone pink seat rookie marble dog
```

Or you can set a different divider and / or word count.
```php
$factory->setDivider('-')->setCount(6)->make();

// doctor-clown-settle-material-smooth-away
```

Which can also be done on the fly.
```php
$factory->make([
    'divider' => '=',
    'count'   => 8,
]);

// include=ecology=list=rail=canal=slush=gaze=marriage
```

### Credits

- [Trezor (python mnemonic)](https://github.com/trezor/python-mnemonic) - For the list of words.

# Paper Key Generator
[![Packagist](https://img.shields.io/packagist/v/koenhoeijmakers/paper-key-generator.svg?colorB=brightgreen)](https://packagist.org/packages/koenhoeijmakers/paper-key-generator)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/koenhoeijmakers/paper-key-generator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/koenhoeijmakers/paper-key-generator/?branch=master)
[![license](https://img.shields.io/github/license/koenhoeijmakers/paper-key-generator.svg?colorB=brightgreen)](https://github.com/koenhoeijmakers/paper-key-generator)
[![Packagist](https://img.shields.io/packagist/dt/koenhoeijmakers/paper-key-generator.svg?colorB=brightgreen)](https://packagist.org/packages/koenhoeijmakers/paper-key-generator)

A paper key generator for PHP, simply generates a count of words to be used as a paper key.

## Installation

Require the package with composer.
```
composer require koenhoeijmakers/paper-key-generator
```

## Usage

Create a new instance of the class, which can be done with the PaperKeyFactory, or by just instancing one (make sure you inject a valid WordList contract).
```php
$paperKey = new PaperKeyGenerator(new EnglishWordList());
$paperKey = PaperKeyFactory::english();
```

And then call the `->make()` method.
```php
$paperKey->make();

// surface curtain method raw swap bitter zone pink seat rookie marble dog
```

Optionally you can set a different divider and / or word count.
```php
$paperKey->setDivider('-')->setCount(6)->make();

// doctor-clown-settle-material-smooth-away
```

Which can also be done on the fly.
```php
$paperKey->make([
    'divider' => '=',
    'count'   => 8,
]);

// include=ecology=list=rail=canal=slush=gaze=marriage
```

### Credits

- [Trezor (python mnemonic)](https://github.com/trezor/python-mnemonic) - For the list of words.

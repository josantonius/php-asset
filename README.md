# PHP Asset library

[![Latest Stable Version](https://poser.pugx.org/josantonius/asset/v/stable)](https://packagist.org/packages/josantonius/asset) [![Total Downloads](https://poser.pugx.org/josantonius/asset/downloads)](https://packagist.org/packages/josantonius/asset) [![Latest Unstable Version](https://poser.pugx.org/josantonius/asset/v/unstable)](https://packagist.org/packages/josantonius/asset) [![License](https://poser.pugx.org/josantonius/asset/license)](https://packagist.org/packages/josantonius/asset)

[Spanish version](README-ES.md)

PHP library for save CSS and JS files to be displayed in same place.

---

- [Installation](#installation)
- [Requirements](#requirements)
- [Quick Start and Examples](#quick-start-and-examples)
- [Available Methods](#available-methods)
- [Usage](#usage)
- [Tests](#tests)
- [Exception Handler](#exception-handler)
- [Contribute](#contribute)
- [Repository](#repository)
- [Author](#author)
- [Licensing](#licensing)

---

### Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install PHP Asset library, simply:

    $ composer require Josantonius/Asset

### Requirements

This library is supported by PHP versions 5.6 or higher and is compatible with HHVM versions 3.0 or higher.

### Quick Start and Examples

To use this class, simply:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Asset\Asset;
```
### Available Methods

Available methods in this library:

```php
Asset::resource();
Asset::js();
Asset::css();
```
### Usage

Example of use for this library:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Asset\Asset;

Asset::css(
    'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'
);

Asset::js(array(
    'https://code.jquery.com/jquery-2.2.3.min.js',
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'
));

/* 
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-2.2.3.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
*/
```

### Tests 

To use the [test](tests) class, simply:

```php
<?php
$loader = require __DIR__ . '/vendor/autoload.php';

$loader->addPsr4('Josantonius\\Asset\\Tests\\', __DIR__ . '/vendor/josantonius/asset/tests');

use Josantonius\Asset\Tests\AssetTest;

```
Available test methods in this library:

```php
AssetTest::testAddOneCssFile();
AssetTest::testAddMultipleCssFile();
AssetTest::testAddOneJsFile();
AssetTest::testAddMultipleJsFile();
AssetTest::testAddOneJsFileAttr();
AssetTest::testAddMultipleJsFileAttr();
AssetTest::testAddMultipleJsFileSameAttr();
```

### Exception Handler

This library uses [exception handler](src/Exception) that you can customize.
### Contribute
1. Check for open issues or open a new issue to start a discussion around a bug or feature.
1. Fork the repository on GitHub to start making your changes.
1. Write one or more tests for the new feature or that expose the bug.
1. Make code changes to implement the feature or fix the bug.
1. Send a pull request to get your changes merged and published.

This is intended for large and long-lived objects.

### Repository

All files in this repository were created and uploaded automatically with [Reposgit Creator](https://github.com/Josantonius/BASH-Reposgit).

### Author

Maintained by [Josantonius](https://github.com/Josantonius/).

### Licensing

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.
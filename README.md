# PHP Asset library

[![Latest Stable Version](https://poser.pugx.org/josantonius/asset/v/stable)](https://packagist.org/packages/josantonius/asset) [![Total Downloads](https://poser.pugx.org/josantonius/asset/downloads)](https://packagist.org/packages/josantonius/asset) [![Latest Unstable Version](https://poser.pugx.org/josantonius/asset/v/unstable)](https://packagist.org/packages/josantonius/asset) [![License](https://poser.pugx.org/josantonius/asset/license)](https://packagist.org/packages/josantonius/asset) [![Travis](https://travis-ci.org/Josantonius/PHP-Asset.svg)](https://github.com/Josantonius/PHP-Asset)

[Versión en español](README-ES.md)

PHP library for save CSS and JS files to be displayed in same place.

---

- [Installation](#installation)
- [Requirements](#requirements)
- [Quick Start and Examples](#quick-start-and-examples)
- [Available Methods](#available-methods)
- [Usage](#usage)
- [Tests](#tests)
- [Contribute](#contribute)
- [Repository](#repository)
- [License](#license)
- [Copyright](#copyright)

---

<p align="center"><strong>Take a look at the code</strong></p>

<p align="center">
  <a href="https://youtu.be/K6hdRg00YUs" title="Take a look at the code">
  	<img src="https://raw.githubusercontent.com/Josantonius/PHP-Algorithm/master/resources/youtube-thumbnail.jpg">
  </a>
</p>

---

### Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install PHP Asset library, simply:

    $ composer require Josantonius/Asset

The previous command will only install the necessary files, if you prefer to download the entire source code (including tests, vendor folder, exceptions not used, docs...) you can use:

    $ composer require Josantonius/Asset --prefer-source

Or you can also clone the complete repository with Git:

	$ git clone https://github.com/Josantonius/PHP-Asset.github.com

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
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
*/
```

### Tests 

To run [tests](tests/Asset) simply:

    $ git clone https://github.com/Josantonius/PHP-Asset.git
    
    $ cd PHP-Asset

    $ phpunit

### Contribute
1. Check for open issues or open a new issue to start a discussion around a bug or feature.
1. Fork the repository on GitHub to start making your changes.
1. Write one or more tests for the new feature or that expose the bug.
1. Make code changes to implement the feature or fix the bug.
1. Send a pull request to get your changes merged and published.

This is intended for large and long-lived objects.

### Repository

All files in this repository were created and uploaded automatically with [Reposgit Creator](https://github.com/Josantonius/BASH-Reposgit).

### License

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.

### Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com). 
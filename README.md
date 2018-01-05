# PHP Asset library

[![Latest Stable Version](https://poser.pugx.org/josantonius/Asset/v/stable)](https://packagist.org/packages/josantonius/Asset) [![Latest Unstable Version](https://poser.pugx.org/josantonius/Asset/v/unstable)](https://packagist.org/packages/josantonius/Asset) [![License](https://poser.pugx.org/josantonius/Asset/license)](LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/d93b5c9ef2784bc7a4d1577f0835c41d)](https://www.codacy.com/app/Josantonius/PHP-Asset?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Josantonius/PHP-Asset&amp;utm_campaign=Badge_Grade) [![Total Downloads](https://poser.pugx.org/josantonius/Asset/downloads)](https://packagist.org/packages/josantonius/Asset) [![Travis](https://travis-ci.org/Josantonius/PHP-Asset.svg)](https://travis-ci.org/Josantonius/PHP-Asset) [![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/) [![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/) [![CodeCov](https://codecov.io/gh/Josantonius/PHP-Asset/branch/master/graph/badge.svg)](https://codecov.io/gh/Josantonius/PHP-Asset)

[Versión en español](README-ES.md)

PHP library for handling styles and scripts; Add, minify, unify and print.

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Available Methods](#available-methods)
- [Quick Start](#quick-start)
- [Usage](#usage)
- [Tests](#tests)
- [TODO](#-todo)
- [Contribute](#contribute)
- [Repository](#repository)
- [License](#license)
- [Copyright](#copyright)

---

## Requirements

This library is supported by **PHP versions 5.6** or higher and is compatible with **HHVM versions 3.0** or higher.

## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/download/).

To install **PHP Asset library**, simply:

    $ composer require Josantonius/Asset

The previous command will only install the necessary files, if you prefer to **download the entire source code** you can use:

    $ composer require Josantonius/Asset --prefer-source

You can also **clone the complete repository** with Git:

    $ git clone https://github.com/Josantonius/PHP-Asset.git

Or **install it manually**:

[Download Asset.php](https://raw.githubusercontent.com/Josantonius/PHP-Asset/master/src/Asset.php):

    $ wget https://raw.githubusercontent.com/Josantonius/PHP-Asset/master/src/Asset.php

[Download Json.php](https://raw.githubusercontent.com/Josantonius/PHP-Json/master/src/Json.php):

    $ wget https://raw.githubusercontent.com/Josantonius/PHP-Json/master/src/Json.php

## Available Methods

Available methods in this library:

### - Add scripts or styles:

```php
Asset::add($type, $data);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $type | 'script' or 'style' | string | Yes | |

| Attribute | key | Description | Type | Required | Default
| --- | --- | --- | --- | --- | --- |
| $data | | Settings | array | Yes | |
|  | name | Unique ID | string | Yes | |
|  | url | Url to file | string | Yes | |
|  | version | Version | string | No | false |
|  | footer | **Only for scripts** - Attach in footer | boolean | No | true |
|  | attr | **Only for scripts** - Attribute (defer/sync) | string | No | |

**# Return** (boolean)

### - Check if a particular style or script has been added:

```php
Asset::isAdded($type, $name);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $type | 'script' or 'style' | string | Yes | |
| $name | Unique ID | string | Yes | |

**# Return** (boolean)

### - Remove script or style:

```php
Asset::remove($type, $name);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $type | 'script' or 'style' | string | Yes | |
| $name | Unique ID | string | Yes | |

**# Return** (boolean true)

### - Sets whether to merge the content of files into a single file:

```php
Asset::unify($uniqueID, $params, $minify);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $uniqueID | Unique identifier for unified file | string | Yes | |
| $params | Path urls | mixed | Yes | |
| $minify | Minimize file content | boolean | No | false |

**# Return** (boolean true)

### - Output stylesheet:

```php
Asset::outputStyles($output);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $output | Output for styles | string | No | '' |

**# Return** (string|false) → Output or false

### - Output scripts:

```php
Asset::outputScripts($place, $output);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $place | 'header' or 'footer' | string | Yes | |
| $output | Output for scripts | string | No | '' |

**# Return** (string|false) → Output or false

## Quick Start

To use this class with **Composer**:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Asset\Asset;
```

Or If you installed it **manually**, use it:

```php
require_once __DIR__ . '/Asset.php';
require_once __DIR__ . '/Json.php';

use Josantonius\Asset\Asset;
```

## Usage

Example of use for this library:

### - Add styles:

```php
Asset::add('style', [
    'name' => 'style-first',
    'url'  => 'http://josantonius.com/css/style.css',
]);

Asset::add('style', [
    'name'    => 'style-second',
    'url'     => 'http://josantonius.com/css/custom.css',
    'version' => '1.1.1'
]);
```

### - Add scripts:

```php
Asset::add('script', [
    'name' => 'script-first',
    'url'  => 'http://josantonius.com/js/script.js',
]);

Asset::add('script', [
    'name'    => 'script-second',
    'url'     => 'http://josantonius.com/js/custom.js',
    'attr'    => 'defer',
    'version' => '1.1.3',
    'footer'  => false
]);
```

### - Check if resources have been added correctly:

```php
Asset::isAdded('script', 'script-first');  // true
Asset::isAdded('style', 'style-first');    // true
```

### - Delete added resources:

```php
Asset::remove('style', 'style-first')    // true
Asset::remove('script', 'script-first'); // true
```

### - Unify:

```php
Asset::unify('UniqueID', 'http://josantonius.com/min/');
```

### - Unify and minify:

```php
Asset::unify('UniqueID', 'http://josantonius.com/min/', true);
```

### - Unify specifying different url paths for styles and scripts:

```php
Asset::unify('UniqueID', [

    'styles'  => 'http://josantonius.com/min/css/',
    'scripts' => 'http://josantonius.com/min/js/'
]);
```

### - Unify and minify specifying different url paths for styles and scripts:

```php
Asset::unify('UniqueID', [

    'styles'  => 'http://josantonius.com/min/css/',
    'scripts' => 'http://josantonius.com/min/js/'

], true);
```

### - Output styles:

```php
echo Asset::outputStyles();
```

### - Output footer scripts:

```php
echo Asset::outputScripts('footer');
```

### - Output header scripts:

```php
echo Asset::outputScripts('header');
```

## Tests 

To run [tests](tests) you just need [composer](http://getcomposer.org/download/) and to execute the following:

    $ git clone https://github.com/Josantonius/PHP-Asset.git
    
    $ cd PHP-Asset

    $ composer install

Run unit tests with [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Run [PSR2](http://www.php-fig.org/psr/psr-2/) code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Run [PHP Mess Detector](https://phpmd.org/) tests to detect inconsistencies in code style:

    $ composer phpmd

Run all previous tests:

    $ composer tests

## ☑ TODO

- [ ] Add new feature.
- [ ] Improve tests.
- [ ] Improve documentation.
- [ ] Refactor code for disabled code style rules. See [phpmd.xml](phpmd.xml) and [.php_cs.dist](.php_cs.dist).

## Contribute

If you would like to help, please take a look at the list of
[issues](https://github.com/Josantonius/PHP-Asset/issues) or the [To Do](#-todo) checklist.

**Pull requests**

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Run the command `composer install` to install the dependencies.
  This will also install the [dev dependencies](https://getcomposer.org/doc/03-cli.md#install).
* Run the command `composer fix` to excute code standard fixers.
* Run the [tests](#tests).
* Create a **branch**, **commit**, **push** and send me a
  [pull request](https://help.github.com/articles/using-pull-requests).

## Repository

The file structure from this repository was created with [PHP-Skeleton](https://github.com/Josantonius/PHP-Skeleton).

## License

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.

## Copyright

2016 - 2018 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).
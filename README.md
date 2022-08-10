# PHP Asset library

[![Latest Stable Version](https://poser.pugx.org/josantonius/asset/v/stable)](https://packagist.org/packages/josantonius/asset)
[![License](https://poser.pugx.org/josantonius/asset/license)](LICENSE)
[![Total Downloads](https://poser.pugx.org/josantonius/asset/downloads)](https://packagist.org/packages/josantonius/asset)
[![CI](https://github.com/josantonius/php-asset/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/josantonius/php-asset/actions/workflows/ci.yml)
[![CodeCov](https://codecov.io/gh/josantonius/php-asset/branch/main/graph/badge.svg)](https://codecov.io/gh/josantonius/php-asset)
[![PSR1](https://img.shields.io/badge/PSR-1-f57046.svg)](https://www.php-fig.org/psr/psr-1/)
[![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](https://www.php-fig.org/psr/psr-4/)
[![PSR12](https://img.shields.io/badge/PSR-12-1abc9c.svg)](https://www.php-fig.org/psr/psr-12/)

**Translations**: [Español](.github/lang/es-ES/README.md)

PHP library for handling HTML links and scripts.

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Available Classes](#available-classes)
  - [Asset Class](#asset-class)
  - [Asset Facade](#asset-facade)
  - [BodyScript Class](#bodyscript-class)
  - [HeadScript Class](#headscript-class)
  - [Link Class](#link-class)
- [Usage](#usage)
- [Tests](#tests)
- [TODO](#todo)
- [Changelog](#changelog)
- [Contribution](#contribution)
- [Sponsor](#Sponsor)
- [License](#license)

---

## Requirements

This library is compatible with the PHP versions: 8.1.

## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/download/).

To install **PHP Asset library**, simply:

```console
composer require josantonius/asset
```

The previous command will only install the necessary files,
if you prefer to **download the entire source code** you can use:

```console
composer require josantonius/asset --prefer-source
```

You can also **clone the complete repository** with Git:

```console
git clone https://github.com/josantonius/php-asset.git
```

## Available Classes

### Asset Class

```php
use Josantonius\Asset\Asset;
```

Create object:

```php
$asset = new Asset();
```

Print the added scripts for the body:

```php
$asset->outputBodyScripts(): string
```

Print the added scripts for the head:

```php
$asset->outputHeadScripts(): string
```

Print the added links:

```php
$asset->outputLinks(): string
```

### Asset Facade

```php
use Josantonius\Asset\Facades\Asset;
```

Add body script:

```php
/**
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script
 */
Asset::addBodyScript(
    null|bool   $async          = null,
    null|string $crossorigin    = null,
    null|bool   $defer          = null,
    null|string $fetchpriority  = null,
    null|string $integrity      = null,
    null|bool   $nomodule       = null,
    null|string $nonce          = null,
    null|string $referrerpolicy = null,
    null|string $src            = null,
    null|string $type           = null
): BodyScript
```

Add head script:

```php
/**
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script
 */
Asset::addHeadScript(
    null|bool   $async          = null,
    null|string $crossorigin    = null,
    null|bool   $defer          = null,
    null|string $fetchpriority  = null,
    null|string $integrity      = null,
    null|bool   $nomodule       = null,
    null|string $nonce          = null,
    null|string $referrerpolicy = null,
    null|string $src            = null,
    null|string $type           = null
): HeadScript
```

Add link:

```php
/**
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link
 */
Asset::addLink(
    null|string $as             = null,
    null|string $crossorigin    = null,
    null|bool   $disabled       = null,
    null|string $fetchpriority  = null,
    null|string $href           = null,
    null|string $hreflang       = null,
    null|string $imagesizes     = null,
    null|string $imagesrcset    = null,
    null|string $integrity      = null,
    null|string $media          = null,
    null|string $prefetch       = null,
    null|string $referrerpolicy = null,
    null|string $rel            = null,
    null|string $sizes          = null,
    null|string $target         = null,
    null|string $title          = null,
    null|string $type           = null,
): Link
```

Print the added scripts for the body:

```php
Asset::outputBodyScripts(): string
```

Print the added scripts for the head:

```php
Asset::outputHeadScripts(): string
```

Print the added links:

```php
Asset::outputLinks(): string
```

### BodyScript Class

```php
use Josantonius\Asset\Elements\BodyScript;
```

Add body script:

```php
/**
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script
 */
new BodyScript(
    null|bool   $async          = null,
    null|string $crossorigin    = null,
    null|bool   $defer          = null,
    null|string $fetchpriority  = null,
    null|string $integrity      = null,
    null|bool   $nomodule       = null,
    null|string $nonce          = null,
    null|string $referrerpolicy = null,
    null|string $src            = null,
    null|string $type           = null
);
```

### HeadScript Class

```php
use Josantonius\Asset\Elements\HeadScript;
```

Add head script:

```php
/**
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script
 */
new HeadScript(
    null|bool   $async          = null,
    null|string $crossorigin    = null,
    null|bool   $defer          = null,
    null|string $fetchpriority  = null,
    null|string $integrity      = null,
    null|bool   $nomodule       = null,
    null|string $nonce          = null,
    null|string $referrerpolicy = null,
    null|string $src            = null,
    null|string $type           = null
);
```

### Link Class

```php
use Josantonius\Asset\Elements\Link;
```

Add link:

```php
/**
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link
 */
new Link(
    null|string $as             = null,
    null|string $crossorigin    = null,
    null|bool   $disabled       = null,
    null|string $fetchpriority  = null,
    null|string $href           = null,
    null|string $hreflang       = null,
    null|string $imagesizes     = null,
    null|string $imagesrcset    = null,
    null|string $integrity      = null,
    null|string $media          = null,
    null|string $prefetch       = null,
    null|string $referrerpolicy = null,
    null|string $rel            = null,
    null|string $sizes          = null,
    null|string $target         = null,
    null|string $title          = null,
    null|string $type           = null,
);
```

## Usage

Example of use for this library:

### Add body script

```php
use Josantonius\Asset\Elements\BodyScript;

new BodyScript(
    src: 'https://example.com/script.js'
);
```

```php
use Josantonius\Asset\Facades\Asset;

Asset::addBodyScript(
    src: 'script.js',
    type: 'text/javascript'
);
```

### Add head script

```php
use Josantonius\Asset\Elements\HeadScript;

new HeadScript(
    src: 'script.js',
    type: 'module'
);
```

```php
use Josantonius\Asset\Facades\Asset;

Asset::addHeadScript(
    crossorigin: 'anonymous',
    defer: true,
    integrity: 'sha256-n9+',
    src: 'https://example.com/script.js',
    type: 'text/javascript'
);
```

### Add link

```php
use Josantonius\Asset\Elements\Link;

new Link(
    crossorigin: 'anonymous',
    href: 'https://example.com/style.css',
    integrity: 'sha256-n9+',
    media: 'all',
    rel: 'stylesheet'
);
```

```php
use Josantonius\Asset\Facades\Asset;

Asset::addLink(
    href: 'https://example.com/style.css',
    rel: 'stylesheet'
);
```

### Print the added scripts for the body

```php
use Josantonius\Asset\Asset;

$asset = new Asset();

echo $asset->outputBodyScripts();
```

```php
use Josantonius\Asset\Facades\Asset;

echo Asset::outputBodyScripts();
```

### Print the added scripts for the head

```php
use Josantonius\Asset\Asset;

$asset = new Asset();

echo $asset->outputHeadScripts();
```

```php
use Josantonius\Asset\Facades\Asset;

echo Asset::outputHeadScripts();
```

### Print the added links

```php
use Josantonius\Asset\Asset;

$asset = new Asset();

echo $asset->outputLinks();
```

```php
use Josantonius\Asset\Facades\Asset;

echo Asset::outputLinks();
```

### Full example

**`index.php`**

```php
use Josantonius\Asset\Elements\Link;
use Josantonius\Asset\Elements\BodyScript;
use Josantonius\Asset\Elements\HeadScript;

new BodyScript(src: 'foo.js', async: true);
new BodyScript(src: 'bar.js', type: 'text/javascript');

new HeadScript(src: 'https://example.com/foo.js', type: 'module');
new HeadScript(src: 'https://example.com/bar.js', defer: true);

new Link(href: 'https://example.com/foo.css', rel: 'stylesheet');
new Link(href: 'https://example.com/bar.css', rel: 'stylesheet', media: 'all');
```

**`page.html`**

```html
<?php
use Josantonius\Asset\Asset;
$asset = new Asset();
?>
<html>
  <head>
    <?= $asset->outputLinks() ?>
    <?= $asset->outputHeadScripts() ?>
  </head>
  <body>
    <?= $asset->outputBodyScripts() ?>
  </body>
</html>
```

**Result:**

```html
<html>
  <head>
    <link href="https://example.com/foo.css" rel="stylesheet">
    <link href="https://example.com/bar.css" rel="stylesheet" media="all">
    <script src="https://example.com/foo.js" type="module"></script>
    <script defer src="https://example.com/bar.js"></script>
  </head>
  <body>
    <script async src="foo.js"></script>
    <script src="bar.js" type="text/javascript"></script>
  </body>
</html>
```

### Full example using the facade

**`index.php`**

```php
use Josantonius\Asset\Facades\Asset;

Asset::addBodyScript(src: 'foo.js', async: true);
Asset::addBodyScript(src: 'bar.js', type: 'text/javascript');

Asset::addHeadScript(src: 'https://example.com/foo.js', type: 'module');
Asset::addHeadScript(src: 'https://example.com/bar.js', defer: true);

Asset::addLink(href: 'https://example.com/foo.css', rel: 'stylesheet');
Asset::addLink(href: 'https://example.com/bar.css', rel: 'stylesheet', media: 'all');
```

**`page.html`**

```html
<?php
use Josantonius\Asset\Facades\Asset;
?>
<html>
  <head>
    <?= Asset::outputLinks() ?>
    <?= Asset::outputHeadScripts() ?>
  </head>
  <body>
    <?= Asset::outputBodyScripts() ?>
  </body>
</html>
```

**Result:**

```html
<html>
  <head>
    <link href="https://example.com/foo.css" rel="stylesheet">
    <link href="https://example.com/bar.css" rel="stylesheet" media="all">
    <script src="https://example.com/foo.js" type="module"></script>
    <script defer src="https://example.com/bar.js"></script>
  </head>
  <body>
    <script async src="foo.js"></script>
    <script src="bar.js" type="text/javascript"></script>
  </body>
</html>
```

## Tests

To run [tests](tests) you just need [composer](http://getcomposer.org/download/)
and to execute the following:

```console
git clone https://github.com/josantonius/php-asset.git
```

```console
cd php-asset
```

```console
composer install
```

Run unit tests with [PHPUnit](https://phpunit.de/):

```console
composer phpunit
```

Run code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

```console
composer phpcs
```

Run [PHP Mess Detector](https://phpmd.org/) tests to detect inconsistencies in code style:

```console
composer phpmd
```

Run all previous tests:

```console
composer tests
```

## TODO

- [ ] Add new feature
- [ ] Improve tests
- [ ] Improve documentation
- [ ] Improve English translation in the README file
- [ ] Refactor code for disabled code style rules (see [phpmd.xml](phpmd.xml) and [phpcs.xml](phpcs.xml))
- [ ] Add other HTML elements
- [ ] Add feature to add code between the `<script>` tags

## Changelog

Detailed changes for each release are documented in the
[release notes](https://github.com/josantonius/php-asset/releases).

## Contribution

Please make sure to read the [Contributing Guide](.github/CONTRIBUTING.md), before making a pull
request, start a discussion or report a issue.

Thanks to all [contributors](https://github.com/josantonius/php-asset/graphs/contributors)! :heart:

## Sponsor

If this project helps you to reduce your development time,
[you can sponsor me](https://github.com/josantonius#sponsor) to support my open source work :blush:

## License

This repository is licensed under the [MIT License](LICENSE).

Copyright © 2016-present, [Josantonius](https://github.com/josantonius#contact)

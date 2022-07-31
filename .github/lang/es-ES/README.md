# PHP Asset library

[![Latest Stable Version](https://poser.pugx.org/josantonius/asset/v/stable)](https://packagist.org/packages/josantonius/asset)
[![License](https://poser.pugx.org/josantonius/asset/license)](LICENSE)
[![Total Downloads](https://poser.pugx.org/josantonius/asset/downloads)](https://packagist.org/packages/josantonius/asset)
[![CI](https://github.com/josantonius/php-asset/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/josantonius/php-asset/actions/workflows/ci.yml)
[![CodeCov](https://codecov.io/gh/josantonius/php-asset/branch/main/graph/badge.svg)](https://codecov.io/gh/josantonius/php-asset)
[![PSR1](https://img.shields.io/badge/PSR-1-f57046.svg)](https://www.php-fig.org/psr/psr-1/)
[![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](https://www.php-fig.org/psr/psr-4/)
[![PSR12](https://img.shields.io/badge/PSR-12-1abc9c.svg)](https://www.php-fig.org/psr/psr-12/)

[English version](README.md)

Biblioteca PHP para el manejo de _links_ y _scripts_ HTML.

---

- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Métodos disponibles](#métodos-disponibles)
- [Cómo empezar](#cómo-empezar)
- [Uso](#uso)
- [Tests](#tests)
- [Tareas pendientes](#tareas-pendientes)
- [Registro de Cambios](#registro-de-cambios)
- [Contribuir](#contribuir)
- [Patrocinar](#patrocinar)
- [Licencia](#licencia)

---

## Requisitos

Esta biblioteca es compatible con las versiones de PHP: 8.1.

## Instalación

La mejor forma de instalar esta extensión es a través de [Composer](http://getcomposer.org/download/).

Para instalar **PHP Asset library**, simplemente escribe:

```console
composer require josantonius/asset
```

El comando anterior sólo instalará los archivos necesarios,
si prefieres **descargar todo el código fuente** puedes utilizar:

```console
composer require josantonius/asset --prefer-source
```

También puedes **clonar el repositorio** completo con Git:

```console
git clone https://github.com/josantonius/php-asset.git
```

## Métodos disponibles

Métodos disponibles en esta biblioteca:

### Agregar _script_ en el _body_

```php
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

### Agregar _script_ en el _head_

```php
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

### Agregar _link_

```php
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

### Imprime los _scripts_ añadidos para el _body_

```php
$asset->outputBodyScripts(): string
```

### Imprime los _scripts_ añadidos para el _head_

```php
$asset->outputHeadScripts(): string
```

### Imprime los _links_ añadidos

```php
$asset->outputLinks(): string
```

## Cómo empezar

### Utilizando objetos

```php
use Josantonius\Asset\Asset;
use Josantonius\Asset\Elements\BodyScript;
use Josantonius\Asset\Elements\HeadScript;
use Josantonius\Asset\Elements\Link;

new BodyScript(/* ... */);
new HeadScript(/* ... */);
new Link(/* ... */);

$asset = new Asset();
```

### Utilizando la fachada

Alternativamente puedes utilizar la fachada para acceder a los métodos de manera estática:

```php
use Josantonius\Asset\Facades\Asset;
```

## Uso

Ejemplo de uso para esta biblioteca:

### - Agregar _script_ en el _body_

[Utilizando objetos](#utilizando-objetos):

```php
new BodyScript(
    src: 'https://example.com/script.js'
);
```

[Utilizando la fachada](#utilizando-la-fachada):

```php
Asset::addBodyScript(
    src: 'script.js',
    type: 'text/javascript'
);
```

### - Agregar _script_ en el _head_

[Utilizando objetos](#utilizando-objetos):

```php
new HeadScript(
    src: 'script.js',
    type: 'module'
);
```

[Utilizando la fachada](#utilizando-la-fachada):

```php
Asset::addHeadScript(
    crossorigin: 'anonymous',
    defer: true,
    integrity: 'sha256-n9+',
    src: 'https://example.com/script.js',
    type: 'text/javascript'
);
```

### - Agregar _link_

[Utilizando objetos](#utilizando-objetos):

```php
new Link(
    crossorigin: 'anonymous',
    href: 'https://example.com/style.css',
    integrity: 'sha256-n9+',
    media: 'all',
    rel: 'stylesheet'
);
```

[Utilizando la fachada](#utilizando-la-fachada):

```php
Asset::addLink(
    href: 'https://example.com/style.css',
    rel: 'stylesheet'
);
```

### - Imprimir los _scripts_ añadidos para el _body_

[Utilizando objetos](#utilizando-objetos):

```php
echo $asset->outputBodyScripts();
```

[Utilizando la fachada](#utilizando-la-fachada):

```php
echo Asset::outputBodyScripts();
```

### - Imprimir los _scripts_ añadidos para el _head_

[Utilizando objetos](#utilizando-objetos):

```php
echo $asset->outputHeadScripts();
```

[Utilizando la fachada](#utilizando-la-fachada):

```php
echo Asset::outputHeadScripts();
```

### - Imprimir los _links_ añadidos

[Utilizando objetos](#utilizando-objetos):

```php
echo $asset->outputLinks();
```

[Utilizando la fachada](#utilizando-la-fachada):

```php
echo Asset::outputLinks();
```

### - Ejemplo completo

**Utilizando objetos**:

```php
use Josantonius\Asset\Elements\BodyScript;
use Josantonius\Asset\Elements\HeadScript;
use Josantonius\Asset\Elements\Link;

new BodyScript(src: 'foo.js', async: true);
new BodyScript(src: 'bar.js', type: 'text/javascript');

new HeadScript(src: 'https://example.com/foo.js', type: 'module');
new HeadScript(src: 'https://example.com/bar.js', defer: true);

new Link(href: 'https://example.com/foo.css', rel: 'stylesheet');
new Link(href: 'https://example.com/bar.css', rel: 'stylesheet', media: 'all');
```

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

**Utilizando la fachada**:

```php
use Josantonius\Asset\Facades\Asset;

Asset::addBodyScript(src: 'foo.js', async: true);
Asset::addBodyScript(src: 'bar.js', type: 'text/javascript');

Asset::addHeadScript(src: 'https://example.com/foo.js', type: 'module');
Asset::addHeadScript(src: 'https://example.com/bar.js', defer: true);

Asset::addLink(href: 'https://example.com/foo.css', rel: 'stylesheet');
Asset::addLink(href: 'https://example.com/bar.css', rel: 'stylesheet', media: 'all');
```

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

**Resultado:**

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

Para ejecutar las [pruebas](tests) necesitarás [Composer](http://getcomposer.org/download/)
y seguir los siguientes pasos:

```console
git clone https://github.com/josantonius/php-asset.git
```

```console
cd php-asset
```

```console
composer install
```

Ejecutar pruebas unitarias con [PHPUnit](https://phpunit.de/):

```console
composer phpunit
```

Ejecutar pruebas de estándares de código con [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

```console
composer phpcs
```

Ejecutar pruebas con [PHP Mess Detector](https://phpmd.org/)
para detectar inconsistencias en el estilo de codificación:

```console
composer phpmd
```

Ejecutar todas las pruebas anteriores:

```console
composer tests
```

## Tareas pendientes

- [ ] Añadir nueva funcionalidad
- [ ] Mejorar pruebas
- [ ] Mejorar documentación
- [ ] Mejorar la traducción al inglés en el archivo README
- [ ] Refactorizar código para las reglas de estilo de código deshabilitadas
(ver [phpmd.xml](phpmd.xml) y [phpcs.xml](phpcs.xml))
- [ ] Añadir otros elementos HTML
- [ ] Añadir la función de agregar código entre las etiquetas `<script>`

## Registro de Cambios

Los cambios detallados de cada versión se documentan en las
[notas de la misma](https://github.com/josantonius/php-asset/releases).

## Contribuir

Por favor, asegúrate de leer la [Guía de contribución](CONTRIBUTING.md) antes de hacer un
_pull request_, comenzar una discusión o reportar un _issue_.

¡Gracias por [colaborar](https://github.com/josantonius/php-asset/graphs/contributors)! :heart:

## Patrocinar

Si este proyecto te ayuda a reducir el tiempo de desarrollo,
[puedes patrocinarme](https://github.com/josantonius/lang/es-ES/README.md#patrocinar)
para apoyar mi trabajo :blush:

## Licencia

Este repositorio tiene una licencia [MIT License](LICENSE).

Copyright © 2016-actualidad, [Josantonius](https://github.com/josantonius/lang/es-ES/README.md#contacto)

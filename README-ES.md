# PHP Asset library

[![Latest Stable Version](https://poser.pugx.org/josantonius/asset/v/stable)](https://packagist.org/packages/josantonius/asset) [![Total Downloads](https://poser.pugx.org/josantonius/asset/downloads)](https://packagist.org/packages/josantonius/asset) [![Latest Unstable Version](https://poser.pugx.org/josantonius/asset/v/unstable)](https://packagist.org/packages/josantonius/asset) [![License](https://poser.pugx.org/josantonius/asset/license)](https://packagist.org/packages/josantonius/asset)

[Spanish version](README-ES.md)

Librería PHP para cargar archivos CSS/JS desde diferentes lugares y mostrarlos en un mismo lugar.

---

- [Instalación](#instalación)
- [Requisitos](#requisitos)
- [Cómo empezar y ejemplos](#cómo-empezar-y-ejemplos)
- [Métodos disponibles](#métodos-disponibles)
- [Uso](#uso)
- [Tests](#tests)
- [Manejador de excepciones](#manejador-de-excepciones)
- [Contribuir](#contribuir)
- [Repositorio](#repositorio)
- [Autor](#autor)
- [Licencia](#licencia)

---

### Instalación 

La mejor forma de instalar esta extensión es a través de [composer](http://getcomposer.org/download/).

Para instalar PHP Asset library, simplemente escribe:

    $ composer require Josantonius/Asset

### Requisitos

Esta ĺibrería es soportada por versiones de PHP 5.6 o superiores y es compatible con versiones de HHVM 3.0 o superiores.

### Cómo empezar y ejemplos

Para utilizar esta librería, simplemente:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Asset\Asset;
```
### Métodos disponibles

Métodos disponibles en esta librería:

```php
Asset::resource();
Asset::js();
Asset::css();
```
### Uso

Ejemplo de uso para esta librería:

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

Para utilizar la clase de [pruebas](tests), simplemente:

```php
<?php
$loader = require __DIR__ . '/vendor/autoload.php';

$loader->addPsr4('Josantonius\\Asset\\Tests\\', __DIR__ . '/vendor/josantonius/asset/tests');

use Josantonius\Asset\Tests\AssetTest;
```
Métodos de prueba disponibles en esta librería:

```php
AssetTest::testAddOneCssFile();
AssetTest::testAddMultipleCssFile();
AssetTest::testAddOneJsFile();
AssetTest::testAddMultipleJsFile();
AssetTest::testAddOneJsFileAttr();
AssetTest::testAddMultipleJsFileAttr();
AssetTest::testAddMultipleJsFileSameAttr();
```

### Manejador de excepciones

Esta librería utiliza [control de excepciones](src/Exception) que puedes personalizar a tu gusto.
### Contribuir
1. Comprobar si hay incidencias abiertas o abrir una nueva para iniciar una discusión en torno a un fallo o función.
1. Bifurca la rama del repositorio en GitHub para iniciar la operación de ajuste.
1. Escribe una o más pruebas para la nueva característica o expón el error.
1. Haz cambios en el código para implementar la característica o reparar el fallo.
1. Envía pull request para fusionar los cambios y que sean publicados.

Esto está pensado para proyectos grandes y de larga duración.

### Repositorio

Los archivos de este repositorio se crearon y subieron automáticamente con [Reposgit Creator](https://github.com/Josantonius/BASH-Reposgit).

### Autor

Mantenido por [Josantonius](https://github.com/Josantonius/).

### Licencia

Este proyecto está licenciado bajo la **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.
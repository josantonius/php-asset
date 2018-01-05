# PHP Asset library

[![Latest Stable Version](https://poser.pugx.org/josantonius/Asset/v/stable)](https://packagist.org/packages/josantonius/Asset) [![Latest Unstable Version](https://poser.pugx.org/josantonius/Asset/v/unstable)](https://packagist.org/packages/josantonius/Asset) [![License](https://poser.pugx.org/josantonius/Asset/license)](LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/d93b5c9ef2784bc7a4d1577f0835c41d)](https://www.codacy.com/app/Josantonius/PHP-Asset?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Josantonius/PHP-Asset&amp;utm_campaign=Badge_Grade) [![Total Downloads](https://poser.pugx.org/josantonius/Asset/downloads)](https://packagist.org/packages/josantonius/Asset) [![Travis](https://travis-ci.org/Josantonius/PHP-Asset.svg)](https://travis-ci.org/Josantonius/PHP-Asset) [![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/) [![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/) [![CodeCov](https://codecov.io/gh/Josantonius/PHP-Asset/branch/master/graph/badge.svg)](https://codecov.io/gh/Josantonius/PHP-Asset)

[English version](README.md)

Biblioteca PHP para manejo de estilos y scripts; Añadir, minimizar, unificar e imprimir.

---

- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Métodos disponibles](#métodos-disponibles)
- [Cómo empezar](#cómo-empezar)
- [Uso](#uso)
- [Tests](#tests)
- [Tareas pendientes](#-tareas-pendientes)
- [Contribuir](#contribuir)
- [Repositorio](#repositorio)
- [Licencia](#licencia)
- [Copyright](#copyright)

---

## Requisitos

Esta clase es soportada por versiones de **PHP 5.6** o superiores y es compatible con versiones de **HHVM 3.0** o superiores.

## Instalación 

La mejor forma de instalar esta extensión es a través de [Composer](http://getcomposer.org/download/).

Para instalar **PHP Asset library**, simplemente escribe:

    $ composer require Josantonius/Asset

El comando anterior sólo instalará los archivos necesarios, si prefieres **descargar todo el código fuente** puedes utilizar:

    $ composer require Josantonius/Asset --prefer-source

También puedes **clonar el repositorio** completo con Git:

    $ git clone https://github.com/Josantonius/PHP-Asset.git

O **instalarlo manualmente**:

[Descargar Asset.php](https://raw.githubusercontent.com/Josantonius/PHP-Asset/master/src/Asset.php):

    $ wget https://raw.githubusercontent.com/Josantonius/PHP-Asset/master/src/Asset.php

[Descargar Json.php](https://raw.githubusercontent.com/Josantonius/PHP-Json/master/src/Json.php):

    $ wget https://raw.githubusercontent.com/Josantonius/PHP-Json/master/src/Json.php

## Métodos disponibles

Métodos disponibles en esta biblioteca:

### - Agregar scripts o estilos:

```php
Asset::add($type, $data);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $type | 'script' o 'style' | string | Sí | |

| Atributo | clave | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- | --- |
| $data | | Settings | array | Sí | |
|  | name | ID único | string | Sí | |
|  | url | URL del archivo | string | Sí | |
|  | version | Versión | string | No | false |
|  | footer | **Solo para scripts** - Fijar en footer | boolean | No | true |
|  | attr | **Solo para scripts** - Atributo (defer/sync) | string | No | |

**# Return** (boolean)

### - Comprobar si se ha añadido un estilo o script en particular:

```php
Asset::isAdded($type, $name);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $type | 'script' o 'style' | string | Sí | |
| $name | ID único | string | Sí | |

**# Return** (boolean)

### - Eliminar script o estilo:

```php
Asset::remove($type, $name);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $type | 'script' o 'style' | string | Sí | |
| $name | ID único | string | Sí | |

**# Return** (boolean true)

### - Unificar el contenido de los archivos en un único archivo:

```php
Asset::unify($uniqueID, $params, $minify);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $uniqueID | Identificador único para el archivo unificado | string | Sí | |
| $params | Urls de ruta | mixed | Sí | |
| $minify | Minimizar el contenido del archivo | boolean | No | false |

**# Return** (boolean true)

### - Salida de hojas de estilos:

```php
Asset::outputStyles($output);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $output | Salida para estilos | string | No | '' |

**# Return** (string|false) → Estilos o false

### - Salida de hojas de scripts:

```php
Asset::outputScripts($place, $output);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $place | 'header' o 'footer' | string | Sí | |
| $output | Salida para scripts | string | No | '' |

**# Return** (string|false) → Scripts o false

## Cómo empezar

Para utilizar esta clase con **Composer**:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Asset\Asset;
```

Si la instalaste **manualmente**, utiliza:

```php
require_once __DIR__ . '/Asset.php';
require_once __DIR__ . '/Json.php';

use Josantonius\Asset\Asset;
```

## Uso

Ejemplo de uso para esta biblioteca:

### - Agregar estilos:

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

### - Agregar scripts:

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

### - Verificar si los recursos se han añadido correctamente:

```php
Asset::isAdded('script', 'script-first');  // true
Asset::isAdded('style', 'style-first');    // true
```

### - Borrar recursos añadidos:

```php
Asset::remove('style', 'style-first')    // true
Asset::remove('script', 'script-first'); // true
```

### - Unificar:

```php
Asset::unify('UniqueID', 'http://josantonius.com/min/');
```

### - Unificar y minimizar:

```php
Asset::unify('UniqueID', 'http://josantonius.com/min/', true);
```

### - Unificar indicando diferentes rutas de urls para estilos y scripts:

```php
Asset::unify('UniqueID', [

    'styles'  => 'http://josantonius.com/min/css/',
    'scripts' => 'http://josantonius.com/min/js/'
]);
```

### - Unificar y minimizar indicando diferentes rutas de urls para estilos y scripts:

```php
Asset::unify('UniqueID', [

    'styles'  => 'http://josantonius.com/min/css/',
    'scripts' => 'http://josantonius.com/min/js/'

], true);
```

### - Imprimir estilos:

```php
echo Asset::outputStyles();
```

### - Imprimir los scripts del footer:

```php
echo Asset::outputScripts('footer');
```

### - Imprimir los scripts del header:

```php
echo Asset::outputScripts('header');
```

## Tests 

Para ejecutar las [pruebas](tests) necesitarás [Composer](http://getcomposer.org/download/) y seguir los siguientes pasos:

    $ git clone https://github.com/Josantonius/PHP-Algorithm.git
    
    $ cd PHP-Algorithm

    $ composer install

Ejecutar pruebas unitarias con [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Ejecutar pruebas de estándares de código [PSR2](http://www.php-fig.org/psr/psr-2/) con [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Ejecutar pruebas con [PHP Mess Detector](https://phpmd.org/) para detectar inconsistencias en el estilo de codificación:

    $ composer phpmd

Ejecutar todas las pruebas anteriores:

    $ composer tests

## ☑ Tareas pendientes

- [ ] Añadir nueva funcionalidad.
- [ ] Mejorar pruebas.
- [ ] Mejorar documentación.
- [ ] Refactorizar código para las reglas de estilo de código deshabilitadas. Ver [phpmd.xml](phpmd.xml) y [.php_cs.dist](.php_cs.dist).

## Contribuir

Si deseas colaborar, puedes echar un vistazo a la lista de
[issues](https://github.com/Josantonius/PHP-Algorithm/issues) o [tareas pendientes](#-tareas-pendientes).

**Pull requests**

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Ejecuta el comando `composer install` para instalar dependencias.
  Esto también instalará las [dependencias de desarrollo](https://getcomposer.org/doc/03-cli.md#install).
* Ejecuta el comando `composer fix` para estandarizar el código.
* Ejecuta las [pruebas](#tests).
* Crea una nueva rama (**branch**), **commit**, **push** y envíame un
  [pull request](https://help.github.com/articles/using-pull-requests).

## Repositorio

La estructura de archivos de este repositorio se creó con [PHP-Skeleton](https://github.com/Josantonius/PHP-Skeleton).

## Licencia

Este proyecto está licenciado bajo **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.

## Copyright

2016 - 2018 Josantonius, [josantonius.com](https://josantonius.com/)

Si te ha resultado útil, házmelo saber :wink:

Puedes contactarme en [Twitter](https://twitter.com/Josantonius) o a través de mi [correo electrónico](mailto:hello@josantonius.com).
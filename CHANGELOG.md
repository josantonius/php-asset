# CHANGELOG

## 1.1.4 - 2017-09-10

* Unit tests supported by `PHPUnit` were added.

* The repository was synchronized with `Travis CI` to implement continuous integration.

* Type attributes were deleted from HTML tags. Since HTML5 doesn't longer necessary.
 
* Added `Asset/src/bootstrap.php` file

* Added `Asset/tests/bootstrap.php` file.

* Added `Asset/phpunit.xml.dist` file.
* Added `Asset/_config.yml` file.
* Added `Asset/.travis.yml` file.

* Deleted `Josantonius\Asset\Tests\AssetTest` class.
* Deleted `Josantonius\Asset\Tests\AssetTest::testAddOneCssFile()` method.
* Deleted `Josantonius\Asset\Tests\AssetTest::testAddMultipleCssFile()` method.
* Deleted `Josantonius\Asset\Tests\AssetTest::testAddOneJsFile()` method.
* Deleted `Josantonius\Asset\Tests\AssetTest::testAddMultipleJsFile()` method.
* Deleted `Josantonius\Asset\Tests\AssetTest::testAddOneJsFileAttr()` method.
* Deleted `Josantonius\Asset\Tests\AssetTest::testAddMultipleJsFileAttr()` method.
* Deleted `Josantonius\Asset\Tests\AssetTest::testAddMultipleJsFileSameAttr()` method.

* Added `Josantonius\Asset\Test\AssetTest` class.
* Added `Josantonius\Asset\Test\AssetTest::testAddOneCssFile()` method.
* Added `Josantonius\Asset\Test\AssetTest::testAddMultipleCssFile()` method.
* Added `Josantonius\Asset\Test\AssetTest::testAddOneJsFile()` method.
* Added `Josantonius\Asset\Test\AssetTest::testAddMultipleJsFile()` method.
* Added `Josantonius\Asset\Test\AssetTest::testAddOneJsFileAttr()` method.
* Added `Josantonius\Asset\Test\AssetTest::testAddMultipleJsFileAttr()` method.
* Added `Josantonius\Asset\Test\AssetTest::testAddMultipleJsFileSameAttr()` method.

## 1.1.3 - 2017-07-15

* Deleted `Josantonius\Asset\Exception\AssetException` class.
* Deleted `Josantonius\Asset\Exception\Exceptions` abstract class.
* Deleted `Josantonius\Asset\Exception\AssetException->__construct()` method.

## 1.1.2 - 2017-03-18

* Some files were excluded from download and comments and readme files were updated.

## 1.1.1 - 2017-02-17

* Added `Josantonius\Asset\Tests\AssetTest::testAddOneJsFileAttr()` method.
* Added `Josantonius\Asset\Tests\AssetTest::testAddMultipleJsFileAttr()` method.
* Added `Josantonius\Asset\Tests\AssetTest::testAddMultipleJsFileSameAttr()` method.
* Added `$attr` parameter in `Josantonius\Asset\Asset::resource()` method.
* Added `$attr` parameter in `Josantonius\Asset\Asset::js()` method.

## 1.1.0 - 2017-01-30

* Compatible with PHP 5.6 or higher.

## 1.0.0 - 2017-01-30

* Compatible only with PHP 7.0 or higher. In the next versions, the library will be modified to make it compatible with PHP 5.6 or higher.

## 1.0.0 - 2016-12-14

* Added `Josantonius\Asset\Asset` class.
* Added `Josantonius\Asset\Asset::resource()` method.
* Added `Josantonius\Asset\Asset::js()` method.
* Added `Josantonius\Asset\Asset::css()` method.

## 1.0.0 - 2016-12-14

* Added `Josantonius\Asset\Exception\AssetException` class.
* Added `Josantonius\Asset\Exception\Exceptions` abstract class.
* Added `Josantonius\Asset\Exception\AssetException->__construct()` method.

## 1.0.0 - 2016-12-14

* Added `Josantonius\Asset\Tests\AssetTest` class.
* Added `Josantonius\Asset\Tests\AssetTest::testAddOneCssFile()` method.
* Added `Josantonius\Asset\Tests\AssetTest::testAddMultipleCssFile()` method.
* Added `Josantonius\Asset\Tests\AssetTest::testAddOneJsFile()` method.
* Added `Josantonius\Asset\Tests\AssetTest::testAddMultipleJsFile()` method.

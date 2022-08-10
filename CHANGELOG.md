# CHANGELOG

## [v2.0.2](https://github.com/josantonius/php-json/releases/tag/v2.0.2) (2022-08-10)

* improve documentation in `README` files.

## [v2.0.1](https://github.com/josantonius/php-json/releases/tag/v2.0.1) (2022-07-13)

* Remove unused class in `Josantonius\Asset\Facades\Asset`.

* improve documentation in `README` files.

## [v2.0.0](https://github.com/josantonius/php-json/releases/tag/v2.0.0) (2022-06-30)

> Version 1.x is considered as deprecated and unsupported.
> In this version (2.x) the library was completely restructured.
> It is recommended to review the documentation for this version and make the necessary changes
> before starting to use it, as it not be compatible with version 1.x.

* The library was completely refactored.

* Replaced all static methods in `Josantonius\Asset\Asset` class.

  A facade class was added to access the methods statically: `Josantonius\Asset\Facades\Asset`.

* Support for PHP version **8.1**.

* Support for earlier versions of PHP **8.1** is discontinued.

* Improved documentation; `README.md`, `CODE_OF_CONDUCT.md`, `CONTRIBUTING.md` and `CHANGELOG.md`.

* Removed `Codacy`.

* Removed `PHP Coding Standards Fixer`.

* The `master` branch was renamed to `main`.

* The `develop` branch was added to use a workflow based on `Git Flow`.

* `Travis` is discontinued for continuous integration. `GitHub Actions` will be used from now on.

* ADDED:

  `Josantonius\Asset\Elements\BodyScript` class.

  `Josantonius\Asset\Elements\HeadScript` class.

  `Josantonius\Asset\Elements\Link` class.

  `Josantonius\Asset\Elements\Script` class.

  `Josantonius\Asset\Facades\Asset` class.

  `Josantonius\Asset\Tests\Elements\LinkTest` class.

  `Josantonius\Asset\Tests\Elements\ScriptTest` class.

  `Josantonius\Asset\Tests\Facades\AssetTest` class.

  `.github/CODE_OF_CONDUCT.md` file.

  `.github/CONTRIBUTING.md` file.

  `.github/FUNDING.yml` file.

  `.github/workflows/ci.yml` file.

  `.github/lang/es-ES/CODE_OF_CONDUCT.md` file.

  `.github/lang/es-ES/CONTRIBUTING.md` file.

  `.github/lang/es-ES/LICENSE` file.

  `.github/lang/es-ES/README` file.

* DELETED:
  
  `Josantonius\Asset\Tests\ScriptsTest` class.

  `Josantonius\Asset\Tests\StylesTest` class.

  `Josantonius\Asset\Tests\UnifyFilesTest` class.

  `tests/assets` folder.

   `.travis.yml` file.

   `.editorconfig` file.

   `CONDUCT.MD` file.

   `README-ES.MD` file.

   `.php_cs.dist` file.

## [1.1.7](https://github.com/josantonius/php-json/releases/tag/1.1.0) (2018-01-05)

* The tests were fixed.

* Changes in documentation.

## [1.1.6](https://github.com/josantonius/php-json/releases/tag/1.1.6) (2017-11-08)

* Implemented `PHP Mess Detector` to detect inconsistencies in code styles.

* Implemented `PHP Code Beautifier and Fixer` to fixing errors automatically.

* Implemented `PHP Coding Standards Fixer` to organize PHP code automatically according to PSR standards.

## [1.1.5](https://github.com/josantonius/php-json/releases/tag/1.1.5) (2017-10-24)

* Implemented `PSR-4 autoloader standard` from all library files.

* Implemented `PSR-2 coding standard` from all library PHP files.

* Implemented `PHPCS` to ensure that PHP code complies with `PSR2` code standards.

* Implemented `Codacy` to automates code reviews and monitors code quality over time.

* Implemented `Codecov` to coverage reports.

* Added `Asset/phpcs.ruleset.xml` file.

* Deleted `Asset/src/bootstrap.php` file.

* Deleted `Asset/tests/bootstrap.php` file.

* Deleted `Asset/vendor` folder.

* Deleted `Josantonius\Asset\Test\AssetTest` class.

* Added `Asset/tests/css/style.css` file.
* Added `Asset/tests/css/custom.css` file.

* Added `Asset/tests/js/script.js` file.
* Added `Asset/tests/js/custom.js` file.

* Deleted `Josantonius\Asset\Asset::resource()` method.
* Deleted `Josantonius\Asset\Asset::js()` method.
* Deleted `Josantonius\Asset\Asset::css()` method.

* Added `Josantonius\Asset\ScriptsTest` class.
* Added `Josantonius\Asset\ScriptsTest->setUp()` method.
* Added `Josantonius\Asset\ScriptsTest->testAddScript()` method.
* Added `Josantonius\Asset\ScriptsTest->testAddScriptWithDeferAttribute()` method.
* Added `Josantonius\Asset\ScriptsTest->testAddScriptWithAsyncAttribute()` method.
* Added `Josantonius\Asset\ScriptsTest->testAddScriptInFooter()` method.
* Added `Josantonius\Asset\ScriptsTest->testAddScriptInHeader()` method.
* Added `Josantonius\Asset\ScriptsTest->testAddScriptAddingAllParams()` method.
* Added `Josantonius\Asset\ScriptsTest->testAddScriptWithoutName()` method.
* Added `Josantonius\Asset\ScriptsTest->testAddScriptWithoutUrl()` method.
* Added `Josantonius\Asset\ScriptsTest->testIfScriptsAddedCorrectly()` method.
* Added `Josantonius\Asset\ScriptsTest->testRemoveAddedScripts()` method.
* Added `Josantonius\Asset\ScriptsTest->testValidationAfterDeletion()` method.
* Added `Josantonius\Asset\ScriptsTest->testOutputFooterScripts()` method.
* Added `Josantonius\Asset\ScriptsTest->testOutputHeaderScripts()` method.
* Added `Josantonius\Asset\ScriptsTest->testOutputWhenNotFooterScriptsLoaded()` method.
* Added `Josantonius\Asset\ScriptsTest->testOutputWhenNotHeaderScriptsLoaded()` method.

* Added `Josantonius\Asset\StylesTest` class.
* Added `Josantonius\Asset\StylesTest->setUp()` method.
* Added `Josantonius\Asset\StylesTest->testAddStyle()` method.
* Added `Josantonius\Asset\StylesTest->testAddStyleWithVersion()` method.
* Added `Josantonius\Asset\StylesTest->testAddStyleAddingAllParams()` method.
* Added `Josantonius\Asset\StylesTest->testAddStyleWithoutName()` method.
* Added `Josantonius\Asset\StylesTest->testAddStyleWithoutUrl()` method.
* Added `Josantonius\Asset\StylesTest->testIfStylesAddedCorrectly()` method.
* Added `Josantonius\Asset\StylesTest->testRemoveAddedStyles()` method.
* Added `Josantonius\Asset\StylesTest->testValidationAfterDeletion()` method.
* Added `Josantonius\Asset\StylesTest->testOutputStyles()` method.
* Added `Josantonius\Asset\StylesTest->testOutputWhenNotStylesLoaded()` method.

* Added `Josantonius\Asset\UnifyFilesTest` class.
* Added `Josantonius\Asset\UnifyFilesTest->setUp()` method.
* Added `Josantonius\Asset\UnifyFilesTest->testUnify()` method.
* Added `Josantonius\Asset\UnifyFilesTest->testUnifySpecifyingDifferentUrlPaths()` method.
* Added `Josantonius\Asset\UnifyFilesTest->testUnifyAndMinify()` method.
* Added `Josantonius\Asset\UnifyFilesTest->testUnifyAndMinifySpecifyingDifferentUrlPaths()` method.
* Added `Josantonius\Asset\UnifyFilesTest->testAddStylesAndScripts()` method.
* Added `Josantonius\Asset\UnifyFilesTest->testIfStylesAndScriptsAddedCorrectly()` method.
* Added `Josantonius\Asset\UnifyFilesTest->testOutputStylesAndScripts()` method.
* Added `Josantonius\Asset\UnifyFilesTest->testIfUnifiedFilesWasCreated()` method.

## [1.1.4](https://github.com/josantonius/php-json/releases/tag/1.1.4) (2017-09-10)

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

## [1.1.3](https://github.com/josantonius/php-json/releases/tag/1.1.3) (2017-07-15)

* Deleted `Josantonius\Asset\Exception\AssetException` class.
* Deleted `Josantonius\Asset\Exception\Exceptions` abstract class.
* Deleted `Josantonius\Asset\Exception\AssetException->__construct()` method.

## [1.1.2](https://github.com/josantonius/php-json/releases/tag/1.1.2) (2017-03-18)

* Some files were excluded from download and comments and readme files were updated.

## [1.1.1](https://github.com/josantonius/php-json/releases/tag/1.1.1) (2017-02-17)

* Added `Josantonius\Asset\Tests\AssetTest::testAddOneJsFileAttr()` method.
* Added `Josantonius\Asset\Tests\AssetTest::testAddMultipleJsFileAttr()` method.
* Added `Josantonius\Asset\Tests\AssetTest::testAddMultipleJsFileSameAttr()` method.
* Added `$attr` parameter in `Josantonius\Asset\Asset::resource()` method.
* Added `$attr` parameter in `Josantonius\Asset\Asset::js()` method.

## [1.1.0](https://github.com/josantonius/php-json/releases/tag/1.1.0) (2017-01-30)

* Compatible with PHP 5.6 or higher.

## [1.0.0](https://github.com/josantonius/php-json/releases/tag/1.0.0) (2016-12-14)

* Compatible only with PHP 7.0 or higher. In the next versions, the library will be modified to make it compatible with PHP 5.6 or higher.

* Added `Josantonius\Asset\Asset` class.
* Added `Josantonius\Asset\Asset::resource()` method.
* Added `Josantonius\Asset\Asset::js()` method.
* Added `Josantonius\Asset\Asset::css()` method.

* Added `Josantonius\Asset\Exception\AssetException` class.
* Added `Josantonius\Asset\Exception\Exceptions` abstract class.
* Added `Josantonius\Asset\Exception\AssetException->__construct()` method.

* Added `Josantonius\Asset\Tests\AssetTest` class.
* Added `Josantonius\Asset\Tests\AssetTest::testAddOneCssFile()` method.
* Added `Josantonius\Asset\Tests\AssetTest::testAddMultipleCssFile()` method.
* Added `Josantonius\Asset\Tests\AssetTest::testAddOneJsFile()` method.
* Added `Josantonius\Asset\Tests\AssetTest::testAddMultipleJsFile()` method.

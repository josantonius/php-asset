<?php
/**
 * PHP library for handling styles and scripts: Add, minify, unify and print.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2016 - 2017 (c) Josantonius - PHP-Assets
 * @license   http://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      http://github.com/Josantonius/PHP-Asset
 * @since     1.1.5
 */
namespace Josantonius\Asset;

use PHPUnit\Framework\TestCase;

/**
 * Tests class for Asset library.
 *
 * @since 1.1.5
 */
final class UnifyFilesTest extends TestCase
{
    /**
     * Asset instance.
     *
     * @since 1.1.6
     *
     * @var object
     */
    protected $Asset;

    /**
     * Assets url.
     *
     * @since 1.1.5
     *
     * @var string
     */
    protected $assetsUrl;

    /**
     * Assets path.
     *
     * @since 1.1.5
     *
     * @var string
     */
    protected $assetsPath;

    /**
     * Set up.
     *
     * @since 1.1.5
     */
    public function setUp()
    {
        parent::setUp();

        $this->Asset = new Asset;

        $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        $this->assetsUrl = 'http://' . $url;

        $this->assetsPath = $_SERVER['DOCUMENT_ROOT'];
    }

    /**
     * Check if it is an instance of Asset.
     *
     * @since 1.1.6
     */
    public function testIsInstanceOfAsset()
    {
        $actual = $this->Asset;

        $this->assertInstanceOf('\Josantonius\Asset\Asset', $actual);
    }

    /**
     * Unify files specifying the same url path for styles and scripts.
     *
     * @since 1.1.5
     */
    public function testUnify()
    {
        $this->assertTrue(
            $this->Asset->unify('UniqueID', $this->assetsUrl . 'min/')
        );
    }

    /**
     * Unify files specifying different url paths for styles and scripts.
     *
     * @since 1.1.5
     */
    public function testUnifySpecifyingDifferentUrlPaths()
    {
        $this->assertTrue(
            $this->Asset->unify('UniqueID', [
                'styles' => $this->assetsUrl . 'min/',
                'scripts' => $this->assetsUrl . 'min/',
            ])
        );
    }

    /**
     * Unify files specifying the same url path for styles and scripts.
     *
     * @since 1.1.5
     */
    public function testUnifyAndMinify()
    {
        $this->assertTrue(
            $this->Asset->unify('UniqueID', $this->assetsUrl . 'min/', true)
        );
    }

    /**
     * Unify files specifying different url paths for styles and scripts.
     *
     * @since 1.1.5
     */
    public function testUnifyAndMinifySpecifyingDifferentUrlPaths()
    {
        $this->assertTrue(
            $this->Asset->unify('UniqueID', [
                'styles' => $this->assetsUrl . 'min/',
                'scripts' => $this->assetsUrl . 'min/',
            ], true)
        );
    }

    /**
     * Add styles and scripts.
     *
     * @since 1.1.5
     */
    public function testAddStylesAndScripts()
    {
        $this->assertTrue(
            $this->Asset->add('style', [
                'name' => 'CustomStyle',
                'url' => $this->assetsUrl . 'css/custom.css',
                'version' => '1.1.3',
            ])
        );

        $this->assertTrue(
            $this->Asset->add('style', [
                'name' => 'DefaultStyle',
                'url' => $this->assetsUrl . 'css/style.css',
            ])
        );

        $this->assertTrue(
            $this->Asset->add('script', [
                'name' => 'DefaultScript',
                'url' => $this->assetsUrl . 'js/script.js',
                'version' => '1.1.3',
                'footer' => false,
            ])
        );

        $this->assertTrue(
            $this->Asset->add('script', [
                'name' => 'CustomScript',
                'url' => $this->assetsUrl . 'js/custom.js',
                'version' => '1.1.3',
                'footer' => false,
            ])
        );

        $this->assertTrue(
            $this->Asset->add('script', [
                'name' => 'Default',
                'url' => $this->assetsUrl . 'js/script.js',
                'version' => '1.1.3',
                'footer' => true,
            ])
        );

        $this->assertTrue(
            $this->Asset->add('script', [
                'name' => 'Custom',
                'url' => $this->assetsUrl . 'js/custom.js',
                'version' => '1.1.3',
                'footer' => true,
            ])
        );
    }

    /**
     * Check if styles and scripts have been added correctly.
     *
     * @since 1.1.5
     */
    public function testIfStylesAndScriptsAddedCorrectly()
    {
        $this->assertTrue(
            $this->Asset->isAdded('style', 'CustomStyle')
        );

        $this->assertTrue(
            $this->Asset->isAdded('style', 'DefaultStyle')
        );

        $this->assertTrue(
            $this->Asset->isAdded('script', 'DefaultScript')
        );

        $this->assertTrue(
            $this->Asset->isAdded('script', 'CustomScript')
        );

        $this->assertTrue(
            $this->Asset->isAdded('script', 'Default')
        );

        $this->assertTrue(
            $this->Asset->isAdded('script', 'Custom')
        );
    }

    /**
     * If styles and scripts are registered.
     *
     * @since 1.1.5
     */
    public function testOutputStylesAndScripts()
    {
        $style = sha1('custom.cssstyle.css') . '.css';
        $script = sha1('script.jscustom.js') . '.js';

        $this->assertContains(
            "<link rel='stylesheet' href='http://jst.com/min/$style'>",
            $this->Asset->outputStyles()
        );

        $this->assertContains(
            "<script src='http://jst.com/min/$script'></script>",
            $this->Asset->outputScripts('header')
        );

        $this->assertContains(
            "<script src='http://jst.com/min/$script'></script>",
            $this->Asset->outputScripts('footer')
        );
    }

    /**
     * Validate whether unified files have been created.
     *
     * @since 1.1.5
     */
    public function testIfUnifiedFilesWasCreated()
    {
        $style = sha1('custom.cssstyle.css') . '.css';
        $script = sha1('script.jscustom.js') . '.js';

        $this->assertFileExists(
            $this->assetsPath . 'min/' . $style
        );

        $this->assertContains(
            "body, h1, h2, h3, h4, h5, h6 {font-family: 'Open Sans'",
            file_get_contents($this->assetsPath . 'min/' . $style)
        );

        $this->assertFileExists(
            $this->assetsPath . 'min/' . $script
        );

        $this->assertContains(
            "$('p').click(function() {alert('The paragraph was clicked.');});",
            file_get_contents($this->assetsPath . 'min/' . $script)
        );

        unlink($this->assetsPath . 'min/' . $style);
        unlink($this->assetsPath . 'min/' . $script);

        rmdir($this->assetsPath . 'min/');
    }
}

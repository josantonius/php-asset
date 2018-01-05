<?php
/**
 * PHP library for handling styles and scripts: Add, minify, unify and print.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2016 - 2018 (c) Josantonius - PHP-Assets
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
     * @var string
     */
    protected $assetsUrl;

    /**
     * Assets path.
     *
     * @var string
     */
    protected $assetsPath;

    /**
     * Set up.
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
    public function testIsInstanceOf()
    {
        $this->assertInstanceOf('\Josantonius\Asset\Asset', $this->Asset);
    }

    /**
     * Unify files specifying the same url path for styles and scripts.
     */
    public function testUnify()
    {
        $asset = $this->Asset;

        $this->assertTrue(
            $asset::unify('UniqueID', $this->assetsUrl . 'min/')
        );
    }

    /**
     * Unify files specifying different url paths for styles and scripts.
     */
    public function testUnifySpecifyingDifferentUrlPaths()
    {
        $asset = $this->Asset;

        $this->assertTrue(
            $asset::unify('UniqueID', [
                'styles' => $this->assetsUrl . 'min/',
                'scripts' => $this->assetsUrl . 'min/',
            ])
        );
    }

    /**
     * Unify files specifying the same url path for styles and scripts.
     */
    public function testUnifyAndMinify()
    {
        $asset = $this->Asset;

        $this->assertTrue(
            $asset::unify('UniqueID', $this->assetsUrl . 'min/', true)
        );
    }

    /**
     * Unify files specifying different url paths for styles and scripts.
     */
    public function testUnifyAndMinifySpecifyingDifferentUrlPaths()
    {
        $asset = $this->Asset;

        $this->assertTrue(
            $asset::unify('UniqueID', [
                'styles' => $this->assetsUrl . 'min/',
                'scripts' => $this->assetsUrl . 'min/',
            ], true)
        );
    }

    /**
     * Add styles and scripts.
     */
    public function testAddStylesAndScripts()
    {
        $asset = $this->Asset;

        $this->assertTrue(
            $asset::add('style', [
                'name' => 'CustomStyle',
                'url' => $this->assetsUrl . 'css/custom.css',
                'version' => '1.1.3',
            ])
        );

        $this->assertTrue(
            $asset::add('style', [
                'name' => 'DefaultStyle',
                'url' => $this->assetsUrl . 'css/style.css',
            ])
        );

        $this->assertTrue(
            $asset::add('script', [
                'name' => 'DefaultScript',
                'url' => $this->assetsUrl . 'js/script.js',
                'version' => '1.1.3',
                'footer' => false,
            ])
        );

        $this->assertTrue(
            $asset::add('script', [
                'name' => 'CustomScript',
                'url' => $this->assetsUrl . 'js/custom.js',
                'version' => '1.1.3',
                'footer' => false,
            ])
        );

        $this->assertTrue(
            $asset::add('script', [
                'name' => 'Default',
                'url' => $this->assetsUrl . 'js/script.js',
                'version' => '1.1.3',
                'footer' => true,
            ])
        );

        $this->assertTrue(
            $asset::add('script', [
                'name' => 'Custom',
                'url' => $this->assetsUrl . 'js/custom.js',
                'version' => '1.1.3',
                'footer' => true,
            ])
        );
    }

    /**
     * Check if styles and scripts have been added correctly.
     */
    public function testIfStylesAndScriptsAddedCorrectly()
    {
        $asset = $this->Asset;

        $this->assertTrue(
            $asset::isAdded('style', 'CustomStyle')
        );

        $this->assertTrue(
            $asset::isAdded('style', 'DefaultStyle')
        );

        $this->assertTrue(
            $asset::isAdded('script', 'DefaultScript')
        );

        $this->assertTrue(
            $asset::isAdded('script', 'CustomScript')
        );

        $this->assertTrue(
            $asset::isAdded('script', 'Default')
        );

        $this->assertTrue(
            $asset::isAdded('script', 'Custom')
        );
    }

    /**
     * If styles and scripts are registered.
     */
    public function testOutputStylesAndScripts()
    {
        $asset = $this->Asset;

        $styleOne = 'custom.css';
        $styleTwo = 'style.css';

        $style = sha1($styleOne . $styleTwo) . '.css';

        $scriptOne = 'script.js';
        $scriptTwo = 'custom.js';

        $script = sha1($scriptOne . $scriptTwo) . '.js';

        $this->assertContains(
            "<link rel='stylesheet' href='http://jst.com/min/$style'>",
            $asset::outputStyles()
        );

        $this->assertContains(
            "<script src='http://jst.com/min/$script'></script>",
            $asset::outputScripts('header')
        );

        $this->assertContains(
            "<script src='http://jst.com/min/$script'></script>",
            $asset::outputScripts('footer')
        );
    }

    /**
     * Validate whether unified files have been created.
     */
    public function testIfUnifiedFilesWasCreated()
    {
        $styleOne = 'custom.css';
        $styleTwo = 'style.css';

        $style = sha1($styleOne . $styleTwo) . '.css';

        $scriptOne = 'script.js';
        $scriptTwo = 'custom.js';

        $script = sha1($scriptOne . $scriptTwo) . '.js';

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

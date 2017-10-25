<?php
/**
 * PHP library for handling styles and scripts: Add, minify, unify and print.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2016 - 2017 (c) Josantonius - PHP-Assets
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Josantonius/PHP-Asset
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
     *
     * @return void
     */
    public function setUp()
    {
        $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        $this->assetsUrl = 'https://' . $url;

        $this->assetsPath = $_SERVER['DOCUMENT_ROOT'];
    }

    /**
     * Unify files specifying the same url path for styles and scripts.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testUnify()
    {
        $this->assertTrue(
            Asset::unify('UniqueID', $this->assetsUrl . 'min/')
        );
    }

    /**
     * Unify files specifying different url paths for styles and scripts.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testUnifySpecifyingDifferentUrlPaths()
    {
        $this->assertTrue(
            Asset::unify('UniqueID', [
                'styles'  => $this->assetsUrl . 'min/',
                'scripts' => $this->assetsUrl . 'min/',
            ])
        );
    }

    /**
     * Unify files specifying the same url path for styles and scripts.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testUnifyAndMinify()
    {
        $this->assertTrue(
            Asset::unify('UniqueID', $this->assetsUrl . 'min/', true)
        );
    }

    /**
     * Unify files specifying different url paths for styles and scripts.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testUnifyAndMinifySpecifyingDifferentUrlPaths()
    {
        $this->assertTrue(
            Asset::unify('UniqueID', [
                'styles'  => $this->assetsUrl . 'min/',
                'scripts' => $this->assetsUrl . 'min/',

            ], true)
        );
    }

    /**
     * Add styles and scripts.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testAddStylesAndScripts()
    {
        $this->assertTrue(
            Asset::add('style', [
                'name'    => 'CustomStyle',
                'url'     => $this->assetsUrl . 'css/custom.css',
                'version' => '1.1.3',
            ])
        );

        $this->assertTrue(
            Asset::add('style', [
                'name'    => 'DefaultStyle',
                'url'     => $this->assetsUrl . 'css/style.css',
            ])
        );

        $this->assertTrue(
            Asset::add('script', [
                'name'    => 'DefaultScript',
                'url'     => $this->assetsUrl . 'js/script.js',
                'version' => '1.1.3',
                'footer'  => false,
            ])
        );

        $this->assertTrue(
            Asset::add('script', [
                'name'    => 'CustomScript',
                'url'     => $this->assetsUrl . 'js/custom.js',
                'version' => '1.1.3',
                'footer'  => false,
            ])
        );

        $this->assertTrue(
            Asset::add('script', [
                'name'    => 'Default',
                'url'     => $this->assetsUrl . 'js/script.js',
                'version' => '1.1.3',
                'footer'  => true,
            ])
        );

        $this->assertTrue(
            Asset::add('script', [
                'name'    => 'Custom',
                'url'     => $this->assetsUrl . 'js/custom.js',
                'version' => '1.1.3',
                'footer'  => true,
            ])
        );
    }

    /**
     * Check if styles and scripts have been added correctly.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testIfStylesAndScriptsAddedCorrectly()
    {
        $this->assertTrue(
            Asset::isAdded('style', 'CustomStyle')
        );

        $this->assertTrue(
            Asset::isAdded('style', 'DefaultStyle')
        );

        $this->assertTrue(
            Asset::isAdded('script', 'DefaultScript')
        );

        $this->assertTrue(
            Asset::isAdded('script', 'CustomScript')
        );

        $this->assertTrue(
            Asset::isAdded('script', 'Default')
        );

        $this->assertTrue(
            Asset::isAdded('script', 'Custom')
        );
    }

    /**
     * If styles and scripts are registered.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testOutputStylesAndScripts()
    {
        $css = sha1('custom.css' . 'style.css') . '.css';
        $js  = sha1('script.js' . 'custom.js') . '.js';

        $this->assertContains(
            "<link rel='stylesheet' href='https://jst.com/min/$css'>",
            Asset::outputStyles()
        );

        $this->assertContains(
            "<script src='https://jst.com/min/$js'></script>",
            Asset::outputScripts('header')
        );

        $this->assertContains(
            "<script src='https://jst.com/min/$js'></script>",
            Asset::outputScripts('footer')
        );
    }

    /**
     * Validate whether unified files have been created.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testIfUnifiedFilesWasCreated()
    {
        $css = sha1('custom.css' . 'style.css') . '.css';
        $js  = sha1('script.js' . 'custom.js') . '.js';

        $this->assertTrue(
            file_exists($this->assetsPath . 'min/' . $css)
        );

        $this->assertContains(
            "body, h1, h2, h3, h4, h5, h6 {font-family: 'Open Sans'",
            file_get_contents($this->assetsPath . 'min/' . $css)
        );

        $this->assertTrue(
            file_exists($this->assetsPath . 'min/' . $js)
        );

        $this->assertContains(
            "$('p').click(function() {alert('The paragraph was clicked.');});",
            file_get_contents($this->assetsPath . 'min/' . $js)
        );

        unlink($this->assetsPath . 'min/' . $css);
        unlink($this->assetsPath . 'min/' . $js);

        rmdir($this->assetsPath . 'min/');
    }
}

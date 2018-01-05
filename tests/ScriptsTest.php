<?php
/**
 * PHP library for handling styles and scripts: Add, minify, unify and print.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2016 - 2018 (c) Josantonius - PHP-Assets
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
final class ScriptsTest extends TestCase
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
     * Set up.
     */
    public function setUp()
    {
        parent::setUp();

        $this->Asset = new Asset;

        $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        $this->assetsUrl = 'https://' . $url;
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
     * Add script.
     */
    public function testAddScript()
    {
        $Asset = $this->Asset;

        $this->assertTrue(
            $Asset::add('script', [
                'name' => 'script-first',
                'url' => $this->assetsUrl . 'js/script.js',
            ])
        );
    }

    /**
     * Add script with 'defer' attribute.
     */
    public function testAddScriptWithDeferAttribute()
    {
        $Asset = $this->Asset;

        $this->assertTrue(
            $Asset::add('script', [
                'name' => 'script-second',
                'url' => $this->assetsUrl . 'js/script.js',
                'attr' => 'defer',
            ])
        );
    }

    /**
     * Add script with 'async' attribute.
     */
    public function testAddScriptWithAsyncAttribute()
    {
        $Asset = $this->Asset;

        $this->assertTrue(
            $Asset::add('script', [
                'name' => 'script-third',
                'url' => $this->assetsUrl . 'js/custom.js',
                'attr' => 'async',
            ])
        );
    }

    /**
     * Add script in footer.
     */
    public function testAddScriptInFooter()
    {
        $Asset = $this->Asset;

        $this->assertTrue(
            $Asset::add('script', [
                'name' => 'script-fourth',
                'url' => $this->assetsUrl . 'js/script.js',
                'footer' => true,
            ])
        );
    }

    /**
     * Add script in header.
     */
    public function testAddScriptInHeader()
    {
        $Asset = $this->Asset;

        $this->assertTrue(
            $Asset::add('script', [
                'name' => 'script-fifth',
                'url' => $this->assetsUrl . 'js/custom.js',
                'footer' => false,
            ])
        );
    }

    /**
     * Add script by adding all options.
     */
    public function testAddScriptAddingAllParams()
    {
        $Asset = $this->Asset;

        $this->assertTrue(
            $Asset::add('script', [
                'name' => 'script-sixth',
                'url' => $this->assetsUrl . 'js/script.js',
                'attr' => 'defer',
                'version' => '1.1.3',
                'footer' => true
            ])
        );
    }

    /**
     * Add script without specifying a name. [FALSE|ERROR]
     */
    public function testAddScriptWithoutName()
    {
        $Asset = $this->Asset;

        $this->assertFalse(
            $Asset::add('script', [
                'url' => $this->assetsUrl . 'js/unknown.js',
                'attr' => 'defer',
            ])
        );
    }

    /**
     * Add script without specifying a url. [FALSE|ERROR]
     */
    public function testAddScriptWithoutUrl()
    {
        $Asset = $this->Asset;

        $this->assertFalse(
            $Asset::add('script', [
                'name' => 'unknown',
                'attr' => 'defer',
            ])
        );
    }

    /**
     * Check if the scripts have been added correctly.
     */
    public function testIfScriptsAddedCorrectly()
    {
        $Asset = $this->Asset;

        $this->assertTrue(
            $Asset::isAdded('script', 'script-first')
        );

        $this->assertTrue(
            $Asset::isAdded('script', 'script-second')
        );

        $this->assertTrue(
            $Asset::isAdded('script', 'script-third')
        );

        $this->assertTrue(
            $Asset::isAdded('script', 'script-fourth')
        );

        $this->assertTrue(
            $Asset::isAdded('script', 'script-fifth')
        );

        $this->assertTrue(
            $Asset::isAdded('script', 'script-sixth')
        );
    }

    /**
     * Delete added styles.
     */
    public function testRemoveAddedScripts()
    {
        $Asset = $this->Asset;

        $this->assertTrue(
            $Asset::remove('script', 'script-first')
        );

        $this->assertTrue(
            $Asset::remove('script', 'script-second')
        );
    }

    /**
     * Validation after deletion.
     */
    public function testValidationAfterDeletion()
    {
        $Asset = $this->Asset;

        $this->assertFalse(
            $Asset::isAdded('script', 'script-first')
        );

        $this->assertFalse(
            $Asset::isAdded('script', 'script-second')
        );
    }

    /**
     * Output footer scripts.
     */
    public function testOutputFooterScripts()
    {
        $Asset = $this->Asset;

        $scripts = $Asset::outputScripts('footer');

        $this->assertContains(
            "<script src='https://jst.com/js/script.js'></script>",
            $scripts
        );

        $this->assertContains(
            "<script defer src='https://jst.com/js/script.js'></script>",
            $scripts
        );
    }

    /**
     * Output header scripts.
     */
    public function testOutputHeaderScripts()
    {
        $Asset = $this->Asset;

        $scripts = $Asset::outputScripts('header');

        $this->assertContains(
            "<script src='https://jst.com/js/custom.js'></script>",
            $scripts
        );

        $this->assertContains(
            "<script async src='https://jst.com/js/custom.js'></script>",
            $scripts
        );
    }

    /**
     * Output when there are not header scripts loaded.
     */
    public function testOutputWhenNotFooterScriptsLoaded()
    {
        $Asset = $this->Asset;

        $this->assertFalse(
            $Asset::outputScripts('footer')
        );
    }

    /**
     * Output when there are not header scripts loaded.
     */
    public function testOutputWhenNotHeaderScriptsLoaded()
    {
        $Asset = $this->Asset;

        $this->assertFalse(
            $Asset::outputScripts('header')
        );
    }
}

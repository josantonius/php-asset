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
     * @since 1.1.5
     *
     * @var string
     */
    protected $assetsUrl;

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

        $this->assetsUrl = 'https://' . $url;
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
     * Add script.
     *
     * @since 1.1.5
     */
    public function testAddScript()
    {
        $this->assertTrue(
            Asset::add('script', [
                'name' => 'script-first',
                'url' => $this->assetsUrl . 'js/script.js',
            ])
        );
    }

    /**
     * Add script with 'defer' attribute.
     *
     * @since 1.1.5
     */
    public function testAddScriptWithDeferAttribute()
    {
        $this->assertTrue(
            Asset::add('script', [
                'name' => 'script-second',
                'url' => $this->assetsUrl . 'js/script.js',
                'attr' => 'defer',
            ])
        );
    }

    /**
     * Add script with 'async' attribute.
     *
     * @since 1.1.5
     */
    public function testAddScriptWithAsyncAttribute()
    {
        $this->assertTrue(
            Asset::add('script', [
                'name' => 'script-third',
                'url' => $this->assetsUrl . 'js/custom.js',
                'attr' => 'async',
            ])
        );
    }

    /**
     * Add script in footer.
     *
     * @since 1.1.5
     */
    public function testAddScriptInFooter()
    {
        $this->assertTrue(
            Asset::add('script', [
                'name' => 'script-fourth',
                'url' => $this->assetsUrl . 'js/script.js',
                'footer' => true,
            ])
        );
    }

    /**
     * Add script in header.
     *
     * @since 1.1.5
     */
    public function testAddScriptInHeader()
    {
        $this->assertTrue(
            Asset::add('script', [
                'name' => 'script-fifth',
                'url' => $this->assetsUrl . 'js/custom.js',
                'footer' => false,
            ])
        );
    }

    /**
     * Add script by adding all options.
     *
     * @since 1.1.5
     */
    public function testAddScriptAddingAllParams()
    {
        $this->assertTrue(
            Asset::add('script', [
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
     *
     * @since 1.1.5
     */
    public function testAddScriptWithoutName()
    {
        $this->assertFalse(
            Asset::add('script', [
                'url' => $this->assetsUrl . 'js/unknown.js',
                'attr' => 'defer',
            ])
        );
    }

    /**
     * Add script without specifying a url. [FALSE|ERROR]
     *
     * @since 1.1.5
     */
    public function testAddScriptWithoutUrl()
    {
        $this->assertFalse(
            Asset::add('script', [
                'name' => 'unknown',
                'attr' => 'defer',
            ])
        );
    }

    /**
     * Check if the scripts have been added correctly.
     *
     * @since 1.1.5
     */
    public function testIfScriptsAddedCorrectly()
    {
        $this->assertTrue(
            Asset::isAdded('script', 'script-first')
        );

        $this->assertTrue(
            Asset::isAdded('script', 'script-second')
        );

        $this->assertTrue(
            Asset::isAdded('script', 'script-third')
        );

        $this->assertTrue(
            Asset::isAdded('script', 'script-fourth')
        );

        $this->assertTrue(
            Asset::isAdded('script', 'script-fifth')
        );

        $this->assertTrue(
            Asset::isAdded('script', 'script-sixth')
        );
    }

    /**
     * Delete added styles.
     *
     * @since 1.1.5
     */
    public function testRemoveAddedScripts()
    {
        $this->assertTrue(
            Asset::remove('script', 'script-first')
        );

        $this->assertTrue(
            Asset::remove('script', 'script-second')
        );
    }

    /**
     * Validation after deletion.
     *
     * @since 1.1.5
     */
    public function testValidationAfterDeletion()
    {
        $this->assertFalse(
            Asset::isAdded('script', 'script-first')
        );

        $this->assertFalse(
            Asset::isAdded('script', 'script-second')
        );
    }

    /**
     * Output footer scripts.
     *
     * @since 1.1.5
     */
    public function testOutputFooterScripts()
    {
        $scripts = Asset::outputScripts('footer');

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
     *
     * @since 1.1.5
     */
    public function testOutputHeaderScripts()
    {
        $scripts = Asset::outputScripts('header');

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
     *
     * @since 1.1.5
     */
    public function testOutputWhenNotFooterScriptsLoaded()
    {
        $this->assertFalse(
            Asset::outputScripts('footer')
        );
    }

    /**
     * Output when there are not header scripts loaded.
     *
     * @since 1.1.5
     */
    public function testOutputWhenNotHeaderScriptsLoaded()
    {
        $this->assertFalse(
            Asset::outputScripts('header')
        );
    }
}

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
final class StylesTest extends TestCase
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
     * Add style.
     */
    public function testAddStyle()
    {
        $Asset = $this->Asset;

        $this->assertTrue(
            $Asset::add('style', [
                'name' => 'style-first',
                'url' => $this->assetsUrl . 'css/style.css',
            ])
        );
    }

    /**
     * Add style with version.
     */
    public function testAddStyleWithVersion()
    {
        $Asset = $this->Asset;

        $this->assertTrue(
            $Asset::add('style', [
                'name' => 'style-second',
                'url' => $this->assetsUrl . 'css/style.css',
                'version' => '1.0.0'
            ])
        );
    }

    /**
     * Add style by adding all options.
     */
    public function testAddStyleAddingAllParams()
    {
        $Asset = $this->Asset;

        $this->assertTrue(
            $Asset::add('style', [
                'name' => 'style-third',
                'url' => $this->assetsUrl . 'css/custom.css',
                'version' => '1.1.3'
            ])
        );
    }

    /**
     * Add style without specifying a name. [FALSE|ERROR]
     */
    public function testAddStyleWithoutName()
    {
        $Asset = $this->Asset;

        $this->assertFalse(
            $Asset::add('style', [
                'url' => $this->assetsUrl . 'css/unknown.css',
                'attr' => 'defer',
            ])
        );
    }

    /**
     * Add style without specifying a url. [FALSE|ERROR]
     */
    public function testAddStyleWithoutUrl()
    {
        $Asset = $this->Asset;

        $this->assertFalse(
            $Asset::add('style', [
                'name' => 'unknown',
                'attr' => 'defer',
            ])
        );
    }

    /**
     * Check if the styles have been added correctly.
     */
    public function testIfStylesAddedCorrectly()
    {
        $Asset = $this->Asset;

        $this->assertTrue(
            $Asset::isAdded('style', 'style-first')
        );

        $this->assertTrue(
            $Asset::isAdded('style', 'style-second')
        );

        $this->assertTrue(
            $Asset::isAdded('style', 'style-third')
        );
    }

    /**
     * Delete added styles.
     */
    public function testRemoveAddedStyles()
    {
        $Asset = $this->Asset;

        $this->assertTrue(
            $Asset::remove('style', 'style-first')
        );
    }

    /**
     * Validation after deletion.
     */
    public function testValidationAfterDeletion()
    {
        $Asset = $this->Asset;

        $this->assertFalse(
            $Asset::isAdded('style', 'style-first')
        );
    }

    /**
     * Output styles.
     */
    public function testOutputStyles()
    {
        $Asset = $this->Asset;

        $styles = $Asset::outputStyles();

        $this->assertContains(
            "<link rel='stylesheet' href='https://jst.com/css/custom.css'>",
            $styles
        );

        $this->assertContains(
            "<link rel='stylesheet' href='https://jst.com/css/style.css'>",
            $styles
        );
    }

    /**
     * Output when there are not header styles loaded.
     */
    public function testOutputWhenNotStylesLoaded()
    {
        $Asset = $this->Asset;

        $this->assertFalse(
            $Asset::outputStyles()
        );
    }
}

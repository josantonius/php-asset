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
final class StylesTest extends TestCase
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
    }

    /**
     * Add style.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testAddStyle()
    {
        $this->assertTrue(
            Asset::add('style', [
                'name' => 'style-first',
                'url'  => $this->assetsUrl . 'css/style.css',
            ])
        );
    }

    /**
     * Add style with version.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testAddStyleWithVersion()
    {
        $this->assertTrue(
            Asset::add('style', [
                'name'    => 'style-second',
                'url'     => $this->assetsUrl . 'css/style.css',
                'version' => '1.0.0'
            ])
        );
    }

    /**
     * Add style by adding all options.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testAddStyleAddingAllParams()
    {
        $this->assertTrue(
            Asset::add('style', [
                'name'    => 'style-third',
                'url'     => $this->assetsUrl . 'css/custom.css',
                'version' => '1.1.3'
            ])
        );
    }

    /**
     * Add style without specifying a name. [FALSE|ERROR]
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testAddStyleWithoutName()
    {
        $this->assertFalse(
            Asset::add('style', [
                'url'  => $this->assetsUrl . 'css/unknown.css',
                'attr' => 'defer',
            ])
        );
    }

    /**
     * Add style without specifying a url. [FALSE|ERROR]
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testAddStyleWithoutUrl()
    {
        $this->assertFalse(
            Asset::add('style', [
                'name' => 'unknown',
                'attr' => 'defer',
            ])
        );
    }

    /**
     * Check if the styles have been added correctly.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testIfStylesAddedCorrectly()
    {
        $this->assertTrue(
            Asset::isAdded('style', 'style-first')
        );

        $this->assertTrue(
            Asset::isAdded('style', 'style-second')
        );

        $this->assertTrue(
            Asset::isAdded('style', 'style-third')
        );
    }

    /**
     * Delete added styles.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testRemoveAddedStyles()
    {

        $this->assertTrue(
            Asset::remove('style', 'style-first')
        );
    }

    /**
     * Validation after deletion.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testValidationAfterDeletion()
    {
        $this->assertFalse(
            Asset::isAdded('style', 'style-first')
        );
    }

    /**
     * Output styles.
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testOutputStyles()
    {
        $styles = Asset::outputStyles();

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
     *
     * @since 1.1.5
     *
     * @return void
     */
    public function testOutputWhenNotStylesLoaded()
    {
        $this->assertFalse(
            Asset::outputStyles()
        );
    }
}

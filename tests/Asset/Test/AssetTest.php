<?php
/**
 * PHP library for save CSS and JS files to be displayed in same place.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2016 - 2017
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/PHP-Asset
 * @since      1.1.4
 */

namespace Josantonius\Asset\Test;

use Josantonius\Asset\Asset,
    PHPUnit\Framework\TestCase;

/**
 * Tests class for Asset library.
 *
 * @since 1.1.4
 */
final class AssetTest extends TestCase { 

    /**
     * Add one css file.
     *
     * @since 1.1.4
     */
    public function testAddOneCssFile() {
        
        $this->assertContains(

            '<link rel="stylesheet" href="https://site.com/style.css">',
            Asset::css('https://site.com/style.css')
        );
    }

    /**
     * Add multiple css files.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testAddMultipleCssFile() {

        $assets = Asset::css([

            'https://site.com/style-one.css',
            'https://site.com/style-two.css'
        ]);

        $this->assertContains(

            '<link rel="stylesheet" href="https://site.com/style-one.css">',
            $assets
        );

        $this->assertContains(

            '<link rel="stylesheet" href="https://site.com/style-two.css">',
            $assets
        );
    }

    /**
     * Add one js file.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testAddOneJsFile() {
        
        $this->assertContains(

            '<script src="https://site.com/script.js"></script>',
            Asset::js('https://site.com/script.js')
        );
    }

    /**
     * Add js file specifying attribute.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testAddOneJsFileAttr() {

        $this->assertContains(

            '<script async src="https://site.com/script.js"></script>',
            Asset::js('https://site.com/script.js', 'async')
        );
    }

    /**
     * Add multiple js files.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testAddMultipleJsFile() {

        $assets = Asset::js([

            'https://site.com/script-one.js',
            'https://site.com/script-two.js'
        ]);

        $this->assertContains(

            '<script src="https://site.com/script-one.js"></script>',
            $assets
        );

        $this->assertContains(

            '<script src="https://site.com/script-two.js"></script>',
            $assets
        );
    }

    /**
     * Add multiple js files specifying different attributes.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testAddMultipleJsFileAttr() {

        $assets = Asset::js([

            'async' => 'https://site.com/script-one.js',
            'defer' => 'https://site.com/script-two.js'
        ]);

        $this->assertContains(

            '<script async src="https://site.com/script-one.js"></script>',
            $assets
        );

        $this->assertContains(

            '<script defer src="https://site.com/script-two.js"></script>',
            $assets
        );
    }

    /**
     * Add multiple js files specifying a same attribute.
     *
     * @since 1.1.4
     *
     * @return void
     */
    public function testAddMultipleJsFileSameAttr() {

        $assets = Asset::js([

            'https://site.com/script-one.js',
            'https://site.com/script-two.js'

        ], 'async');

        $this->assertContains(

            '<script async src="https://site.com/script-one.js"></script>',
            $assets
        );

        $this->assertContains(

            '<script async src="https://site.com/script-two.js"></script>',
            $assets
        );
    }
}

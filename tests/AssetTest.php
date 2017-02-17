<?php 
/**
 * PHP library for save CSS and JS files to be displayed in same place.
 * 
 * @author     Josantonius - info@josantonius.com
 * @copyright  Copyright (c) 2016 JST PHP Framework
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/PHP-Asset
 * @since      File available since 1.0.0 - Update: 2017-02-17
 */

namespace Josantonius\Asset\Tests;

use Josantonius\Asset\Asset;

/**
 * Tests class for Asset library.
 *
 * @since 1.0.0
 */
class AssetTest { 

    /**
     * Add one css file.
     *
     * @since 1.0.0
     */
    public static function testAddOneCssFile() {

        Asset::css(
            'https://maxcdn.bootstrapcdn.com/font-awesome.min.css'
        );
    }

    /**
     * Add multiple css files.
     *
     * @since 1.0.0
     */
    public static function testAddMultipleCssFile() {

        Asset::css(array(
            'https://maxcdn.bootstrapcdn.com/font-awesome.min.css',
            'https://fonts.googleapis.com/icon?family=Material+Icons'
        ));
    }

    /**
     * Add one js file.
     *
     * @since 1.0.0
     */
    public static function testAddOneJsFile() {

        Asset::js(
            'https://code.jquery.com/jquery-2.2.3.min.js'
        );
    }

    /**
     * Add js file specifying attribute.
     *
     * @since 1.1.1
     */
    public static function testAddOneJsFileAttr() {

        Asset::js(
            'https://code.jquery.com/jquery-2.2.3.min.js', 'async'
        );
    }

    /**
     * Add multiple js files.
     *
     * @since 1.0.0
     */
    public static function testAddMultipleJsFile() {

        Asset::js(array(
            'https://code.jquery.com/jquery-2.2.3.min.js',
            'https://maxcdn.bootstrapcdn.com/bootstrap.min.js'
        ));
    }

    /**
     * Add multiple js files specifying different attributes.
     *
     * @since 1.1.1
     */
    public static function testAddMultipleJsFileAttr() {

        Asset::js(array(
            'async' => 'https://code.jquery.com/jquery-2.2.3.min.js',
            'defer' => 'https://maxcdn.bootstrapcdn.com/bootstrap.min.js'
        ));
    }

    /**
     * Add multiple js files specifying a same attribute.
     *
     * @since 1.1.1
     */
    public static function testAddMultipleJsFileSameAttr() {

        $files = [
            'https://code.jquery.com/jquery-2.2.3.min.js',
            'https://maxcdn.bootstrapcdn.com/bootstrap.min.js'
        ];
        
        Asset::js($files, 'async');
    }
}
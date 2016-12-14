<?php 
/**
 * PHP library for save CSS and JS files to be displayed in same place.
 * 
 * @category   JST
 * @package    Asset
 * @subpackage AssetTest
 * @author     Josantonius - info@josantonius.com
 * @copyright  Copyright (c) 2016 JST PHP Framework
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @version    1.0.0
 * @link       https://github.com/Josantonius/PHP-Asset
 * @since      File available since 1.0.0 - Update: 2016-12-14
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
     *
     * @return string → css file with html tags
     */
    public static function testAddOneCssFile() {

        Asset::css(
            'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'
        );
    }

    /**
     * Add multiple css files.
     *
     * @since 1.0.0
     *
     * @return string → css files with html tags
     */
    public static function testAddMultipleCssFile() {

        Asset::css(array(
            'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
            'https://fonts.googleapis.com/icon?family=Material+Icons'
        ));
    }

    /**
     * Add one js file.
     *
     * @since 1.0.0
     *
     * @return string → js file with html tags
     */
    public static function testAddOneJsFile() {

        Asset::js(
            'https://code.jquery.com/jquery-2.2.3.min.js'
        );
    }

    /**
     * Add multiple js files.
     *
     * @since 1.0.0
     *
     * @return string → js files with html tags
     */
    public static function testAddMultipleJsFile() {

        Asset::js(array(
            'https://code.jquery.com/jquery-2.2.3.min.js',
            'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'
        ));
    }
}

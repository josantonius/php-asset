<?php
/**
 * PHP library for save CSS and JS files to be displayed in same place.
 * 
 * @author     volter9
 * @author     QsmaPL
 * @author     Josantonius
 * @author     Josantonius - info@josantonius.com
 * @copyright  Copyright (c) 2016 JST PHP Framework
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/PHP-Asset
 * @since      File available since 1.0.0 - Update: 2017-02-17
 */

namespace Josantonius\Asset;

# use Josantonius\Asset\Exception\AssetException;

/**
 * Load assets resources.
 *
 * @since 1.0.0
 */
class Asset {

    /**
     * Asset templates.
     *
     * @since 1.0.0
     *
     * @var array → asset templates
     */
    protected static $templates = [
        'js'  => '<script%s src="%s" type="text/javascript"></script>',
        'css' => '<link%s href="%s" rel="stylesheet" type="text/css">',
    ];

    /**
     * Common templates for files.
     *
     * @since 1.0.0
     *
     * @param string|array $files    → file or files to add
     * @param string       $template → template type
     * @param string       $attr     → attribute for loading JS files
     */
    protected static function resource($files, $template, $attr = '') {

        $template = self::$templates[$template];

        if (is_array($files)) {

            foreach ($files as $attribute => $file) {

                $attr = (is_int($attribute)) ? '' : ' ' . $attribute;

                echo sprintf($template, $attr, $file) . "\n";
            }

        } else {

            $attr = (!empty($attr)) ? ' ' . $attr : '';

            echo sprintf($template, $attr, $files) . "\n";
        }
    }

    /**
     * Output script.
     *
     * @since 1.0.0
     *
     * @param string|array $files → file or files to add
     * @param string       $attr  → attribute for loading JS files
     */
    public static function js($files, $attr = '') {

        static::resource($files, 'js', $attr);
    }

    /**
     * Output stylesheet.
     *
     * @since 1.0.0
     *
     * @param string|array $files → file or files to add
     */
    public static function css($files) {

        static::resource($files, 'css');
    }
}
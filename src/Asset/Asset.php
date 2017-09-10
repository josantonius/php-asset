<?php
/**
 * PHP library for save CSS and JS files to be displayed in same place.
 * 
 * @author     volter9
 * @author     QsmaPL
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2016 - 2017
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/PHP-Asset
 * @since      1.0.0
 */

namespace Josantonius\Asset;

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

        'js'  => '<script%s src="%s"></script>',

        'css' => '<link%s rel="stylesheet" href="%s">',
    ];

    /**
     * Output script.
     *
     * @since 1.0.0
     *
     * @param string|array $files → file or files to add
     * @param string       $attr  → attribute for loading JS files
     *
     * @return string → scripts tagged
     */
    public static function js($files, $attr = '') {

        return static::resource($files, 'js', $attr);
    }

    /**
     * Output stylesheet.
     *
     * @since 1.0.0
     *
     * @param string|array $files → file or files to add
     *
     * @return string → styles tagged
     */
    public static function css($files) {

        return static::resource($files, 'css');
    }

    /**
     * Common templates for files.
     *
     * @since 1.0.0
     *
     * @param string|array $files    → file or files to add
     * @param string       $template → template type
     * @param string       $attr     → attribute for loading JS files
     *
     * @return string → resources assets tagged
     */
    protected static function resource($files, $template, $attr = '') {

        $template = self::$templates[$template];

        if (is_array($files)) {

            $resources = '';

            foreach ($files as $attribute => $file) {

                $_attr = is_int($attribute) ? '' : " $attribute";

                $_attr = empty($_attr) && !empty($attr) ? " $attr" : $_attr;

                $resources .= sprintf($template, $_attr, $file) . "\n";
            }

            return $resources;

        } else {

            $attr = (!empty($attr)) ? " $attr" : '';

            return sprintf($template, $attr, $files) . "\n";
        }
    }
}

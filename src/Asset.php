<?php declare(strict_types=1);
/**
 * PHP library for save CSS and JS files to be displayed in same place.
 * 
 * @category   JST
 * @package    Asset
 * @subpackage Asset
 * @author     volter9
 * @author     QsmaPL
 * @author     Josantonius - info@josantonius.com
 * @copyright  Copyright (c) 2016 JST PHP Framework
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @version    1.0.0
 * @link       https://github.com/Josantonius/PHP-Asset
 * @since      File available since 1.0.0 - Update: 2016-12-14
 */

namespace Josantonius\Asset;

use Josantonius\Asset\Exception\AssetException;

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
        'js'  => '<script src="%s" type="text/javascript"></script>',
        'css' => '<link href="%s" rel="stylesheet" type="text/css">',
    ];

    /**
     * Common templates for files.
     *
     * @since 1.0.0
     *
     * @param string|array $files    → file or files to add
     * @param string       $template → template type
     */
    protected static function resource($files, string $template) {

        $template = self::$templates[$template];

        if (is_array($files)) {

            foreach ($files as $file) {

                echo sprintf($template, $file) . "\n";
            }

        } else {

            echo sprintf($template, $files) . "\n";
        }
    }

    /**
     * Output script.
     *
     * @since 1.0.0
     *
     * @param string|array $files → file or files to add
     */
    public static function js($files) {

        static::resource($files, 'js');
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

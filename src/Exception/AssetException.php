<?php declare(strict_types=1);
/**
 * PHP library for save CSS and JS files to be displayed in same place.
 * 
 * @category   JST
 * @package    Asset
 * @subpackage AssetException
 * @author     Josantonius - info@josantonius.com
 * @copyright  Copyright (c) 2016 JST PHP Framework
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @version    1.0.0
 * @link       https://github.com/Josantonius/PHP-Asset
 * @since      File available since 1.0.0 - Update: 2016-12-14
 */

namespace Josantonius\Asset\Exception;

/**
 * Exception class for Asset library.
 *
 * You can use an exception and error handler with this library.
 *
 * @since 1.0.0
 *
 * @link https://github.com/Josantonius/PHP-ErrorHandler
 */
class AssetException extends \Exception { 

    /**
     * Exception handler.
     *
     * @since 1.0.0
     *
     * @param string $msg    → message error (Optional)
     * @param int    $error  → error code (Optional)
     * @param int    $status → HTTP response status code (Optional)
     */
    public function __construct(string $msg = '', int $error = 0, int $status = 0) {

        $this->message    = $msg;
        $this->code       = $error;
        $this->statusCode = $status;
    }
}
<?php

declare(strict_types=1);

/*
* This file is part of https://github.com/josantonius/php-asset repository.
*
* (c) Josantonius <hello@josantonius.dev>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Josantonius\Asset\Facades;

use Josantonius\Asset\Elements\BodyScript;
use Josantonius\Asset\Elements\Link;
use Josantonius\Asset\Elements\HeadScript;
use Josantonius\Asset\Asset as AssetInstance;

/**
 * Assets handler.
 */
class Asset
{
    private static ?AssetInstance $asset;

    /**
     * Get the instance of the Asset.
     */
    private static function getInstance()
    {
        return self::$asset ?? new AssetInstance();
    }

    /**
     * Add body script.
     */
    public static function addBodyScript(
        ?bool $async = null,
        ?string $crossorigin = null,
        ?bool $defer = null,
        ?string $fetchpriority = null,
        ?string $integrity = null,
        ?bool $nomodule = null,
        ?string $nonce = null,
        ?string $referrerpolicy = null,
        ?string $src = null,
        ?string $type = null
    ): BodyScript {
        return new BodyScript(
            async: $async,
            crossorigin: $crossorigin,
            defer: $defer,
            fetchpriority: $fetchpriority,
            integrity: $integrity,
            nomodule: $nomodule,
            nonce: $nonce,
            referrerpolicy: $referrerpolicy,
            src: $src,
            type: $type
        );
    }

    /**
     * Add head script.
     */
    public static function addHeadScript(
        ?bool $async = null,
        ?string $crossorigin = null,
        ?bool $defer = null,
        ?string $fetchpriority = null,
        ?string $integrity = null,
        ?bool $nomodule = null,
        ?string $nonce = null,
        ?string $referrerpolicy = null,
        ?string $src = null,
        ?string $type = null
    ): HeadScript {
        return new HeadScript(
            async: $async,
            crossorigin: $crossorigin,
            defer: $defer,
            fetchpriority: $fetchpriority,
            integrity: $integrity,
            nomodule: $nomodule,
            nonce: $nonce,
            referrerpolicy: $referrerpolicy,
            src: $src,
            type: $type
        );
    }

    /**
     * Add link.
     */
    public static function addLink(
        ?string $as = null,
        ?string $crossorigin = null,
        ?bool $disabled = null,
        ?string $fetchpriority = null,
        ?string $href = null,
        ?string $hreflang = null,
        ?string $imagesizes = null,
        ?string $imagesrcset = null,
        ?string $integrity = null,
        ?string $media = null,
        ?string $prefetch = null,
        ?string $referrerpolicy = null,
        ?string $rel = null,
        ?string $sizes = null,
        ?string $target = null,
        ?string $title = null,
        ?string $type = null,
    ): Link {
        return new Link(
            as: $as,
            crossorigin: $crossorigin,
            disabled: $disabled,
            fetchpriority: $fetchpriority,
            href: $href,
            hreflang: $hreflang,
            imagesizes: $imagesizes,
            imagesrcset: $imagesrcset,
            integrity: $integrity,
            media: $media,
            prefetch: $prefetch,
            referrerpolicy: $referrerpolicy,
            rel: $rel,
            sizes: $sizes,
            target: $target,
            title: $title,
            type: $type
        );
    }

    /**
     * Print the added scripts for the body.
     */
    public static function outputBodyScripts(): string
    {
        return self::getInstance()->outputBodyScripts();
    }

    /**
     * Print the added scripts for the head.
     */
    public static function outputHeadScripts(): string
    {
        return self::getInstance()->outputHeadScripts();
    }

    /**
     * Print the added links.
     */
    public static function outputLinks(): string
    {
        return self::getInstance()->outputLinks();
    }
}

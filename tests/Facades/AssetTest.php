<?php

/*
 * This file is part of https://github.com/josantonius/php-asset repository.
 *
 * (c) Josantonius <hello@josantonius.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
 */

namespace Josantonius\Asset\Tests\Facades;

use PHPUnit\Framework\TestCase;
use Josantonius\Asset\Elements\Link;
use Josantonius\Asset\Facades\Asset;
use Josantonius\Asset\Elements\BodyScript;
use Josantonius\Asset\Elements\HeadScript;

class AssetTest extends TestCase
{
    private Asset $asset;

    public function setUp(): void
    {
        parent::setUp();

        $this->asset = new Asset();
    }

    public function test_should_add_body_script(): void
    {
        $this->assertInstanceOf(
            BodyScript::class,
            $this->asset->addBodyScript(
                async: true,
                crossorigin: 'anonymous',
                defer: true,
                fetchpriority: 'low',
                integrity: 'sha256-n9+',
                nomodule: true,
                nonce: '848THwOdqNKAAfRl7plt8g==',
                referrerpolicy: 'origin',
                src: 'https://example.com/script.js',
                type: 'text/javascript',
            )
        );
    }

    public function test_should_add_head_script(): void
    {
        $this->assertInstanceOf(
            HeadScript::class,
            $this->asset->addHeadScript(
                async: true,
                crossorigin: 'anonymous',
                defer: true,
                fetchpriority: 'low',
                integrity: 'sha256-n9+',
                nomodule: true,
                nonce: '848THwOdqNKAAfRl7plt8g==',
                referrerpolicy: 'origin',
                src: 'https://example.com/script.js',
                type: 'text/javascript',
            )
        );
    }

    public function test_should_add_link(): void
    {
        $this->assertInstanceOf(
            Link::class,
            $this->asset->addLink(
                as: 'stylesheet',
                crossorigin: 'anonymous',
                disabled: true,
                fetchpriority: 'low',
                href: 'https://example.com/style.css',
                hreflang: 'en',
                imagesizes: '100vw',
                imagesrcset: 'https://example.com/image.png',
                integrity: 'sha256-n9+',
                media: 'screen',
                prefetch: 'https://example.com/style.css',
                referrerpolicy: 'origin',
                rel: 'stylesheet',
                sizes: '100vw',
                target: '_blank',
                title: 'Style',
                type: 'text/css',
            )
        );
    }

    public function test_should_output_body_scripts(): void
    {
        $this->assertIsString(
            $this->asset->outputBodyScripts()
        );
    }

    public function test_should_output_head_scripts(): void
    {
        $this->assertIsString(
            $this->asset->outputHeadScripts()
        );
    }

    public function test_should_output_links(): void
    {
        $this->assertIsString(
            $this->asset->outputLinks()
        );
    }
}

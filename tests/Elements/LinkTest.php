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

namespace Josantonius\Asset\Tests\Types;

use PHPUnit\Framework\TestCase;
use Josantonius\Asset\Elements\Link;

class LinkTest extends TestCase
{
    public function test_should_generate_tag_without_attributes(): void
    {
        $link = new Link();

        $this->assertEquals('<link>', $link->getTag());
    }

    public function test_should_generate_tag_with_valid_attributes(): void
    {
        $link = new Link(
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
        );

        $tag = $link->getTag();

        $this->assertStringContainsString('<link ', $tag);

        $this->assertStringContainsString(' as="stylesheet" ', $tag);

        $this->assertStringContainsString(' crossorigin="anonymous" ', $tag);

        $this->assertStringContainsString(' disabled', $tag);

        $this->assertStringContainsString(' fetchpriority="low" ', $tag);

        $this->assertStringContainsString(' href="https://example.com/style.css" ', $tag);

        $this->assertStringContainsString(' hreflang="en" ', $tag);

        $this->assertStringContainsString(' imagesizes="100vw" ', $tag);

        $this->assertStringContainsString(' imagesrcset="https://example.com/image.png" ', $tag);

        $this->assertStringContainsString(' integrity="sha256-n9+" ', $tag);

        $this->assertStringContainsString(' media="screen" ', $tag);

        $this->assertStringContainsString(' prefetch="https://example.com/style.css" ', $tag);

        $this->assertStringContainsString(' referrerpolicy="origin" ', $tag);

        $this->assertStringContainsString(' rel="stylesheet" ', $tag);

        $this->assertStringContainsString(' sizes="100vw" ', $tag);

        $this->assertStringContainsString(' target="_blank" ', $tag);

        $this->assertStringContainsString(' title="Style" ', $tag);

        $this->assertStringContainsString(' type="text/css" ', $tag);

        $this->assertStringContainsString('>', $tag);
    }
}

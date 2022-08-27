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
use Josantonius\Asset\Elements\BodyScript;
use Josantonius\Asset\Elements\HeadScript;

class ScriptTest extends TestCase
{
    public function test_should_generate_tag_without_attributes(): void
    {
        $script = new BodyScript();

        $this->assertEquals('<script></script>', $script->getTag());
    }

    public function test_should_generate_tag_with_valid_attributes(): void
    {
        $script = new HeadScript(
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
        );

        $tag = $script->getTag();

        $this->assertStringContainsString('<script ', $tag);

        $this->assertStringContainsString(' async ', $tag);

        $this->assertStringContainsString(' crossorigin="anonymous" ', $tag);

        $this->assertStringContainsString(' defer ', $tag);

        $this->assertStringContainsString(' fetchpriority="low" ', $tag);

        $this->assertStringContainsString(' integrity="sha256-n9+" ', $tag);

        $this->assertStringContainsString(' nomodule ', $tag);

        $this->assertStringContainsString(' nonce="848THwOdqNKAAfRl7plt8g==" ', $tag);

        $this->assertStringContainsString(' referrerpolicy="origin"', $tag);

        $this->assertStringContainsString(' src="https://example.com/script.js" ', $tag);

        $this->assertStringContainsString(' type="text/javascript" ', $tag);

        $this->assertStringContainsString('></script>', $tag);
    }
}

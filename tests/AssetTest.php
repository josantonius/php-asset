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

namespace Josantonius\Asset\Tests;

use ReflectionClass;
use Josantonius\Asset\Asset;
use PHPUnit\Framework\TestCase;
use Josantonius\Asset\Elements\Link;
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

    /**
     * @runInSeparateProcess
     */
    public function test_should_add_link_to_collection(): void
    {
        new Link();

        $collection = $this->getPrivateProperty('linkCollection');

        $this->assertCount(1, $collection);

        $this->assertInstanceOf(Link::class, $collection[0]);
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_add_multiple_link_to_collection(): void
    {
        new Link();
        new Link();

        $collection = $this->getPrivateProperty('linkCollection');

        $this->assertCount(2, $collection);

        $this->assertInstanceOf(Link::class, $collection[0]);
        $this->assertInstanceOf(Link::class, $collection[1]);
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_add_head_script_to_collection(): void
    {
        new HeadScript();

        $collection = $this->getPrivateProperty('headScriptCollection');

        $this->assertCount(1, $collection);

        $this->assertInstanceOf(HeadScript::class, $collection[0]);
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_add_multiple_head_script_to_collection(): void
    {
        new HeadScript();
        new HeadScript();

        $collection = $this->getPrivateProperty('headScriptCollection');

        $this->assertCount(2, $collection);

        $this->assertInstanceOf(HeadScript::class, $collection[0]);
        $this->assertInstanceOf(HeadScript::class, $collection[1]);
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_add_body_script_to_collection(): void
    {
        new BodyScript();

        $collection = $this->getPrivateProperty('bodyScriptCollection');

        $this->assertCount(1, $collection);

        $this->assertInstanceOf(BodyScript::class, $collection[0]);
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_add_multiple_body_script_to_collection(): void
    {
        new BodyScript();
        new BodyScript();

        $collection = $this->getPrivateProperty('bodyScriptCollection');

        $this->assertCount(2, $collection);

        $this->assertInstanceOf(BodyScript::class, $collection[0]);
        $this->assertInstanceOf(BodyScript::class, $collection[1]);
    }

    public function test_should_output_body_scripts(): void
    {
        new BodyScript();
        new BodyScript();

        $this->assertEquals(
            "<script></script>\n<script></script>\n",
            $this->asset->outputBodyScripts()
        );
    }

    public function test_should_output_head_scripts(): void
    {
        new HeadScript();
        new HeadScript();

        $this->assertEquals(
            "<script></script>\n<script></script>\n",
            $this->asset->outputHeadScripts()
        );
    }

    public function test_should_output_links(): void
    {
        new Link();
        new Link();

        $this->assertEquals(
            "<link>\n<link>\n",
            $this->asset->outputLinks()
        );
    }

    private function getPrivateProperty(string $property): array
    {
        $reflection = new ReflectionClass($this->asset);

        $reflectionProperty = $reflection->getProperty($property);
        $reflectionProperty->setAccessible(true);

        return $reflectionProperty->getValue($this->asset);
    }
}

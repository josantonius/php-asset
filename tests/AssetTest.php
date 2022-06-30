<?php

/*
* This file is part of https://github.com/josantonius/php-asset repository.
*
* (c) Josantonius <hello@josantonius.dev>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Josantonius\Asset\Tests;

use Josantonius\Asset\Asset;
use Josantonius\Asset\Elements\BodyScript;
use Josantonius\Asset\Elements\HeadScript;
use Josantonius\Asset\Elements\Link;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

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
    public function testShouldAddLinkToCollection(): void
    {
        new Link();

        $collection = $this->getPrivateProperty('linkCollection');

        $this->assertCount(1, $collection);

        $this->assertInstanceOf(Link::class, $collection[0]);
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldAddMultipleLinkToCollection(): void
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
    public function testShouldAddHeadScriptToCollection(): void
    {
        new HeadScript();

        $collection = $this->getPrivateProperty('headScriptCollection');

        $this->assertCount(1, $collection);

        $this->assertInstanceOf(HeadScript::class, $collection[0]);
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldAddMultipleHeadScriptToCollection(): void
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
    public function testShouldAddBodyScriptToCollection(): void
    {
        new BodyScript();

        $collection = $this->getPrivateProperty('bodyScriptCollection');

        $this->assertCount(1, $collection);

        $this->assertInstanceOf(BodyScript::class, $collection[0]);
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldAddMultipleBodyScriptToCollection(): void
    {
        new BodyScript();
        new BodyScript();

        $collection = $this->getPrivateProperty('bodyScriptCollection');

        $this->assertCount(2, $collection);

        $this->assertInstanceOf(BodyScript::class, $collection[0]);
        $this->assertInstanceOf(BodyScript::class, $collection[1]);
    }

    public function testShouldOutputBodyScripts(): void
    {
        new BodyScript();
        new BodyScript();

        $this->assertEquals(
            "<script></script>\n<script></script>\n",
            $this->asset->outputBodyScripts()
        );
    }

    public function testShouldOutputHeadScripts(): void
    {
        new HeadScript();
        new HeadScript();

        $this->assertEquals(
            "<script></script>\n<script></script>\n",
            $this->asset->outputHeadScripts()
        );
    }

    public function testShouldOutputLinks(): void
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

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

namespace Josantonius\Asset;

use Josantonius\Asset\Elements\Link;
use Josantonius\Asset\Elements\Script;
use Josantonius\Asset\Elements\HeadScript;

/**
 * Assets handler.
 */
class Asset
{
    private static array $linkCollection = [];

    private static array $headScriptCollection = [];

    private static array $bodyScriptCollection = [];

    /**
     * Add link to collection.
     */
    public function addLinkToCollection(Link $link): void
    {
        self::$linkCollection[] = $link;
    }

    /**
     * Add script to collection.
     */
    public function addScriptToCollection(Script $script): void
    {
        if ($script instanceof HeadScript) {
            self::$headScriptCollection[] = $script;
            return;
        }

        self::$bodyScriptCollection[] = $script;
    }

    /**
     * Print the added scripts for the body.
     */
    public function outputBodyScripts(): string
    {
        return $this->outputAssets(self::$bodyScriptCollection);
    }

    /**
     * Print the added scripts for the head.
     */
    public function outputHeadScripts(): string
    {
        return $this->outputAssets(self::$headScriptCollection);
    }

    /**
     * Print the added links.
     */
    public function outputLinks(): string
    {
        return $this->outputAssets(self::$linkCollection);
    }

    /**
     * Print the added assets.
     */
    private function outputAssets(array &$collection): string
    {
        $output = '';

        foreach ($collection as $asset) {
            $output .= $asset->getTag() . "\n";
        }

        $collection = [];

        return $output;
    }
}

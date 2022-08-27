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

namespace Josantonius\Asset\Elements;

use Josantonius\Asset\Asset;

/**
 * HTML link generator.
 */
class Link
{
    /**
     * Link tag.
     */
    private string $tag;

    /**
     * Adding link.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link
     */
    public function __construct(
        private ?string $as = null,
        private ?string $crossorigin = null,
        private ?bool $disabled = null,
        private ?string $fetchpriority = null,
        private ?string $href = null,
        private ?string $hreflang = null,
        private ?string $imagesizes = null,
        private ?string $imagesrcset = null,
        private ?string $integrity = null,
        private ?string $media = null,
        private ?string $prefetch = null,
        private ?string $referrerpolicy = null,
        private ?string $rel = null,
        private ?string $sizes = null,
        private ?string $target = null,
        private ?string $title = null,
        private ?string $type = null,
    ) {
        $this->generateTag();

        (new Asset())->addLinkToCollection($this);
    }

    /**
     * Get script tag.
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * Generate script tag.
     */
    private function generateTag(): void
    {
        $attributes =
            $this->getHrefAttribute() .
            $this->getHreflangAttribute() .
            $this->getAsAttribute() .
            $this->getRelAttribute() .
            $this->getCrossoriginAttribute() .
            $this->getFetchpriorityAttribute() .
            $this->getImagesizesAttribute() .
            $this->getImagesrcsetAttribute() .
            $this->getIntegrityAttribute() .
            $this->getMediaAttribute() .
            $this->getPrefetchAttribute() .
            $this->getReferrerpolicyAttribute() .
            $this->getSizesAttribute() .
            $this->getTitleAttribute() .
            $this->getTypeAttribute() .
            $this->getTargetAttribute() .
            $this->getDisabledAttribute();

        $this->tag = "<link$attributes>";
    }

    /**
     * Get as attribute.
     */
    private function getAsAttribute(): string
    {
        return $this->as !== null ? " as=\"$this->as\"" : '';
    }

    /**
     * Get crossorigin attribute.
     */
    private function getCrossoriginAttribute(): string
    {
        return $this->crossorigin !== null ? " crossorigin=\"$this->crossorigin\"" : '';
    }

    /**
     * Get disabled attribute.
     */
    private function getDisabledAttribute(): string
    {
        return $this->disabled === true ? ' disabled' : '';
    }

    /**
     * Get fetchpriority attribute.
     */
    private function getFetchpriorityAttribute(): string
    {
        return $this->fetchpriority !== null ? " fetchpriority=\"$this->fetchpriority\"" : '';
    }

    /**
     * Get href attribute.
     */
    private function getHrefAttribute(): string
    {
        return $this->href !== null ? " href=\"$this->href\"" : '';
    }

    /**
     * Get hreflang attribute.
     */
    private function getHreflangAttribute(): string
    {
        return $this->hreflang !== null ? " hreflang=\"$this->hreflang\"" : '';
    }

    /**
     * Get imagesizes attribute.
     */
    private function getImagesizesAttribute(): string
    {
        return $this->imagesizes !== null ? " imagesizes=\"$this->imagesizes\"" : '';
    }

    /**
     * Get imagesrcset attribute.
     */
    private function getImagesrcsetAttribute(): string
    {
        return $this->imagesrcset !== null ? " imagesrcset=\"$this->imagesrcset\"" : '';
    }

    /**
     * Get integrity attribute.
     */
    private function getIntegrityAttribute(): string
    {
        return $this->integrity !== null ? " integrity=\"$this->integrity\"" : '';
    }

    /**
     * Get media attribute.
     */
    private function getMediaAttribute(): string
    {
        return $this->media !== null ? " media=\"$this->media\"" : '';
    }

    /**
     * Get prefetch attribute.
     */
    private function getPrefetchAttribute(): string
    {
        return $this->prefetch !== null ? " prefetch=\"$this->prefetch\"" : '';
    }

    /**
     * Get referrerpolicy attribute.
     */
    private function getReferrerpolicyAttribute(): string
    {
        return $this->referrerpolicy !== null ? " referrerpolicy=\"$this->referrerpolicy\"" : '';
    }

    /**
     * Get rel attribute.
     */
    private function getRelAttribute(): string
    {
        return $this->rel !== null ? " rel=\"$this->rel\"" : '';
    }

    /**
     * Get sizes attribute.
     */
    private function getSizesAttribute(): string
    {
        return $this->sizes !== null ? " sizes=\"$this->sizes\"" : '';
    }

    /**
     * Get target attribute.
     */
    private function getTargetAttribute(): string
    {
        return $this->target !== null ? " target=\"$this->target\"" : '';
    }

    /**
     * Get title attribute.
     */
    private function getTitleAttribute(): string
    {
        return $this->title !== null ? " title=\"$this->title\"" : '';
    }

    /**
     * Get type attribute.
     */
    private function getTypeAttribute(): string
    {
        return $this->type !== null ? " type=\"$this->type\"" : '';
    }
}

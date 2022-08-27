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
 * HTML script generator.
 */
abstract class Script
{
    /**
     * Script tag.
     */
    private string $tag;

    /**
     * Adding script.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script
     */
    public function __construct(
        private ?bool $async = null,
        private ?string $crossorigin = null,
        private ?bool $defer = null,
        private ?string $fetchpriority = null,
        private ?string $integrity = null,
        private ?bool $nomodule = null,
        private ?string $nonce = null,
        private ?string $referrerpolicy = null,
        private ?string $src = null,
        private ?string $type = null,
    ) {
        $this->generateTag();

        (new Asset())->addScriptToCollection($this);
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
            $this->getNomoduleAttribute() .
            $this->getAsyncAttribute() .
            $this->getDeferAttribute() .
            $this->getTypeAttribute() .
            $this->getSrcAttribute() .
            $this->getCrossoriginAttribute() .
            $this->getFetchpriorityAttribute() .
            $this->getIntegrityAttribute() .
            $this->getNonceAttribute() .
            $this->getReferrerpolicyAttribute();

        $this->tag = "<script$attributes></script>";
    }

    /**
     * Get async attribute.
     */
    private function getAsyncAttribute(): string
    {
        return $this->async === true ? ' async' : '';
    }

    /**
     * Get crossorigin attribute.
     */
    private function getCrossoriginAttribute(): string
    {
        return $this->crossorigin !== null ? " crossorigin=\"$this->crossorigin\"" : '';
    }

    /**
     * Get defer attribute.
     */
    private function getDeferAttribute(): string
    {
        return $this->defer === true ? ' defer' : '';
    }

    /**
     * Get fetchpriority attribute.
     */
    private function getFetchpriorityAttribute(): string
    {
        return $this->fetchpriority !== null ? " fetchpriority=\"$this->fetchpriority\"" : '';
    }

    /**
     * Get integrity attribute.
     */
    private function getIntegrityAttribute(): string
    {
        return $this->integrity !== null ? " integrity=\"$this->integrity\"" : '';
    }

    /**
     * Get nomodule attribute.
     */
    private function getNomoduleAttribute(): string
    {
        return $this->nomodule === true ? ' nomodule' : '';
    }

    /**
     * Get nonce attribute.
     */
    private function getNonceAttribute(): string
    {
        return $this->nonce !== null ? " nonce=\"$this->nonce\"" : '';
    }

    /**
     * Get referrerpolicy attribute.
     */
    private function getReferrerpolicyAttribute(): string
    {
        return $this->referrerpolicy !== null ? " referrerpolicy=\"$this->referrerpolicy\"" : '';
    }

    /**
     * Get src attribute.
     */
    private function getSrcAttribute(): string
    {
        return $this->src !== null ? " src=\"$this->src\"" : '';
    }

    /**
     * Get type attribute.
     */
    private function getTypeAttribute(): string
    {
        return $this->type !== null ? " type=\"$this->type\"" : '';
    }
}

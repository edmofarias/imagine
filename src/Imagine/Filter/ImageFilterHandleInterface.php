<?php

namespace Imagine\Filter;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Interface ImageFilterHandleInterface
 * @package Imagine\Filter
 */
interface ImageFilterHandleInterface
{
    /**
     * @param $resource
     * @param ArrayCollection $filters
     */
    public function apply($resource, ArrayCollection $filters);

    /**
     * @return resource
     */
    public function getResource();
}

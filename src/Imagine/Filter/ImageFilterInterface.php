<?php

namespace Imagine\Filter;

/**
 * Interface ImageFilterInterface
 * @package Imagine\Filter
 */
interface ImageFilterInterface
{
    /**
     * @param $resource
     * @return mixed
     */
    public function apply($resource);

    /**
     * @return string
     */
    public function getClassFilter();
}

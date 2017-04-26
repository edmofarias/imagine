<?php

namespace Imagine\Filter;
use Doctrine\Common\Collections\ArrayCollection;
use Imagine\File\Exception\ImagineFilterIsNotInstanceFilterException;

/**
 * Class ImageFilterHandle
 * @package Imagine\Filter
 */
class ImageFilterHandle implements ImageFilterHandleInterface
{
    /**
     * @var resource
     */
    private $resource;

    /**
     * @param $resource
     * @param ArrayCollection $filters
     */
    public function apply($resource, ArrayCollection $filters)
    {
        /**
         * @var ImageFilterInterface $filter
         */
        foreach ($filters as $filter) {
            $this->checkInstance($filter);
            $resource = $filter->apply($resource);
        }

        $this->resource = $resource;
    }

    /**
     * @return resource
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param $filter
     * @throws ImagineFilterIsNotInstanceFilterException
     */
    private function checkInstance($filter)
    {
        if (!$filter instanceof ImageFilterInterface) {
            $message = 'Filter %s does not implement the %s';

            throw new ImagineFilterIsNotInstanceFilterException(
                sprintf($message, get_class($filter), ImageFilterInterface::class)
            );
        }
    }
}

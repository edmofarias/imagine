<?php

namespace Imagine\Filter;

use Imagine\File\Exception\ImagineFilterNotApplyException;

/**
 * Class ImageFlipFilter
 * @package Imagine\Filter
 */
class ImageFlipFilter implements ImageFilterInterface
{
    /**
     * @var int
     */
    private $mode;

    /**
     * ImageFlipFilter constructor.
     * @param $mode
     */
    public function __construct($mode)
    {
        $this->mode = $mode;
    }

    /**
     * @param $resource
     * @return resource
     * @throws ImagineFilterNotApplyException
     */
    public function apply($resource)
    {
        $image = imageflip($resource, $this->mode);

        if (!$image) {
            throw new ImagineFilterNotApplyException(sprintf('Error applying filter %s', $this->getClass()));
        }

        return $image;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return get_class($this);
    }
}

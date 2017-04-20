<?php

namespace Imagine\Filter;

use Imagine\Exception\ErrorFilterApplyException;

/**
 * Class ImageResizeFilter
 * @package Imagine\Filter
 */
class ImageResizeFilter implements ImageFilterInterface
{
    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * ImageCropFilter constructor.
     * @param $width
     * @param $height
     */
    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
    /**
     * @param $resource
     * @return bool|resource
     */
    public function apply($resource)
    {
        $widthDest = $this->width;
        $heightDest = $this->height;

        $image = imagecreatetruecolor($widthDest, $heightDest);

        $widthSrc = imagesx($resource);
        $heightSrc = imagesy($resource);

        imagecopyresized($image, $resource, 0, 0, 0, 0, $widthDest, $heightDest, $widthSrc, $heightSrc);

        if (!$image) {
            throw new ErrorFilterApplyException(sprintf('Error applying filter %s', $this->getClassFilter()));
        }

        return $image;
    }

    /**
     * @return string
     */
    public function getClassFilter()
    {
        return get_class($this);
    }
}

<?php

namespace Imagine\Filter;

use Imagine\File\Exception\ImagineFilterNotApplyException;

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
     * @return resource
     * @throws ImagineFilterNotApplyException
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

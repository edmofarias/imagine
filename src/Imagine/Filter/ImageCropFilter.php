<?php

namespace Imagine\Filter;

use Imagine\File\Exception\ImagineFilterNotApplyException;

/**
 * Class ImageCropFilter
 * @package Imagine\Filter
 */
class ImageCropFilter implements ImageFilterInterface
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
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

    /**
     * ImageCropFilter constructor.
     * @param $width
     * @param $height
     * @param int $x
     * @param int $y
     */
    public function __construct($width, $height, $x = 0, $y = 0)
    {
        $this->width = $width;
        $this->height = $height;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @param $resource
     * @return resource
     * @throws ImagineFilterNotApplyException
     */
    public function apply($resource)
    {
        $image = imagecrop($resource, [
            'x' => $this->x,
            'y' => $this->y,
            'width' => $this->width,
            'height' => $this->height
        ]);

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

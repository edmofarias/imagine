<?php

namespace Imagine\Filter;

use Imagine\Exception\ErrorFilterApplyException;

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
     * @return bool|resource
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

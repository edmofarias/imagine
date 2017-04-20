<?php

namespace Imagine\Resource;

use Doctrine\Common\Collections\ArrayCollection;
use Imagine\ImageQuality;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ImageContextResource
 * @package Imagine\Resource
 */
class ImageContextResource
{
    /**
     * @var ImageResourceInterface
     */
    private $resource;

    /**
     * ImageContextResource constructor.
     * @param ImageResourceInterface $resource
     */
    public function __construct(ImageResourceInterface $resource)
    {
        $this->resource = $resource;
    }

    /**
     * @param int $quality
     * @param bool $force
     *
     * @return Response
     */
    public function output($quality, ArrayCollection $filters = null, $download = false)
    {
        return $this->resource->output($quality, $filters, $download);
    }
}

<?php

namespace Imagine\Resource;

use Doctrine\Common\Collections\ArrayCollection;
use Imagine\ImageFileInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface ImageResourceInterface
 * @package Imagine\Resource
 */
interface ImageResourceInterface
{
    /**
     * ImageResourceInterface constructor.
     * @param ImageFileInterface $image
     */
    public function __construct(ImageFileInterface $image);

    /**
     * @param int $quality
     * @param bool $force
     *
     * @return Response
     */
    public function output($quality, ArrayCollection $filters = null, $download = false);
}

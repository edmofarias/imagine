<?php

namespace Imagine;

use Doctrine\Common\Collections\ArrayCollection;
use Imagine\Exception\ResourceNotFoundException;
use Imagine\Resource\ImageContextResource;
use Imagine\Resource\ImageJpegResource;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class Imagine
 * @package Imagine
 */
class Imagine
{
    /**
     * @param ImageFileInterface $image
     * @param $quality
     * @param ArrayCollection|null $filters
     * @param bool $download
     *
     * @return Response
     * @throws ResourceNotFoundException
     */
    public function output(ImageFileInterface $image, $quality, ArrayCollection $filters = null, $download = false)
    {
        $context = null;

        if (ImageJpegResource::MIME_TYPE_JPEG === $image->getMimeType()) {
            $context = new ImageContextResource(new ImageJpegResource($image));
        }

        if (!$context) {
            throw new ResourceNotFoundException(sprintf('Implementation not found for Mime Type %s', $image->getMimeType()));
        }

        return $context->output($quality, $filters , $download);

    }
}

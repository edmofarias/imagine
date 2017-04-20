<?php

namespace Imagine\Resource;

use Doctrine\Common\Collections\ArrayCollection;
use Imagine\Filter\ImageFilterInterface;
use Imagine\ImageFileInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AbstractImageResource
 * @package Imagine\Resource
 */
abstract class AbstractImageResource
{
    /**
     * @var ImageFileInterface
     */
    protected $file;

    /**
     * AbstractImageResource constructor.
     * @param ImageFileInterface $image
     */
    public function __construct(ImageFileInterface $image)
    {
        $this->file = $image;
    }

    /**
     * @param $image
     * @param $filename
     * @param $mimeType
     * @param bool $download
     *
     * @return Response
     */
    protected function response($image, $filename, $mimeType, $download = false)
    {
        $disposition = ($download) ? 'attachment' : 'inline';

        $headers = [
            'Content-Type' => $mimeType,
            'Content-Disposition' => sprintf('%s; filename="%s"', $disposition, $filename)
        ];

        return new Response($image, 200, $headers);
    }

    /**
     * @param ArrayCollection $filters
     */
    protected function applyFilters($resource, ArrayCollection $filters)
    {
        /**
         * @var ImageFilterInterface $filter
         */
        foreach ($filters as $filter) {
            $resource = $filter->apply($resource);
        }

        return $resource;
    }

    /**
     * @return ImageFileInterface
     */
    protected function getFile()
    {
        return $this->file;
    }
}

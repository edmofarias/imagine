<?php

namespace Imagine\Context;

use Doctrine\Common\Collections\ArrayCollection;
use Imagine\Filter\ImageFilterHandle;
use Imagine\Filter\ImageFilterHandleInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AbstractImageContext
 * @package Imagine\Context
 */
abstract class AbstractImageContext
{
    /**
     * @var ImageFilterHandleInterface
     */
    protected $imageFilterHandle;

    /**
     * AbstractImageContext constructor.
     */
    public function __construct()
    {
        $this->imageFilterHandle = new ImageFilterHandle();
    }

    /**
     * @param $image
     * @param $filename
     * @param $mimeType
     * @param bool $download
     *
     * @return Response
     */
    protected function response($image, $filename, $mime)
    {
        $headers = [
            'Content-Type' => $mime,
            'Content-Disposition' => sprintf('%s; filename="%s"', 'inline', $filename)
        ];

        return new Response($image, 200, $headers);
    }

    /**
     * @return ImageFilterHandleInterface
     */
    protected function getFilterHandle()
    {
        return $this->imageFilterHandle;
    }
}

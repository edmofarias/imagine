<?php

namespace Imagine\Context;

use Imagine\File\ImageFileInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface ImageContextInterface
 * @package Imagina\Context
 */
interface ImageContextInterface
{
    /**
     * @param ImageFileInterface $imageFile
     * @param $quality
     *
     * @return Response
     */
    public function render(ImageFileInterface $imageFile, $quality);
}

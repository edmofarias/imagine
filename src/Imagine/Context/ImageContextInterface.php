<?php

namespace Imagine\Context;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @param ArrayCollection $filters
     * @param $quality
     * @return Response
     */
    public function render(ImageFileInterface $imageFile, ArrayCollection $filters = null, int $quality);
}

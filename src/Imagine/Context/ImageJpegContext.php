<?php

namespace Imagine\Context;

use Doctrine\Common\Collections\ArrayCollection;
use Imagine\File\ImageFileInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ImageJpegContext
 * @package Imagina\Context
 */
class ImageJpegContext extends AbstractImageContext implements ImageContextInterface
{
    /**
     * @param ImageFileInterface $imageFile
     * @param ArrayCollection|null $filters
     * @param int $quality
     * @return Response
     */
    public function render(ImageFileInterface $imageFile, ArrayCollection $filters = null, int $quality)
    {
        $resource = imagecreatefromjpeg($imageFile->getPath());
        
        $filter = $this->getFilterHandle();
        $filter->apply($resource, $filters);

        $resource = $filter->getResource();

        ob_start();
        imagejpeg($resource, null, $quality);
        $image = ob_get_contents();
        imagedestroy($resource);
        ob_end_clean();


        $filename = sprintf('%s.%s', $imageFile->getFilename(), $imageFile->getExtension());
        $mime = $imageFile->getMime();

        return $this->response($image, $filename, $mime);
    }
}

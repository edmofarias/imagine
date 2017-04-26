<?php

namespace Imagine\Context;

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
     * @param $quality
     * @return Response
     */
    public function render(ImageFileInterface $imageFile, $quality)
    {
        $resource = imagecreatefromjpeg($imageFile->getPath());
        $filename = sprintf('%s.%s', $imageFile->getFilename(), $imageFile->getExtension());
        $mime = $imageFile->getMime();

        ob_start();
        imagejpeg($resource, null, $quality);
        $image = ob_get_contents();
        imagedestroy($resource);
        ob_end_clean();

        return $this->response($image, $filename, $mime);
    }
}

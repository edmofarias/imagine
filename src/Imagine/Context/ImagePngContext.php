<?php

namespace Imagine\Context;

use Doctrine\Common\Collections\ArrayCollection;
use Imagine\File\ImageFileInterface;
use Imagine\Filter\ImageFilterHandle;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ImagePngContext
 * @package Imagina\Context
 */
class ImagePngContext extends AbstractImageContext implements ImageContextInterface
{
    /**
     * @param ImageFileInterface $imageFile
     * @param $quality
     * @return Response
     */
    public function render(ImageFileInterface $imageFile, ArrayCollection $filters = null, int $quality)
    {
        $quality = round((100 - $quality) * 0.09);
        $resource = imagecreatefrompng($imageFile->getPath());

        $filter = $this->getFilterHandle();
        $filter->apply($resource, $filters);

        $resource = $filter->getResource();

        ob_start();
        imagepng($resource, null, $quality);
        $image = ob_get_contents();
        imagedestroy($resource);
        ob_end_clean();


        $filename = sprintf('%s.%s', $imageFile->getFilename(), $imageFile->getExtension());
        $mime = $imageFile->getMime();

        return $this->response($image, $filename, $mime);
    }
}

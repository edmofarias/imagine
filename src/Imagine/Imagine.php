<?php

namespace Imagine;

use Doctrine\Common\Collections\ArrayCollection;
use Imagine\Context\ImageContextInterface;
use Imagine\Context\ImageJpegContext;
use Imagine\Context\ImagePngContext;
use Imagine\Exception\ImagineContextNotImplementedException;
use Imagine\File\ImageFileInterface;
use Imagine\File\ImageLoadFile;
use Imagine\File\ImageLoadFileInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class Imagine
 * @package Imagine
 */
class Imagine
{
    const IMAGE_QUALITY_LOW        = 10;
    const IMAGE_QUALITY_MEDIUM     = 30;
    const IMAGE_QUALITY_HIGH       = 60;
    const IMAGE_QUALITY_VERY_HIGH  = 80;
    const IMAGE_QUALITY_MAXIMUM    = 100;

    /**
     * @param string $path
     * @param int $quality
     * @return Response
     */
    public function output(string $path, ArrayCollection $filters = null, int $quality = self::IMAGE_QUALITY_HIGH)
    {
        /**
         * @var ImageLoadFileInterface $imageLoadFile
         */
        $imageLoadFile = new ImageLoadFile($path);
        $imageFile = $imageLoadFile->getImage();

        /**
         * @var ImageContextInterface $context
         *
         * JPEG Image (.jpe, .jpeg, .jpg, .jfif) - ImageJpegContext
         * PNG Image (.png) - ImagePngContext
         */
        $context = $this->doCallContext($imageLoadFile);

        return $context->render($imageFile, $filters, $quality);
    }

    /**
     * @param ImageLoadFileInterface $imageLoadFile
     * @return ImageContextInterface
     * @throws ImagineContextNotImplementedException
     */
    private function doCallContext(ImageLoadFileInterface $imageLoadFile)
    {
        /**
         * @var ImageFileInterface $image
         */
        $imageFile = $imageLoadFile->getImage();

        /**
         * @var string $context Namespace class
         */
        $context = $this->getContext($imageFile->getMime());

        return new $context();
    }

    /**
     * @param string $mime
     * @return string
     * @throws ImagineContextNotImplementedException
     */
    private function getContext(string $mime)
    {
        $resources = [
            ImageLoadFileInterface::MIME_TYPE_JPEG =>  ImageJpegContext::class,
            ImageLoadFileInterface::MIME_TYPE_PNG =>  ImagePngContext::class
        ];

        if (!array_key_exists($mime, $resources)) {
            $message = 'Resource not implemented for mime type %s';
            throw new ImagineContextNotImplementedException(sprintf('$message', $mime));
        }

        return $resources[$mime];
    }
}

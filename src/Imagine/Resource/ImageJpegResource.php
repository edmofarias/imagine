<?php

namespace Imagine\Resource;
use Doctrine\Common\Collections\ArrayCollection;
use Imagine\ImageFileInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ImageJpegResource
 * @package Imagine\Resources
 */
class ImageJpegResource extends AbstractImageResource implements ImageResourceInterface
{
    /**
     * Mime Type JPEG (.jpe, .jpeg, .jpg, .jfif) images
     */
    const MIME_TYPE_JPEG = 'image/jpeg';

    /**
     * Extension .jpe images
     */
    const EXTENSION_JPEG_JPE = 'jpe';

    /**
     * Extension .jpeg images
     */
    const EXTENSION_JPEG = 'jpeg';

    /**
     * Extension .jpg images
     */
    const EXTENSION_JPEG_JPG = 'jpg';

    /**
     * Extension .jfif images
     */
    const EXTENSION_JPEG_JFIF = 'jfif';

    /**
     * @param int $quality
     * @param null $path
     *
     * @return Response
     */
    public function output($quality, ArrayCollection $filters = null, $download = false)
    {
        $resource = imagecreatefromjpeg($this->getFile()->getRealpath());
        $resource = $this->applyFilters($resource, $filters);

        $filename = $this->getFile()->getFilename();

        ob_start();
        imagejpeg($resource, null, $quality);
        $image = ob_get_contents();
        imagedestroy($resource);
        ob_end_clean();

        return $this->response($image, $filename, self::MIME_TYPE_JPEG, $download);
    }
}

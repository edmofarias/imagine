<?php

namespace Imagine;

use Imagine\Exception\ExtensionNotAllowedException;
use Imagine\Exception\ImageNotFoundException;
use Imagine\Exception\MimeTypeNotAllowedException;
use Imagine\Resource\ImageJpegResource;
use Imagine\Resource\ImageResourceInterface;

/**
 * Class ImageFile
 * @package Imagine
 */
class ImageFile implements ImageFileInterface
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $realpath;

    /**
     * @var string
     */
    private $filename;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @var string
     */
    private $mimeType;

    /**
     * @var string
     */
    private $extension;

    /**
     * @var ImageResourceInterface
     */
    private $resource;

    /**
     * ImageFile constructor.
     * @param string $path
     */
    public function __construct($path)
    {
        $this->load($path);
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $realpath
     */
    public function setRealpath($realpath)
    {
        $this->realpath = $realpath;
    }

    /**
     * @param string $realpath
     */
    public function getRealpath()
    {
        return $this->realpath;
    }

    /**
     * @param string $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param string $mimeType
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param string $extension
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    }

    /**
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @return ImageResourceInterface $resource
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return ImageResourceInterface
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Load file images
     */
    private function load($path)
    {
        $realpath = realpath($path);

        if (!$realpath) {
            throw new ImageNotFound(sprintf('File "%s" not found', $path));
        }

        $this->setRealpath($realpath);

        $this->setFilename(pathinfo($path, PATHINFO_FILENAME));
        $this->setPath($path);

        list($width, $height) = getimagesize($realpath);
        $this->setWidth($width);
        $this->setHeight($height);


        $this->checkExtensionAllowed($path);
        $this->checkMimeTypeAllowed($path);

        $this->setMimeType(mime_content_type($realpath));
        $this->setExtension(pathinfo($realpath, PATHINFO_EXTENSION));
    }

    /**
     * @param $realpath
     * @return bool
     * @throws MimeTypeNotAllowedException
     */
    private function checkMimeTypeAllowed($realpath)
    {
        $fileMimeType = mime_content_type($realpath);

        $mimeTypesAllowed = [
            ImageJpegResource::MIME_TYPE_JPEG
        ];

        if (!in_array($fileMimeType, $mimeTypesAllowed)) {
            throw new MimeTypeNotAllowedException(sprintf('Mime Type "%s" not allowed', $fileMimeType));
        }

        return true;
    }

    /**
     * @param $realpath
     * @return bool
     * @throws ExtensionNotAllowedException
     */
    private function checkExtensionAllowed($realpath)
    {
        $fileExtension = pathinfo($realpath, PATHINFO_EXTENSION);

        $extensionsAllowed = [
            ImageJpegResource::EXTENSION_JPEG_JPG
        ];

        if (!in_array($fileExtension, $extensionsAllowed)) {
            throw new ExtensionNotAllowedException(sprintf('Extension "%s" not allowed', $fileExtension));
        }

        return true;
    }
}

<?php

namespace Imagine\File;

use Imagine\File\Exception\ImagineExtensionNotAllowedException;
use Imagine\File\Exception\ImagineFileNotFoundException;
use Imagine\File\Exception\ImagineMimeTypeNotAllowedException;
use Imagine\File\Exception\ImaginePathEmptyException;

/**
 * Class ImageLoadFile
 * @package Imagine\File
 */
class ImageLoadFile implements ImageLoadFileInterface
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var ImageFileInterface
     */
    private $image;

    /**
     * ImageLoadFile constructor.
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
        $this->loader();
    }

    /**
     * @return ImageFileInterface
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @throws ImagineExtensionNotAllowedException
     * @throws ImagineFileNotFoundException
     * @throws ImagineMimeTypeNotAllowedException
     * @throws ImaginePathEmptyException
     */
    private function loader()
    {
        $this->checkFileNotFount();
        $this->checkExtensionAllowed();
        $this->checkMimeTypeAllowed();

        $realpath = realpath($this->path);
        $filename = pathinfo($realpath, PATHINFO_FILENAME);
        $extension = pathinfo($realpath, PATHINFO_EXTENSION);
        $mime = mime_content_type($realpath);
        list($width, $height) = getimagesize($realpath);

        $this->image = new ImageFile($filename, $extension, $realpath, $mime, $width, $height);
    }

    /**
     * @throws ImagineFileNotFoundException
     * @throws ImaginePathEmptyException
     */
    private function checkFileNotFount()
    {
        if (empty($this->path)) {
            throw new ImaginePathEmptyException('File path can not be empty');
        }

        if (!realpath($this->path)) {
            throw new ImagineFileNotFoundException('File not found');
        }
    }

    /**
     * @param $realpath
     * @throws ImagineExtensionNotAllowedException
     */
    private function checkExtensionAllowed()
    {
        $extension = pathinfo(realpath($this->path), PATHINFO_EXTENSION);

        $allowed = [
            self::EXTENSION_JPE,
            self::EXTENSION_JPEG,
            self::EXTENSION_JPG,
            self::EXTENSION_JFIF,
            self::EXTENSION_PNG,
            self::EXTENSION_XPNG,
        ];

        if (!in_array($extension, $allowed)) {
            throw new ImagineExtensionNotAllowedException(sprintf('File extension %s not allowed', $extension));
        }
    }

    /**
     * @param $realpath
     * @throws ImagineMimeTypeNotAllowedException
     */
    private function checkMimeTypeAllowed()
    {
        $mime = mime_content_type($this->path);

        $allowed = [
            self::MIME_TYPE_JPEG,
            self::MIME_TYPE_PNG,
        ];

        if (!in_array($mime, $allowed)) {
            throw new ImagineMimeTypeNotAllowedException(sprintf('Mime Type "%s" not allowed', $mime));
        }
    }
}

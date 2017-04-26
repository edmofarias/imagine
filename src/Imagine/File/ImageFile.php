<?php

namespace Imagine\File;

/**
 * Class ImageFile
 * @package Imagine\File
 */
class ImageFile implements ImageFileInterface
{
    /**
     * File name
     *
     * @var string
     */
    private $filename;

    /**
     * File extension
     *
     * @var string
     */
    private $extension;

    /**
     * File realpath
     *
     * @var string
     */
    private $path;

    /**
     * File mimeType
     *
     * @var string
     */
    private $mime;

    /**
     * Image width
     * 
     * @var string
     */
    private $width;

    /**
     * Image height
     *
     * @var string
     */
    private $height;

    /**
     * ImageFile constructor.
     *
     * @param string $filename
     * @param string $extension
     * @param string $path
     * @param string $mime
     * @param string $width
     * @param string $height
     */
    public function __construct(
        string $filename,
        string $extension,
        string $path,
        string $mime,
        string $width,
        string $height
    ) {
        $this->filename = $filename;
        $this->extension = $extension;
        $this->path = $path;
        $this->mime = $mime;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getMime()
    {
        return $this->mime;
    }

    /**
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }
}

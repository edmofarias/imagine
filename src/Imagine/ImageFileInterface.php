<?php

namespace Imagine;
use Imagine\Resource\ImageResourceInterface;

/**
 * Interface ImageFileInterface
 * @package Imagine
 */
interface ImageFileInterface
{
    /**
     * @param string $path
     */
    public function setPath($path);

    /**
     * @return string
     */
    public function getPath();

    /**
     * @param string $realpath
     */
    public function setRealpath($realpath);

    /**
     * @return string
     */
    public function getRealpath();

    /**
     * @param string $filename
     */
    public function setFilename($filename);

    /**
     * @return string
     */
    public function getFilename();

    /**
     * @param int $width
     */
    public function setWidth($width);

    /**
     * @return int
     */
    public function getWidth();

    /**
     * @param int $height
     */
    public function setHeight($height);

    /**
     * @return int
     */
    public function getHeight();

    /**
     * @param string $mimeType
     */
    public function setMimeType($mimeType);

    /**
     * @return string
     */
    public function getMimeType();

    /**
     * @param string $extension
     */
    public function setExtension($extension);

    /**
     * @return string
     */
    public function getExtension();

    /**
     * @return ImageResourceInterface $resource
     */
    public function setResource($resource);

    /**
     * @return ImageResourceInterface
     */
    public function getResource();
}

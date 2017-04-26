<?php

namespace Imagine\File;

/**
 * Interface ImageFileInterface
 * @package Imagine\File
 */
interface ImageFileInterface
{
    /**
     * File name
     *
     * @return string
     */
    public function getFilename();

    /**
     * File extension
     *
     * @return string
     */
    public function getExtension();

    /**
     * File realpath
     *
     * @return string
     */
    public function getPath();

    /**
     * File mimeType
     *
     * @return string
     */
    public function getMime();

    /**
     * Image width
     *
     * @return string
     */
    public function getWidth();

    /**
     * Image height
     *
     * @return string
     */
    public function getHeight();
}

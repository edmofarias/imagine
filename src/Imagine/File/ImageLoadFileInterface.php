<?php

namespace Imagine\File;

/**
 * Interface ImageLoadFileInterface
 * @package Imagine\File
 */
interface ImageLoadFileInterface
{
    /**
     * Extension JPEG .jpe
     */
    const EXTENSION_JPE = 'jpe';

    /**
     * Extension JPEG .jpeg
     */
    const EXTENSION_JPEG = 'jpeg';

    /**
     * Extension JPEG .jpg
     */
    const EXTENSION_JPG = 'jpg';

    /**
     * Extension JPEG .jfif
     */
    const EXTENSION_JFIF = 'jfif';

    /**
     * Mime Type JPEG (.jpe, .jpeg, .jpg, .jfif)
     */
    const MIME_TYPE_JPEG = 'image/jpeg';
    
    /**
     * @return ImageFileInterface
     */
    public function getImage();
}

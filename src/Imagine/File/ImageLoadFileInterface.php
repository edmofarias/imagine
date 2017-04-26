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
     * Extension PNG .png
     */
    const EXTENSION_PNG = 'png';

    /**
     * Extension PNG .x-png
     */
    const EXTENSION_XPNG = 'x-png';

    /**
     * Mime Type JPEG (.jpe, .jpeg, .jpg, .jfif)
     */
    const MIME_TYPE_JPEG = 'image/jpeg';

    /**
     * Mime Type PNG (.png, .x-png)
     */
    const MIME_TYPE_PNG = 'image/png';

    /**
     * @return ImageFileInterface
     */
    public function getImage();
}

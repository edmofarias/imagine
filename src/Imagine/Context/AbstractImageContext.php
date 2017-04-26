<?php

namespace Imagine\Context;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class AbstractImageContext
 * @package Imagine\Context
 */
abstract class AbstractImageContext
{
    /**
     * @param $image
     * @param $filename
     * @param $mimeType
     * @param bool $download
     *
     * @return Response
     */
    protected function response($image, $filename, $mime)
    {
        $headers = [
            'Content-Type' => $mime,
            'Content-Disposition' => sprintf('%s; filename="%s"', 'inline', $filename)
        ];

        return new Response($image, 200, $headers);
    }
}

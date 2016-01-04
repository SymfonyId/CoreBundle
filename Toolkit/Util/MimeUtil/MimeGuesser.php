<?php

namespace Symfonian\Indonesia\CoreBundle\Toolkit\Util\MimeUtil;

final class MimeGuesser
{
    private static $mimeMapping = array(
        'image/png' => 'png',
        'image/jpg' => 'jpg',
        'image/jpeg' => 'jpg',
        'image/gif' => 'gif',
        'video/mp4'  => 'mp4',
        'application/ogg'  => 'ogv',
    );

    /**
     * @param $mime
     * @return string
     */
    public static function getExtension($mime)
    {
        if (in_array($mime, array_keys(self::$mimeMapping))) {
            return self::$mimeMapping[$mime];
        }
    }

    /**
     * @param $filePath
     * @return array
     */
    public static function getMimeType($filePath)
    {
        $mime = finfo_buffer(finfo_open(), $filePath, FILEINFO_MIME_TYPE);

        return self::normalizeMime($mime);
    }

    /**
     * @param $mime
     * @return array
     */
    public static function normalizeMime($mime)
    {
        $exploded = explode('/', $mime);

        return array(
            'type' => $exploded[0],
            'encode' => $exploded[1],
            'mime' => $mime,
        );
    }
}
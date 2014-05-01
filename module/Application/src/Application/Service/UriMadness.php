<?php

namespace Application\Service;


class UriMadness implements UriMadnessInterface {

    public static $ext = array(
        'asp',
        'html',
        'png',
        'zip',
        'pdf',
        'jpg',
        'rar',
        'exe',
        'wmv',
        'doc',
        'avi',
        'ppt',
        'mpg',
        'tif',
        'wav',
        'mov',
        'psd',
        'wma',
        'gif',
    );

    private static $ext_len;

    /**
     * @return string
     */
    public function getRandomExtension() {
        if(!isset(self::$ext_len)) {
            self::$ext_len = count(self::$ext);
        }

        return self::$ext[rand(0, self::$ext_len - 1)];
    }

} 
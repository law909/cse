<?php

namespace cse;

class store
{

    private static $router;

    public static function getRouter()
    {
        if (is_null(self::$router)) {
            self::$router = new \AltoRouter();
        }
        return self::$router;
    }

    public static function writelog($text, $fname = 'log.txt')
    {
        $handle = fopen('storage/logs/' . ($fname), "a");
        $log = "";
        $separator = " ## ";
        $log .= date('Y.m.d. H:i:s') . $separator;
        $log .= $text;
        $log .= "\n";
        fwrite($handle, $log);
        fclose($handle);
    }

}
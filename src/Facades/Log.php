<?php


class Log
{
    protected static $logger;

    public static function setLogger(Logger $logger)
    {
        static::$logger = $logger;
    }

    static public function info($message)
    {
        static::$logger->info($message);
    }
}
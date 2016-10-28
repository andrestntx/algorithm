<?php

class Random
{
    static $characters;

    /**
     * Count all possible characters to random
     * @return int
     */
    static function getLength()
    {
        return strlen(self::$characters);
    }

    /**
     * Generate a new Character Random
     * @param int $change
     * @param null $default
     * @return mixed
     */
    public static function generateCharacter($change = 100, $default = null)
    {
        if(rand(0,100) <= $change) {
            return self::$characters[rand(0, self::getLength() - 1)];
        }

        return $default;
    }

    /**
     * Generate a new String Random
     * @param $length
     * @param int|null $chance
     * @return string
     */
    public static function generate($length, $chance = 100)
    {
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= self::generateCharacter($chance);
        }
        return $randomString;
    }

    /**
     * @param $characters
     */
    public static function setCharacters($characters)
    {
        static::$characters = $characters;
    }
}
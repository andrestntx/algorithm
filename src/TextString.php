<?php


class TextString
{
    protected $value;

    /**
     * TextString constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param $chance
     */
    public function autoUpdate($chance = 100)
    {
        foreach($this->getCharacters() as $key => $character) {
            $this->updateCharacter($key, Random::generateCharacter($chance, $character));
        }
    }

    /**
     * Create a new Random TextString
     * @param $length
     * @return static
     */
    public static function createRandom($length)
    {
        return new static(Random::generate($length));
    }

    /**
     * Get the specific character of TextString
     * @param $key
     * @return mixed
     */
    public function getCharacter($key)
    {
        if(array_key_exists($key, $this->getCharacters())) {
            return $this->getCharacters()[$key];
        }
    }

    /**
     * Get all characters of TextString
     * @return array
     */
    public function getCharacters()
    {
        return str_split($this->value);
    }

    /**
     * Count characters in TextString
     * @return int
     */
    public function getLength()
    {
        return strlen($this->value);
    }

    /**
     * Get the value of TextString
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Update the specific character in the TextString
     * @param $key
     * @param $val
     */
    public function updateCharacter($key, $val)
    {
        $characters = $this->getCharacters();
        $characters[$key] = $val;
        $this->setValue($characters);
    }

    /**
     * Set a new value to TextString
     * @param $value
     */
    public function setValue($value)
    {
        if(is_array($value)) {
            $value = implode("", $value);
        }

        $this->value = $value;
    }
}
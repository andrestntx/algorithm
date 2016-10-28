<?php


class Comparator
{
    protected $stringBase;
    protected $string;
    protected $points;

    /**
     * Comparator constructor.
     * @param $stringBase
     * @param $string
     */
    public function __construct(TextString $stringBase, TextString $string)
    {
        $this->stringBase = $stringBase;
        $this->string = $string;
        $this->compare();
    }

    /**
     * @param int $chance
     */
    public function autoUpdateString($chance = 100)
    {
        $this->string->autoUpdate($chance);
        $this->compare();
    }

    /**
     * Get the points of TextString compare
     * @return int
     */
    protected function compare()
    {
        $this->points = 0;

        foreach($this->stringBase->getCharacters() as $key => $characterBase) {
            if($characterBase == $this->string->getCharacter($key)) {
                $this->points ++;
            }
        }

        return $this->points;
    }

    /**
     * @return int
     */
    public function getPoints()
    {
        if(is_null($this->points)) {
            return $this->compare();
        }

        return $this->points;
    }

    /**
     * @return TextString
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * @return TextString
     */
    public function getStringBase()
    {
        return $this->stringBase;
    }

    /**
     * @param TextString $string
     */
    public function setString(TextString $string)
    {
        $this->string = $string;
        $this->compare();
    }
}
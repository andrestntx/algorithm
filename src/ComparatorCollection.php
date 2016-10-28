<?php


class ComparatorCollection extends Collection
{
    protected $stringBase;
    protected $maxComparator;

    /**
     * ComparatorCollection constructor.
     * @param TextString $stringBase
     * @param Collection $stringCollection
     */
    public function __construct(TextString $stringBase, Collection $stringCollection)
    {
        $this->stringBase = $stringBase;
        parent::__construct();

        foreach($stringCollection->all() as $string) {
            $this->push(new Comparator($stringBase, clone $string));
        }
    }


    /**
     * @param int $chance
     * @return $this
     */
    public function autoUpdateStrings($chance)
    {
        foreach($this->items as $comparator) {
            $comparator->autoUpdateString($chance);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStringBase()
    {
        return $this->stringBase;
    }

    /**
     * Get the max value of comparatorCollection.
     *
     * @return mixed
     */
    protected function maxCompare()
    {
        if(! $this->isEmpty()) {

            if(is_null($this->maxComparator)) {
                $this->maxComparator = $this->first();
            }

            foreach($this->items as $comparator) {
                if($comparator->getPoints() > $this->maxComparator->getPoints()) {
                    $this->maxComparator = $comparator;
                }
            }

            return $this->maxComparator;
        }
    }

    /**
     * @return mixed
     */
    public function getMaxComparator()
    {
        if(is_null($this->maxComparator)) {
            return $this->maxCompare();
        }

        return $this->maxComparator;
    }

    /**
     * Get the TextString with max value of comparatorCollection
     * @return mixed
     */
    public function maxStringCompare()
    {
        if($comparator = $this->getMaxComparator()) {
            return $comparator->getString();
        }
    }

    /**
     * Update all TextString of Collection with a new value
     * @param TextString $string
     * @return $this
     */
    public function updateStringCollection(TextString $string)
    {
        foreach($this->items as $comparator) {
            $comparator->setString(clone $string);
        }

        return $this;
    }

    /**
     * Update all TextString of Collection with the maxStringCompare
     * @return $this
     */
    public function updateStringsMaxCompare()
    {
        return $this->updateStringCollection($this->maxStringCompare());
    }


}
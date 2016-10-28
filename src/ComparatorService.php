<?php


class ComparatorService
{
    protected $chance;
    protected $maxComparator;

    /**
     * ComparatorService constructor.
     * @param $chance
     */
    public function __construct($chance)
    {
        $this->chance = $chance;
    }

    /**
     * @param ComparatorCollection $comparatorCollection
     * @return mixed
     */
    protected function recursiveCompare(ComparatorCollection $comparatorCollection)
    {
        $maxComparator = $comparatorCollection->getMaxComparator();
        Log::info("The max compare is " . $maxComparator->getString()->getValue() . " with " . $maxComparator->getPoints() . " points");

        if($maxComparator->getPoints() < $comparatorCollection->getStringBase()->getLength()) {
            $comparatorCollection->autoUpdateStrings($this->chance);
            $this->recursiveCompare($comparatorCollection->updateStringsMaxCompare());
        }

        $this->maxComparator = $maxComparator;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getMaxComparator()
    {
        return $this->maxComparator;
    }


    /**
     * @param int $chance
     * @param TextString $stringBase
     * @param int $copies
     * @return mixed
     */
    public static function compare($chance, TextString $stringBase, $copies = 1)
    {
        $service  = new static($chance);

        $comparatorCollection = new ComparatorCollection($stringBase, Collection::make(
            TextString::createRandom($stringBase->getLength()),
            $copies
        ));

        return $service->recursiveCompare($comparatorCollection);
    }
}
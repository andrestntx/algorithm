<?php


class Collection
{
    /**
     * The items contained in the collection.
     *
     * @var array
     */
    protected $items = [];

    /**
     * Collection constructor.
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * Create a new Collection with N copies of a item
     * @param $item
     * @param int $copies
     * @return static
     */
    public static function make($item, $copies = 1)
    {
        $items = [];

        for($i = 0; $i < $copies; $i++) {
            $newItem = $item;
            array_push($items, $newItem);
        }

        return new static($items);
    }

    /**
     * Get all items in the collection.
     *
     * @return array
     */
    public function all()
    {
        return $this->items;
    }

    /**
     * Push an item onto the end of the collection.
     *
     * @param  mixed  $value
     * @return $this
     */
    public function push($value)
    {
        $this->offsetSet(null, $value);
        return $this;
    }

    /**
     * Set the item at a given offset.
     *
     * @param  mixed  $key
     * @param  mixed  $value
     * @return void
     */
    public function offsetSet($key, $value)
    {
        if (is_null($key)) {
            $this->items[] = $value;
        } else {
            $this->items[$key] = $value;
        }
    }

    /**
     * Return true if Collection is empty
     * @return bool
     */
    public function isEmpty()
    {
        return $this->count() == 0;
    }

    /**
     * Get the number elements of Collection
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * Get the first element of Collection
     * @return mixed
     */
    public function first()
    {
        if(! $this->isEmpty()) {
            return $this->items[0];
        }
    }


}
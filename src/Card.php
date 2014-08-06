<?php

/**
 * @property-read string $suite
 * @property-read string $type
 */
class Card {

    private $suite;
    private $type;

    public function __get($key)
    {
        return $this->$key;
    }

    public function __construct($type, $suite)
    {
        $this->type = $type;
        $this->suite = $suite;
    }
}

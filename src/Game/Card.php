<?php

namespace Game;

/**
 * @property-read string $suite
 * @property-read string $type
 */
class Card {

    private $suite;
    private $type;

    public function getSuite()
    {
        return $this->suite;
    }

    public function getType()
    {
        return $this->type;
    }

    public function __construct($type, $suite)
    {
        $this->type = $type;
        $this->suite = $suite;
    }
}

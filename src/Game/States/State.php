<?php

namespace Game\States;

use Game\Game;

/**
 * @property Game $game
 */
class State
{
    protected $game;

    public function __construct(&$game)
    {
        $this->game =& $game;
    }

    public function startTurn()
    {
        echo "you can't do that\n";
    }

    public function attack($cardNumber)
    {
        echo "you can't do that: attack\n";
    }

    public function defend($cardNumber)
    {
        echo "you can't do that: defend\n";
    }

    public function endTurn()
    {
        echo "you can't do that\n";
    }

    public function endGame()
    {
        echo "you can't do that\n";
    }

}

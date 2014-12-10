<?php

namespace Game\States;

use Game\Game;

class StateReady extends State
{
    public function startTurn()
    {
        echo "Turn started. Player: №" . $this->game->currentPlayer . "\n";
        $this->game->attackPlayer = $this->game->currentPlayer;
        $this->game->defendPlayer = $this->game->getNextPlayer();
        $this->game->setState(Game::STATE_WAIT_FOR_ATTACK);
    }
}

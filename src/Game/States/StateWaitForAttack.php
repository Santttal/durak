<?php

namespace Game\States;

use Game\CardsPair;
use Game\Game;

class StateWaitForAttack extends State
{
    public function attack($cardNumber)
    {
        echo
            "Attack with card '" . $this->game->playersCards[$this->game->attackPlayer][$cardNumber]->getSuite() . " " .
            $this->game->playersCards[$this->game->attackPlayer][$cardNumber]->getType() . "'\n";
        $this->game->cardsOnTheTable[] = new CardsPair($this->game->playersCards[$this->game->attackPlayer][$cardNumber]);
        array_splice($this->game->playersCards[$this->game->attackPlayer], $cardNumber, 1);

        $this->game->setState(Game::STATE_WAIT_FOR_DEFEND);
    }

    public function endTurn()
    {
        if (!count($this->game->cardsOnTheTable)) {
            echo "Can't end turn. No cards on the table\n";
        } else {
            unset($this->cardsOnTheTable);
            $this->game->currentPlayer = $this->game->getNextPlayer();
            echo "Turn ended. Next player: №".$this->game->currentPlayer."\n";
            $this->game->setState(Game::STATE_READY);
        }

    }
}

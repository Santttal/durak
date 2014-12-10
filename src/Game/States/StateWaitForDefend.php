<?php

namespace Game\States;

use Game\Game;

class StateWaitForDefend extends State
{
    public function defend($cardNumber)
    {
        $attackCard = $this->game->getUnBeatedCard();
        $defendCard = $this->game->playersCards[$this->game->defendPlayer][$cardNumber];

        if ($this->game->canBeat($attackCard, $defendCard)) {
            $lastCardsPair = $this->game->cardsOnTheTable[count($this->game->cardsOnTheTable) - 1];
            $lastCardsPair->setDefendCard($defendCard);
            $this->game->cardsOnTheTable[count($this->game->cardsOnTheTable) - 1] = $lastCardsPair;
            $this->game->setState(Game::STATE_WAIT_FOR_ATTACK);
        } else {
            echo "can't beat try another card";
        }

    }
}

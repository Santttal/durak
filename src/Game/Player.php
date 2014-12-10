<?php

namespace Game;

class Player
{

    public $cards;

    /**
     * @param Card $card
     */
    public function addCard(Card $card)
    {
        $this->cards[] = $card;
    }

    /**
     * @param $number
     * @return Card
     */
    public function getCard($number)
    {
        return $this->cards[$number];
    }

    /**
     * @return int
     */
    public function getCardsCount()
    {
        return count($this->cards);
    }



}

<?php

class Game
{
    const PLAYER_CARDS_NUMBER = 6;

    private $cardTypes;
    private $suites;

    private $cards = array();
    private $playersCards = array();
    private $cardsOnTheTable = array();
    private $playersNumber;
    public $currentPlayer = 0;
    private $nextCardInPack = 0;
    public $trump; //козырь

    public function __construct($playersNumber)
    {
        $this->playersNumber = $playersNumber;
        $this->cardTypes = DurakConfig::getCardTypes();
        $this->suites = DurakConfig::getCardSuites();
        $this->createCards();
        $this->dealCards();
    }

    public function getPlayerCards($playerNumber)
    {
        return $this->playersCards[$playerNumber];
    }

    public function getCurrentPlayer()
    {
        return $this->currentPlayer;
    }

    private function dealCards()
    {
        for ($j = 0; $j < $this->playersNumber; $j++) {
            for ($i = 0; $i < self::PLAYER_CARDS_NUMBER; $i++) {
                $this->playersCards[$j][$i] = $this->cards[$this->nextCardInPack++];
            }
        }
        $this->trump = $this->cards[$this->nextCardInPack++];
    }

    public function makeAttack($cardNumber)
    {
        $this->cardsOnTheTable[] = array(
            'attack' => $this->playersCards[$this->currentPlayer][$cardNumber],
            'beat' => '',
        );
        array_splice($this->playersCards[$this->currentPlayer], $cardNumber, 1);
    }

    public function beatAttack()
    {

    }

    public function takeCards()
    {
        foreach ($this->cardsOnTheTable as $cardsPair) {
            $this->playersCards[$this->getNextPlayer()][] = $cardsPair['attack'];
            if ($cardsPair['beat']) {
                $this->playersCards[$this->getNextPlayer()][] = $cardsPair['beat'];
            }
        }
        $this->currentPlayer = $this->getNextPlayer();
    }

    /**
     * @param Card $attackCard
     * @param Card $defendCard
     */
    public function canBeat($attackCard, $defendCard)
    {
        $canBeat = false;

        if ($attackCard->suite == $defendCard->suite) {

        } else {

        }


        if ($attackCard->suite == $this->trump->suite && $defendCard->suite == $this->trump->suite) {

        } elseif ($attackCard->suite == $this->trump->suite && $defendCard->suite != $this->trump->suite) {
            $canBeat = false;
        } elseif ($attackCard->suite != $this->trump->suite && $defendCard->suite == $this->trump->suite) {
            $canBeat = true;
        } else {
            if (
                ($attackCard->suite == $defendCard->suite)
                && array_search($attackCard->type, $this->cardTypes) <
                   array_search($defendCard->type, $this->cardTypes)
            ) {
                $canBeat = true;
            }
        }
    }

    function finishStep()
    {
        unset($this->cardsOnTheTable);
        $this->currentPlayer = $this->getNextPlayer();
    }

    //private function isCard

    private function getNextPlayer()
    {
        return $this->currentPlayer + 1 <> $this->playersNumber ? $this->currentPlayer + 1 : 0;
    }

    private function createCards()
    {
//        foreach ($this->cardTypes as $cardType) {
//            foreach ($this->suites as $suite) {
//                $this->cards[] = array(
//                    'type' => $cardType,
//                    'suite' => $suite,
//                );
//            }
//        }
//        shuffle($this->cards);
//        var_export($this->cards);
        $this->cards = array(
            new Card('T', 'clubs'),
            new Card('9', 'hearts'),
            new Card('8', 'diamonds'),
            new Card('3', 'spades'),
            new Card('4', 'hearts'),
            new Card('4', 'diamonds'),
            new Card('6', 'clubs'),
            new Card('7', 'diamonds'),
            new Card('V', 'spades'),
            new Card('6', 'diamonds'),
            new Card('K', 'diamonds'),
            new Card('3', 'diamonds'),
            new Card('T', 'diamonds'),
            new Card('D', 'spades'),
            new Card('5', 'spades'),
            new Card('K', 'spades'),
            new Card('V', 'diamonds'),
            new Card('T', 'hearts'),
            new Card('3', 'hearts'),
            new Card('K', 'clubs'),
            new Card('8', 'clubs'),
            new Card('9', 'diamonds'),
            new Card('6', 'spades'),
            new Card('7', 'clubs'),
            new Card('2', 'spades'),
            new Card('7', 'hearts'),
            new Card('2', 'clubs'),
            new Card('7', 'spades'),
            new Card('D', 'clubs'),
            new Card('2', 'hearts'),
            new Card('V', 'clubs'),
            new Card('3', 'clubs'),
            new Card('D', 'hearts'),
            new Card('T', 'spades'),
            new Card('8', 'spades'),
            new Card('9', 'clubs'),
            new Card('5', 'diamonds'),
            new Card('4', 'spades'),
            new Card('K', 'hearts'),
            new Card('9', 'spades'),
            new Card('D', 'diamonds'),
            new Card('4', 'clubs'),
            new Card('5', 'clubs'),
            new Card('5', 'hearts'),
            new Card('8', 'hearts'),
            new Card('2', 'diamonds'),
            new Card('6', 'hearts'),
            new Card('V', 'hearts'),
        );
    }

}

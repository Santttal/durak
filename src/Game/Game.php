<?php

namespace Game;

use Game\States\State;
use Game\States\StateFinished;
use Game\States\StateReady;
use Game\States\StateWaitForAttack;
use Game\States\StateWaitForDefend;

/**
 * @property State $state
 * @property Card $trump
 * @property CardsPair[] $cardsOnTheTable
 */
class Game
{
    const PLAYER_CARDS_NUMBER = 6;

    const STATE_READY = 1;
    const STATE_WAIT_FOR_ATTACK = 2;
    const STATE_WAIT_FOR_DEFEND = 3;
    const STATE_GAME_FINISHED = 4;

    private $cardTypes;
    private $suites;

    private $cards = array();
    public $playersCards = array();
    public $cardsOnTheTable = array();
    public $playersNumber;
    public $currentPlayer = 0;
    public $attackPlayer = 0;
    public $defendPlayer = 0;
    private $nextCardInPack = 0;
    public $trump; //козырь

    private $state;

    public function __construct($playersNumber)
    {
        $this->playersNumber = $playersNumber;
        $this->cardTypes = DurakConfig::getCardTypes();
        $this->suites = DurakConfig::getCardSuites();
        $this->createCards();
        $this->dealCards();
        $this->setState(Game::STATE_READY);
    }

    public function getPlayerCards($playerNumber)
    {
        return $this->playersCards[$playerNumber];
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

    public function getUnBeatedCard()
    {
        $card = null;
        $lastCardsPair = $this->cardsOnTheTable[count($this->cardsOnTheTable) - 1];
        if (!$lastCardsPair->isBeated()) {
            $card = $lastCardsPair->getAttackCard();
        }

        return $card;
    }

    public function startTurn()
    {
        $this->state->startTurn();
    }

    public function attack($cardNumber)
    {
        $this->state->attack($cardNumber);
    }

    public function defend($cardNumber)
    {
        $this->state->defend($cardNumber);
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
     * @return bool
     */
    public function canBeat($attackCard, $defendCard)
    {
        $canBeat = false;

        if (CardPriority::isFirstCardHigher($defendCard, $attackCard, $this->trump->getSuite())) {
            $canBeat = true;
        }

        return $canBeat;
    }

    public function setState($state)
    {
        if ($state == Game::STATE_READY) {
            $this->state = new StateReady($this);
        } elseif ($state == Game::STATE_WAIT_FOR_ATTACK) {
            $this->state = new StateWaitForAttack($this);
        } elseif ($state == Game::STATE_WAIT_FOR_DEFEND) {
            $this->state = new StateWaitForDefend($this);
        } elseif ($state == Game::STATE_GAME_FINISHED) {
            $this->state = new StateFinished($this);
        }
    }

    public function endTurn()
    {
        $this->state->endTurn();
    }

    //private function isCard

    public function getNextPlayer()
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

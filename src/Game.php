<?php

class Game
{
    const PLAYER_CARDS_NUMBER = 6;

    private $cardTypes = array(
        '2', '3', '4', '5', '6', '7',
        '8', '9', 'V', 'D', 'K', 'T',
    );

    private $suites = array(
        "spades", //пики
        "hearts", //черви
        "clubs", //крести
        "diamonds", //бубны
    );

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

    public function canBeat($attackCard, $defendCard)
    {
        $canBeat = false;
        if ($attackCard['suite'] == $this->trump['suite'] && $defendCard['suite'] == $this->trump['suite']) {

        } elseif ($attackCard['suite'] == $this->trump['suite'] && $defendCard['suite'] != $this->trump['suite']) {
            $canBeat = false;
        } elseif ($attackCard['suite'] != $this->trump['suite'] && $defendCard['suite'] == $this->trump['suite']) {
            $canBeat = true;
        } else {
            if (
                ($attackCard['suite'] == $defendCard['suite'])
                && array_search($attackCard['type'], $this->cardTypes) <
                   array_search($defendCard['type'], $this->cardTypes)
            ) {
                $canBeat = true;
            }
        }
    }
}

return $canBeat;
}

public
function finishStep()
{
    unset($this->cardsOnTheTable);
    $this->currentPlayer = $this->getNextPlayer();
}

private
function getNextPlayer()
{
    return $this->currentPlayer + 1 <> $this->playersNumber ? $this->currentPlayer + 1 : 0;
}

private
function createCards()
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
        array(
            'type' => 'T',
            'suite' => 'clubs',
        ),
        array(
            'type' => '9',
            'suite' => 'hearts',
        ),
        array(
            'type' => '8',
            'suite' => 'diamonds',
        ),
        array(
            'type' => '3',
            'suite' => 'spades',
        ),
        array(
            'type' => '4',
            'suite' => 'hearts',
        ),
        array(
            'type' => '4',
            'suite' => 'diamonds',
        ),
        array(
            'type' => '6',
            'suite' => 'clubs',
        ),
        array(
            'type' => '7',
            'suite' => 'diamonds',
        ),
        array(
            'type' => 'V',
            'suite' => 'spades',
        ),
        array(
            'type' => '6',
            'suite' => 'diamonds',
        ),
        array(
            'type' => 'K',
            'suite' => 'diamonds',
        ),
        array(
            'type' => '3',
            'suite' => 'diamonds',
        ),
        array(
            'type' => 'T',
            'suite' => 'diamonds',
        ),
        array(
            'type' => 'D',
            'suite' => 'spades',
        ),
        array(
            'type' => '5',
            'suite' => 'spades',
        ),
        array(
            'type' => 'K',
            'suite' => 'spades',
        ),
        array(
            'type' => 'V',
            'suite' => 'diamonds',
        ),
        array(
            'type' => 'T',
            'suite' => 'hearts',
        ),
        array(
            'type' => '3',
            'suite' => 'hearts',
        ),
        array(
            'type' => 'K',
            'suite' => 'clubs',
        ),
        array(
            'type' => '8',
            'suite' => 'clubs',
        ),
        array(
            'type' => '9',
            'suite' => 'diamonds',
        ),
        array(
            'type' => '6',
            'suite' => 'spades',
        ),
        array(
            'type' => '7',
            'suite' => 'clubs',
        ),
        array(
            'type' => '2',
            'suite' => 'spades',
        ),
        array(
            'type' => '7',
            'suite' => 'hearts',
        ),
        array(
            'type' => '2',
            'suite' => 'clubs',
        ),
        array(
            'type' => '7',
            'suite' => 'spades',
        ),
        array(
            'type' => 'D',
            'suite' => 'clubs',
        ),
        array(
            'type' => '2',
            'suite' => 'hearts',
        ),
        array(
            'type' => 'V',
            'suite' => 'clubs',
        ),
        array(
            'type' => '3',
            'suite' => 'clubs',
        ),
        array(
            'type' => 'D',
            'suite' => 'hearts',
        ),
        array(
            'type' => 'T',
            'suite' => 'spades',
        ),
        array(
            'type' => '8',
            'suite' => 'spades',
        ),
        array(
            'type' => '9',
            'suite' => 'clubs',
        ),
        array(
            'type' => '5',
            'suite' => 'diamonds',
        ),
        array(
            'type' => '4',
            'suite' => 'spades',
        ),
        array(
            'type' => 'K',
            'suite' => 'hearts',
        ),
        array(
            'type' => '9',
            'suite' => 'spades',
        ),
        array(
            'type' => 'D',
            'suite' => 'diamonds',
        ),
        array(
            'type' => '4',
            'suite' => 'clubs',
        ),
        array(
            'type' => '5',
            'suite' => 'clubs',
        ),
        array(
            'type' => '5',
            'suite' => 'hearts',
        ),
        array(
            'type' => '8',
            'suite' => 'hearts',
        ),
        array(
            'type' => '2',
            'suite' => 'diamonds',
        ),
        array(
            'type' => '6',
            'suite' => 'hearts',
        ),
        array(
            'type' => 'V',
            'suite' => 'hearts',
        ),
    );
}

}

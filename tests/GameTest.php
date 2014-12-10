<?php

class GameTest extends PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        require_once "../../vendor/autoload.php";
        $this->game = new Game(2);
    }

    /**
     * @var Game $game
     */
    private $game;

    /**
     * @test
     */
    public function dealCards()
    {
        $player_0_cards = array(
            new Card('T', 'clubs'),
            new Card('9', 'hearts'),
            new Card('8', 'diamonds'),
            new Card('3', 'spades'),
            new Card('4', 'hearts'),
            new Card('4', 'diamonds'),
        );
        $this->game->getPlayerCards(1);
        $this->assertEquals($this->game->getPlayerCards(0), $player_0_cards);
        $this->assertEquals($this->game->trump, new Card('T','diamonds'));
    }

    /**
     * @test
     */
    public function makeAttackAndCantBeat_thirdCard()
    {
        $player_0_cards = array(
            new Card('T', 'clubs'),
            new Card('9', 'hearts'),
            new Card('8', 'diamonds'),
            new Card('4', 'hearts'),
            new Card('4', 'diamonds'),
        );

        $player_1_cards = array(
            new Card('6', 'clubs'),
            new Card('7', 'diamonds'),
            new Card('V', 'spades'),
            new Card('6', 'diamonds'),
            new Card('K', 'diamonds'),
            new Card('3', 'diamonds'),
            new Card('3', 'spades'),
        );

        $this->game->makeAttack(3);
        $this->game->takeCards();
        $this->game->finishStep();

        $this->assertEquals($this->game->getPlayerCards(0), $player_0_cards);
        $this->assertEquals($this->game->getPlayerCards(1), $player_1_cards);
        $this->assertEquals($this->game->currentPlayer, 0);
    }

}

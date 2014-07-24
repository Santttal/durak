<?php

class GameTest extends PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
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
            array('type' => 'T', 'suite' => 'clubs'),
            array('type' => '9', 'suite' => 'hearts'),
            array('type' => '8', 'suite' => 'diamonds'),
            array('type' => '3', 'suite' => 'spades'),
            array('type' => '4', 'suite' => 'hearts'),
            array('type' => '4', 'suite' => 'diamonds'),
        );
        $this->game->getPlayerCards(1);
        $this->assertEquals($this->game->getPlayerCards(0), $player_0_cards);
        $this->assertEquals($this->game->trump, array(
            'type' => 'T',
            'suite' => 'diamonds',
        ));
    }

    /**
     * @test
     */
    public function makeAttackAndCantBeat_thirdCard()
    {
        $player_0_cards = array(
            array('type' => 'T', 'suite' => 'clubs'),
            array('type' => '9', 'suite' => 'hearts'),
            array('type' => '8', 'suite' => 'diamonds'),
            array('type' => '4', 'suite' => 'hearts'),
            array('type' => '4', 'suite' => 'diamonds',
            )
        );

        $player_1_cards = array(
            array('type' => '6', 'suite' => 'clubs'),
            array('type' => '7', 'suite' => 'diamonds'),
            array('type' => 'V', 'suite' => 'spades'),
            array('type' => '6', 'suite' => 'diamonds'),
            array('type' => 'K', 'suite' => 'diamonds'),
            array('type' => '3', 'suite' => 'diamonds'),
            array('type' => '3', 'suite' => 'spades'),
        );

        $this->game->makeAttack(3);
        $this->game->takeCards();
        $this->game->finishStep();

        $this->assertEquals($this->game->getPlayerCards(0), $player_0_cards);
        $this->assertEquals($this->game->getPlayerCards(1), $player_1_cards);
        $this->assertEquals($this->game->getCurrentPlayer(), 0);
    }

    /**
     * @test
     */
    public function canBeat_DifferentSuitsCard_False()
    {
        $attackCard = array('type' => '2', 'suite' => 'clubs');
        $defendCard = array('type' => '2', 'suite' => 'diamonds');

        $this->assertEquals($this->game->canBeat($attackCard, $defendCard), false);

    }
    /**
     * @test
     */
    public function canBeat_SameSuiteCardSmaller_False()
    {
        $attackCard = array('type' => '3', 'suite' => 'diamonds');
        $defendCard = array('type' => '2', 'suite' => 'diamonds');

        $this->assertEquals($this->game->canBeat($attackCard, $defendCard), false);

    }
    /**
     * @test
     */
    public function canBeat_SameSuiteCardBigger_False()
    {
        $attackCard = array('type' => '2', 'suite' => 'diamonds');
        $defendCard = array('type' => '3', 'suite' => 'diamonds');

        $this->assertEquals($this->game->canBeat($attackCard, $defendCard), true);

    }

}

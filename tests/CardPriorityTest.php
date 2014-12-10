<?php

use Game\Card;
use Game\CardPriority;
use Game\Game;

class CardPriorityTest extends PHPUnit_Framework_TestCase
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
    public function isFirstCardHigher_SameSuiteFirstCardBigger_True()
    {
        $trumpStr = 'spades';
        $attackCard = new Card('3','diamonds');
        $defendCard = new Card('2','diamonds');

        $this->assertEquals(CardPriority::isFirstCardHigher($attackCard, $defendCard, $trumpStr), true);

    }

    /**
     * @test
     */
    public function isFirstCardHigher_DifferentSuitsCard_False()
    {
        $trumpStr = 'spades';
        $attackCard = new Card('2', 'clubs');
        $defendCard = new Card('2', 'diamonds');

        $this->assertEquals(CardPriority::isFirstCardHigher($attackCard, $defendCard, $trumpStr), false);

    }

    /**
     * @test
     */
    public function isFirstCardHigher_SameSuiteFirstCardSmaller_False()
    {
        $trumpStr = 'spades';
        $attackCard = new Card('2','diamonds');
        $defendCard = new Card('3','diamonds');

        $this->assertEquals(CardPriority::isFirstCardHigher($attackCard, $defendCard, $trumpStr), false);

    }

    /**
     * @test
     */
    public function isFirstCardHigher_DiffSuiteFirstCardTrump_True()
    {
        $trumpStr = 'diamonds';
        $attackCard = new Card('2','diamonds');
        $defendCard = new Card('3','spades');

        $this->assertEquals(CardPriority::isFirstCardHigher($attackCard, $defendCard, $trumpStr), true);
    }

    /**
     * @test
     */
    public function isFirstCardHigher_DiffSuiteSecondCardTrump_False()
    {
        $trumpStr = 'diamonds';
        $attackCard = new Card('2','spades');
        $defendCard = new Card('3','diamonds');

        $this->assertEquals(CardPriority::isFirstCardHigher($attackCard, $defendCard, $trumpStr), false);
    }

    /**
     * @test
     */
    public function isFirstCardHigher_BothCardTrumpsButSecondHigher_False()
    {
        $trumpStr = 'diamonds';
        $attackCard = new Card('2','diamonds');
        $defendCard = new Card('3','diamonds');

        $this->assertEquals(CardPriority::isFirstCardHigher($attackCard, $defendCard, $trumpStr), false);
    }
}

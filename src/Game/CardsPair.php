<?php

namespace Game;

/**
 * Class CardsPair
 * @property Card $attackCard
 * @property Card $defendCard
 */
class CardsPair
{
    private $attackCard;
    private $defendCard;

    /**
     * @param Card $attackCard
     */
    public function __construct($attackCard)
    {
        $this->attackCard = $attackCard;
    }

    public function getAttackCard()
    {
        return $this->attackCard;
    }

    public function getDefendCard()
    {
        return $this->defendCard;
    }

    public function setDefendCard($defendCard)
    {
        if (!$this->defendCard) {
            $this->defendCard = $defendCard;
        }
    }

    public function isBeated()
    {
        if ($this->defendCard) {
            return true;
        } else {
            return false;
        }

    }
}

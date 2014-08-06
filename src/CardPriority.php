<?php

class CardPriority
{
    /**
     * @param Card $c1
     * @param Card $c2
     */
    public static function isFirstCardHigher(Card $c1, Card $c2, $trumpStr) {
        $isFirstCardHigher = false;
        if (self::hasSameSuite($c1, $c2)) {
            $isFirstCardHigher = self::hasFirstCardHigherType($c1, $c2);
        } else {
            if (self::isCardTrump($c1, $trumpStr)) {
                $isFirstCardHigher = true;
            }
        }
        return $isFirstCardHigher;
    }

    private static function hasSameSuite(Card $c1, Card $c2)
    {
        return $c1->suite == $c2->suite;
    }

    private static function hasFirstCardHigherType(Card $c1, Card $c2)
    {
        $cardTypes = DurakConfig::getCardTypes();
        return array_search($c1->type, $cardTypes) > array_search($c2->type, $cardTypes);
    }

    /**
     * @param Card $c
     * @param $trumpStr
     * @return boolean
     */
    private static function isCardTrump(Card $c, $trumpStr)
    {
        return $c->suite == $trumpStr;
    }
}

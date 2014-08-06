<?php

class DurakConfig
{
    public static function getCardTypes()
    {
        return array(
            '2', '3', '4', '5', '6', '7',
            '8', '9', 'V', 'D', 'K', 'T',
        );
    }

    public static function getCardSuites(){
        return array(
            "spades", //пики
            "hearts", //черви
            "clubs", //крести
            "diamonds", //бубны
        );
    }
}

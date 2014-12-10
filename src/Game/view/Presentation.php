<?php

namespace Game\view;

use Game\Game;

class Presentation implements IPresentation
{
    public static function startGame()
    {
        Console::writeData('===Игра Дурак===');
        $playerCount = Console::readData('Введите кол-во игроков');
        Console::writeData('Игра начата');

        return $playerCount;
    }

    public static function leadGame(Game $g)
    {
        //ход
            // Введите карту
            // Считывание карты атакующего
            // проверка и если что повторное считывание
            // Считывание карты защищающего
            // проверка и если что повторное считывание
            // ..предложение снова ввести карту атакующего
        // следующий ход

    }
} 

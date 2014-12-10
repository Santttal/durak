<?php

namespace Game;

use Game\view\Console;
use Game\view\Presentation;

require_once "../../vendor/autoload.php";

//
//$g = new Game(2);
//
//$g->startTurn();
//$g->attack(3);
//$g->defend(2);
//$g->defend(2);
//$g->endTurn();
//$g->startTurn();
//$g->attack(2);


//echo "Nachalo igry";
//while (($line = trim(fgets(STDIN))) != 'exit') {
//    echo $line;
//}


$g = new Game(Presentation::startGame());
Presentation::leadGame($g);




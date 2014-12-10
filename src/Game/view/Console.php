<?php

namespace Game\view;

class Console
{
    public static function readData($writeLine)
    {
        echo $writeLine.": ";
        $line = trim(fgets(STDIN));
        return $line;
    }
    public static function writeData($writeLine)
    {
        echo $writeLine."\n";
    }
} 

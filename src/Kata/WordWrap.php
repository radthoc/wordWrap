<?php
namespace Kata;

/**
 * Class WordWrap
 * @package Kata
 */
class WordWrap
{
    /**
     * @param string $string
     * @param int $lineColumns
     * @return string
     */
    public static function wrap($string, $lineColumns)
    {
        if (strlen($string) <= $lineColumns)
        {
            return $string;
        }

        $line = substr($string, 0, $lineColumns);
        $spacePosition = strrpos($line, ' ');
        $line = substr_replace ($line, '\n' , $spacePosition, 1);

        return  $line.static::wrap(substr($string, $lineColumns), $lineColumns);

    }
}

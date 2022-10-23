<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Index\startGame;

function findGcd(int $firstInt, int $secondInt)
{
    $a = $firstInt;
    $b = $secondInt;
    while ($a !== $b) {
        if ($a > $b) {
            $a -= $b;
        } else {
            $b -= $a;
        }
    }
    return $a;
}

function buildGcdGame()
{
    $genGameQuestion = function () {
        $a = rand(1, 50);
        $b = rand(1, 50);
        $question = "${a} ${b}";
        $rightAnswer = (string)(findGcd($a, $b));

        return [$question, $rightAnswer];
    };
    $description = "Find the greatest common divisor of given numbers.";
    startGame($description, $genGameQuestion);
}

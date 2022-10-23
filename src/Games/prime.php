<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Index\startGame;

function isPrime($num): bool
{
    if ($num === 1) {
        return false;
    }
    for ($i = 2, $lastDividing = sqrt($num); $i <= $lastDividing; $i += 1) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function buildPrimeGame()
{
    $genGameQuestion = function () {
        $question = rand(2, 100);
        $rightAnswer = isPrime($question) ? 'yes' : 'no';

        return [$question, $rightAnswer];
    };

    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    startGame($description, $genGameQuestion);
}

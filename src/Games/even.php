<?php

namespace BrainGames\Games\Even;

use function BrainGames\Index\startGame;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
        return $number % 2 === 0;
}

function buildEvenGame()
{
    $genGameQuestion = function () {
        $question = rand(1, 100);
        $rightAnswer = isEven($question) ? "yes" : "no";

        return [$question, $rightAnswer];
    };


    startGame(DESCRIPTION, $genGameQuestion);
}

<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Index\startGame;

function generateProgression($firstElement, $progressionLength, $progressionStep): array
{
    $progression = [$firstElement];
    for ($i = 1; $i <= $progressionLength; $i += 1) {
        $progression[] = ($progression[$i - 1] + $progressionStep);
    }
    return $progression;
}

function genQuestionGame($progression, $index): string
{
    $question = $progression;
    $question[$index] = '..';
    return implode(" ", $question);
}

function buildProgressionGame()
{
    $genGameQuestion = function () {
        $progressionLength = rand(10, 16);
        $progressionStep = rand(2, 10);
        $firstElement = rand(1, 30);
        $indexHiddenElem = rand(0, $progressionLength - 1);
        $progression = generateProgression($firstElement, $progressionLength, $progressionStep);
        $rightAnswer = (string)$progression[$indexHiddenElem];
        $question = genQuestionGame($progression, $indexHiddenElem);

        return [$question, $rightAnswer];
    };
    $description = "What number is missing in the progression?";
    startGame($description, $genGameQuestion);
}

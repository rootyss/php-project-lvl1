<?php

namespace BrainGames\Index;

use function cli\line;
use function cli\prompt;

function meetingUser()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function startGame($description, callable $importGameData)
{
    $roundsCount = 3;
    line('Welcome to the Brain Game!');
    $userName = meetingUser();
    line($description);

    $rightAnswerCount = 0;

    while ($rightAnswerCount < $roundsCount) {
        $gameData = $importGameData();
        $question = $gameData[0];
        $rightAnswer = $gameData[1];
        line("Question: %s", $question);

        $answer = prompt('Your answer: ');

        if ($answer === $rightAnswer) {
            line("Correct!");
            $rightAnswerCount += 1;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $rightAnswer);
            line("Let's try again, %s!", $userName);
            return;
        }
    }
    line("Congratulations, %s!", $userName);
}

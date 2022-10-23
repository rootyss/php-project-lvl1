<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Index\startGame;
use function cli\line;

function getCorrectAnswer($operator, $operand1, $operand2)
{
    switch ($operator) {
        case '+':
            return $operand1 + $operand2;
        case '-':
            return $operand1 - $operand2;
        case '*':
            return $operand1 * $operand2;
        default:
            line("Unknown operator: %s!", $operator);
    }
    return null;
}

function buildCalcGame()
{
    $description = 'What is the result of the expression?';

    $genGameQuestion = function () {
        $operators = '+-*';
        $operand1 = rand(1, 10);
        $operand2 = rand(1, 10);
        $randomOperator = $operators[rand(0, strlen($operators) - 1)];
        $rightAnswer = (string)getCorrectAnswer($randomOperator, $operand1, $operand2);
        $question = "${operand1} ${randomOperator} ${operand2}";
        return [$question, $rightAnswer];
    };

    startGame($description, $genGameQuestion);
}

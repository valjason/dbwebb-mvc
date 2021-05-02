<?php

declare(strict_types=1);

namespace vaaa20\Dice;

//use function Mos\Functions\{
    //destroySession,
    //redirectTo,
    //renderView,
    //renderTwigView,
    //sendResponse,
    //url
//};

/**
 * Class Dice.
 */
class Dice
{
    const FACES = 6;
    private ?int $roll = null;
    //const CONSTANT = 'constant value';
    //const int FACES = 6;

    public function roll(): int
    {
        $this->roll = rand(1, self::FACES);

        return $this->roll;
    }

    public function getLastRoll(): int
    {
        return $this->roll;
    }
}

<?php

declare(strict_types=1);

namespace vaaa20\Dice;
/**
 * Class GraphDice
 */
class GraphDice
{
	const FACES = 6;
	//const CONSTANT = 'constant value';
	//const int FACES = 6;

	private ?int $roll = null;	
	
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

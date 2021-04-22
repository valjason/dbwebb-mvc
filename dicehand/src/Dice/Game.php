<?php

declare(strict_types=1);

namespace vaaa20\Dice;

use function Mos\Functions\{
    redirectTo,
    renderView,
    sendResponse,
    url
};



use vaaa20\Dice\Dice;
use vaaa20\Dice\DiceHand;



/**
 * Class Game.
 */
class Game
{

    public function playGame(): void
    {

		$data = [
			"header" => "Dice",
			"message" => "Hey!",
		];

		$die = new Dice();
		$die->roll();
		$diceHand = new DiceHand();
		$diceHand->roll();

	
		$data["dieLastRoll"]=$die->getLastRoll();

		$data["diceHandRoll"]=$diceHand->getLastRoll();

		


		$body = renderView("layout/dice.php", $data);
		sendResponse($body);
	
    }

}

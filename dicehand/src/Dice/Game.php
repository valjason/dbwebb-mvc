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
		
		/*$_SESSION['playerTotal'] = 0;*/
		
		echo ($_SESSION['playerTotal']);


		if($_SESSION['playerTotal'] >= 22) {
			session_destroy();
		}	
		
		?>
		<form method="post" action="form/view">
		<input type="submit" value="Hit">

		</input>
		</form>

		<form method="post" action="form/new">
		<input type="submit" value="Stay">

		</input>
		</form>

		




		<?php		
		$computerTotal = 0;

		/*$_SESSION['gameStatus'] = "true";*/

		echo ($_SESSION['gameStatus']);

		?>
		<form method="post" action="form/stop">
		<input type="submit" value="Stop">

		</input>
		</form>



		<?php


		while($computerTotal<=21){
			$computerTotal += rand(1,6);
			if ($computerTotal > $_SESSION['playerTotal']){
				$_SESSION['gameStatus'] = "false";
				break;
				
			} else if ($computerTotal > $_SESSION['playerTotal']){
				$_SESSION['gameStatus'] = "false";
				break;
			}
		}

		$_SESSION['computerTotal'] = $computerTotal;
		
		if ($computerTotal < $_SESSION['playerTotal'] && $_SESSION['playerTotal'] <= 21 && $_SESSION['gameStatus'] === "false")
		{$result = "Player Wins!";}
		else if($_SESSION['playerTotal']<$computerTotal && $computerTotal<=21 && $_SESSION['gameStatus'] === "false"){
		$result = "Computer Wins!";
		} else if ($computerTotal>21 && $_SESSION['playerTotal']<=21 && $_SESSION['gameStatus'] === "false") {
			$result = "Computer Bust! Player Wins!";
		} else if ($_SESSION['playerTotal']>21 && $computerTotal<=21 && $_SESSION['gameStatus'] === "false") {
			$result = "Player Bust! Computer Wins!";
		}
		
		if ($_SESSION['gameStatus'] === "true"){
		echo "<div id='message'>".$val."</br>"."Player: ".$_SESSION['playerTotal']." Computer: ".$computerTotal."<br>".$result.$_SESSION['computerTotal']."</div>";
	}

		$body = renderView("layout/dice.php", $data);
		sendResponse($body);
<<<<<<< HEAD
<<<<<<< HEAD
	
=======
		echo "Made By Valério Wallin";
>>>>>>> small change
=======
		echo "Made By Valério Wallin - Redirect Branch";
<<<<<<< HEAD
>>>>>>> lets try to redirect
=======
		echo $die->getLastRoll();
>>>>>>> on the way to success
    }

}

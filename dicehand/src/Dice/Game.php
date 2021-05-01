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
			"message" => "Players in turn aim to score 21, or as near as possible to it, by throwing the dice as many times as desired and adding up the numbers thrown.  A player who totals over 21 is bust and is out of the game.<br><br>You can either hit or stay in this game, which means throw the dice or choose to stay at the current number.<br> <br>  The player whose total is nearest 21, after each player has had a turn, wins the game.  In the case of an equally high total, a play-off is made.",
		];

		$die = new Dice();
		$die->roll();
		$diceHand = new DiceHand();
		$diceHand->roll();


		$_SESSION['lastroll'] = $die->getLastRoll();

	
		$data["dieLastRoll"]=$die->getLastRoll();

		$data["diceHandRoll"]=$diceHand->getLastRoll();
		
		/*$_SESSION['playerTotal'] = 0;*/
		
		/*echo ($_SESSION['playerTotal']);*/

		
		if(isset($_SESSION_['playerTotal']) && $_SESSION['playerTotal'] >= 22) {
			session_destroy();
		}	

		if(!isset($_SESSION['playerTotal'])) {

			$_SESSION['playerTotal'] = 0;
		}
		
		?>
		<!--
		<form method="post" action="form/view">
		<input type="submit" value="Hit">

		</input>
		</form>

		<form method="post" action="form/new">
		<input type="submit" value="Stay">

		</input>
		</form>
		-->
		




		<?php		
		

		/*$_SESSION['gameStatus'] = "true";*/

/*		echo ($_SESSION['gameStatus']);*/

		?>
<!--
		<form method="post" action="form/stop">
		<input type="submit" value="Stop">

		</input>
		</form>
-->


		<?php

		$computerTotal = 0;
		while(true){
			

			if ($computerTotal > $_SESSION['playerTotal']) {
				/* Strange, if I add isset to the session variable above, computer continues to bust after a hit and stay. */
				break; /* Computer over player, stop */
			} else if (isset($_SESSION['playerTotal']) > 21) {
				break;  /* Player over 21, computer stops */
			} else if ((isset($_SESSION['playerTotal']) < 22) && ($computerTotal > isset($_SESSION['playerTotal']))) {
				break; /* Is the computer over the player, stop */
			} else if (isset($_SESSION['playerTotal']) > 21) {
				$computerTotal = 0;
				break;
				/* player over 21, computer is 0 and stop */
			} if ($computerTotal > 21) {
				break;
			}
			
			$computerTotal += rand(1,6);
		}

		#HERE IS NEW CODE:

	

		




/*
		if($_SESSION['playerTotal'] > 21) {
			$computerTotal = 19;
		}
*/
/*
		echo $_SESSION['playerTotal'];

		if($_SESSION['playerTotal'] < 21) {
			

		  if ($_SESSION['playerTotal'] == 21) {

			while($computerTotal < 21) {

			$computerTotal += rand(1,6);

			}

		} else if ($_SESSION['playerTotal'] < 21) {
			
			while($computerTotal < ($_SESSION['playerTotal']+1)) {

				$computerTotal += rand(1,6);
			}

			}
		} 

		if($_SESSION['playerTotal'] > 21) {

		$computerTotal = 0;

		}*/

		$_SESSION['computerTotal'] = $computerTotal;
		
		if ($computerTotal < isset($_SESSION['playerTotal']) && isset($_SESSION['playerTotal']) <= 21 && isset($_SESSION['gameStatus']) === "false")
		{$result = "Player Wins!";}
		else if(isset($_SESSION['playerTotal'])<$computerTotal && $computerTotal<=21 && isset($_SESSION['gameStatus']) === "false"){
		$result = "Computer Wins!";
		} else if ($computerTotal>21 && isset($_SESSION['playerTotal'])<=21 && isset($_SESSION['gameStatus']) === "false") {
			$result = "Computer Bust! Player Wins!";
		} else if (isset($_SESSION['playerTotal'])>21 && $computerTotal<=21 && isset($_SESSION['gameStatus']) === "false") {
			$result = "Player Bust! Computer Wins!";
		}
		
		if (isset($_SESSION['gameStatus']) === "true"){
		echo "<div id='message'>".$val."</br>"."Player: ".isset($_SESSION['playerTotal'])." Computer: ".$computerTotal."<br>".$result.$_SESSION['computerTotal']."</div>";
	}

		$body = renderView("layout/dice.php", $data);
		sendResponse($body);
<<<<<<< HEAD
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
<<<<<<< HEAD
>>>>>>> on the way to success
=======
		echo "HELLOOO LADIES N GENTS".$_SESSION['lastroll'];
>>>>>>> close now
=======

		/*echo "Made By Valério Wallin";*/
		/*echo $die->getLastRoll();*/
		/*echo "HELLOOO LADIES N GENTS".$_SESSION['lastroll'];*/
>>>>>>> pretty good, some logic issues, dice x2 missing
    }

}

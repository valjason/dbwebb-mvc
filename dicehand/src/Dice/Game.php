<?php

declare(strict_types=1);

namespace vaaa20\Dice;

use vaaa20\Dice\Dice;
use vaaa20\Dice\DiceHand;

use function Mos\Functions\{
    redirectTo,
    renderView,
    sendResponse,
    url
};

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

        $data["dieLastRoll"] = $die->getLastRoll();

        $data["diceHandRoll"] = $diceHand->getLastRoll();

        if (isset($_SESSION['playerTotal']) && $_SESSION['playerTotal'] >= 22) {
            session_destroy();
        }

        if (!isset($_SESSION['playerTotal'])) {
            $_SESSION['playerTotal'] = 0;
        }

        $computerTotal = 0;
        while (true) {
            if ($computerTotal > $_SESSION['playerTotal'] || $computerTotal > 21) {
                /* Strange, if I add isset to the session variable above, computer continues to bust after a hit and stay. */
                break; /* Computer over player, stop */
            } else if ((isset($_SESSION['playerTotal']) < 22) && ($computerTotal > isset($_SESSION['playerTotal']))) {
                break; /* Is the computer over the player, stop */
            } else if (isset($_SESSION['playerTotal']) > 21) {
                $computerTotal = 0;
                break;
                /* player over 21, computer is 0 and stop */
            }
            $computerTotal += rand(1, 6);
        }

        $_SESSION['computerTotal'] = $computerTotal;
<<<<<<< HEAD
<<<<<<< HEAD
		
	

<<<<<<< HEAD
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

<<<<<<< HEAD
		/*echo "Made By Valério Wallin";*/
		/*echo $die->getLastRoll();*/
		/*echo "HELLOOO LADIES N GENTS".$_SESSION['lastroll'];*/
>>>>>>> pretty good, some logic issues, dice x2 missing
=======

>>>>>>> cleaned up nice
=======
        $body = renderView("layout/dice.php", $data);
        sendResponse($body);


>>>>>>> cleaned up nicely, still some left
=======
        $body = renderView("layout/dice.php", $data);
        sendResponse($body);
>>>>>>> almost clean
=======
        $body = renderView("layout/dice.php", $data);
        sendResponse($body);
>>>>>>> redirect
    }
}

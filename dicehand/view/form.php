<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

$header = $header ?? null;
$message = $message ?? null;
$action = $action ?? null;
$output = $output ?? null;

echo "<br><br>";
?>


<?php

/*
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
*/
if(!isset($_SESSION['playerTotal'])){$_SESSION['playerTotal'] = 0;}

echo "Player: ".$_SESSION['playerTotal']." points"."<br><br>";
echo "Computer: ".$_SESSION['computerTotal']." points";


if ($_SESSION['computerTotal'] < $_SESSION['playerTotal'] && $_SESSION['playerTotal'] <= 21)
{$result = "Player Wins!";}
else if($_SESSION['playerTotal']<$_SESSION['computerTotal'] && $_SESSION['computerTotal']<=21){
$result = "Computer Wins!";
} else if ($_SESSION['computerTotal']>21 && $_SESSION['playerTotal']<=21) {
    $result = "Computer Bust! Player Wins!";
} else if ($_SESSION['playerTotal']>21 && $_SESSION['computerTotal']<=21) {
    $result = "Player Bust! Computer Wins!";
} else if ($_SESSION['playerTotal'] && $_SESSION['computerTotal'] > 21) {
	$result = "Logic Error - Contact Developer";
}	
echo "<br>"."<br>".$result."</br></br>";


?>
<form method="post" action="../form/again">
<input type="submit" value="Wanna play again?">
</input>
</form>

<?php
if($_SESSION['playerTotal']>21) {

$_SESSION['computerTotal'] = 0;
$computerTotal = 0;

}
session_destroy();

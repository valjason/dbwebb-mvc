<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

$header = $header ?? null;
$message = $message ?? null;
$action = $action ?? null;
$output = $output ?? null;
$result = "";

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
if (!isset($_SESSION['playerTotal'])) {
    $_SESSION['playerTotal'] = 0;
}

echo "Player: " . $_SESSION['playerTotal'] . " points" . "<br><br>";
echo "Computer: " . $_SESSION['computerTotal'] . " points";


if ($_SESSION['computerTotal'] < $_SESSION['playerTotal'] && $_SESSION['playerTotal'] <= 21) {
    $result = "Player Wins!";
} elseif ($_SESSION['playerTotal'] < $_SESSION['computerTotal'] && $_SESSION['computerTotal'] <= 21) {
    $result = "Computer Wins!";
} elseif ($_SESSION['computerTotal'] > 21 && $_SESSION['playerTotal'] <= 21) {
    $result = "Computer Bust! Player Wins!";
} elseif ($_SESSION['playerTotal'] > 21 && $_SESSION['computerTotal'] <= 21) {
    $result = "Player Bust! Computer Wins!";
} elseif ($_SESSION['playerTotal'] && $_SESSION['computerTotal'] > 21) {
    $result = "Logic Error - Contact Developer";
}

echo "<br>" . "<br>" . $result . "</br></br>";

if ($result === "Player Wins!" || $result === "Computer Bust! Player Wins!") {
    $_SESSION['scoreboardPlayer'] += 1;
    echo "Player Score: " . $_SESSION['scoreboardPlayer'];
}
if ($result === "Computer Wins!" || $result === "Player Bust! Computer Wins!") {
    $_SESSION['scoreboardComputer'] += 1;
    /*echo "Computer Score: " . $_SESSION['scoreboardComputer'];*/
}
?>
<form method="post" action="../form/again">
<input type="submit" value="Wanna play again?">
</input>
</form>

<?php
if ($_SESSION['playerTotal'] > 21) {
    $_SESSION['computerTotal'] = 0;
    $computerTotal = 0;
}



$_SESSION['playerTotal'] = 0;
$_SESSION['computerTotal'] = 0;

<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

//use vaaa20\Dice\Dice;
//use vaaa20\Dice\DiceHand;


$header = $header ?? null;
$message = $message ?? null;

?><h1><?= $header ?></h1>
<!--<p>TOP</p>-->

<?php
if (($_SESSION['scoreboardPlayer'] <= 0) && ($_SESSION['scoreboardComputer'] <= 0)) {
?>
<p><?= $message ?></p>
<?php
}
?>
<!--<p><?= $diceHandRoll ?></p>-->


<form method="post" action="ng">
<input type="submit" value="New Game">
</input>

</form>

<?php

if (($_SESSION['scoreboardPlayer'] > 0) || ($_SESSION['scoreboardComputer'] > 0)) {
echo "<h1>Total Scoreboard:</h1> " . "<h2>Player: " . $_SESSION['scoreboardPlayer'] . "</h2>" . "<h2>Computer: " . $_SESSION['scoreboardComputer']."</h2>";
}
?>

<form method="post" action="form/view">
<input type="submit" value="Hit">
</input>

</form>

<form method="post" action="form/view2">
<input type="submit" value="Hit x2">
</input>

</form>
<br>
<form method="post" action="form/new">
<input type="submit" value="Stay">
</input>
</form>
<br>
<?php

if (isset($_SESSION['playerTotal'])) {
    echo "Sum: " . $_SESSION['playerTotal'];
}
echo "<br><br>";


?>


<?php

/*$val .= '<img src="../src/images/' . $this->getLastRoll()[$i] . '.png">'.$this->getLastRollOld();*/
$val = '<img src="../src/images/' . $_SESSION['lastroll'] . '.png">';
if (isset($_SESSION['diceimage'])) {
    echo $_SESSION['diceimage'];
}


/*echo "<br>BOTTOM";*/

?>


<!-- someway this needs to removed and put in the Router.php or Game.php file -->

<?php

/*echo $_SESSION['lastroll'];*/

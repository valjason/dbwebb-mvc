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

<p><?= $message ?></p>


<p> DICE!!!! </p>

<p><?= $dieLastRoll ?></p>

<p>Dicehand</p>

<p><?= $diceHandRoll ?></p>

<?php

/*$val .= '<img src="../src/images/'.$this->getLastRoll()[$i].'.png">'.$this->getLastRollOld();*/
$val = '<img src="../src/images/'.$_SESSION['lastroll'].'.png">';
echo $val;

?>


<!-- someway this needs to removed and put in the Router.php or Game.php file -->

<?php

echo $_SESSION['lastroll'];

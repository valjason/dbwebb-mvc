<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

$header = $header ?? null;
$message = $message ?? null;
$action = $action ?? null;
$output = $output ?? null;

?><h1><?= $header ?></h1>

<p><?= $message ?></p>

<form method="post" action="<?= $action ?>">
    <p>
        <input type="text" name="content" placeholder="Enter a value and see it in the resultpage.">
    </p>

    <p>
        <input type="submit" value="Press me">
    </p>

    <?php if ($output !== null) : ?>
    <p>
        <output>You have sent the value of:<br>'<?= htmlentities($output) ?>'</output>
    </p>
    <?php endif; ?>

</form>


<?php

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
}
echo "<br>"."<br>".$result;


?>

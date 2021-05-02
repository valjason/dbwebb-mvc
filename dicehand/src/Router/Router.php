<?php

declare(strict_types=1);

namespace vaaa20\Dice;
namespace Mos\Router;

use vaaa20\Dice\Dice;
use vaaa20\Dice\DiceHand;

use function vaaa20\Dice\Dice\{
    getLastRoll
};
use function Mos\Functions\{
    destroySession,
    redirectTo,
    renderView,
    renderTwigView,
    sendResponse,
    url
};

/**
 * Class Router.
 */
class Router
{
    public static function dispatch(string $method, string $path): void
    {
        if ($method === "GET" && $path === "/") {
            $data = [
                "header" => "Index page",
                "message" => "Hello, this is the index page, rendered as a layout.",
            ];
            $body = renderView("layout/page.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/session") {
            $body = renderView("layout/session.php");
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/session/destroy") {
            destroySession();
            redirectTo(url("/session"));
            return;
        } else if ($method === "GET" && $path === "/debug") {
            $body = renderView("layout/debug.php");
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/twig") {
            $data = [
                "header" => "Twig page",
                "message" => "Hey, edit this to do it youreself!",
            ];
            $body = renderTwigView("index.html", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/some/where") {
            $data = [
                "header" => "Rainbow page",
                "message" => "Hey, edit this to do it youreself!",
            ];
            $body = renderView("layout/page.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/dice") {
            //$data = [
                //"header" => "Dice",
                //"message" => "Hey, edit this to do it youreself!",
            //];
            //$body = renderView("layout/dice.php", $data);
            //sendResponse($body);
            //return;
            $callable = new \vaaa20\Dice\Game();
            $callable->playGame();
            return;
        } else if ($method === "GET" && $path === "/form/view") {
            $data = [
                "header" => "Form",
                "message" => "Press submit to send the message to the result page.",
                "action" => url("/form/process"),
                "output" => $_SESSION["output"] ?? null,
            ];
            $body = renderView("layout/form.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "POST" && $path === "/form/process") {
            $_SESSION["output"] = $_POST["content"] ?? null;
            redirectTo(url("/form/view"));
            return;
        } else if ($method === "POST" && $path === "/form/view") {
            $_SESSION["output"] = $_POST["content"] ?? null;

            /*$dicereturn = new \vaaa20\Dice\Dice();*/
            /*$_SESSION['lastroll'] = $dicereturn->roll();*/
            $_SESSION["playerTotal"] = $_SESSION["playerTotal"] + $_SESSION['lastroll'];
/*
            if (($_SESSION['playerTotal']+$_SESSION['lastroll'])>=21) {
                redirectTo(url("/form/view"));
                return;
            }
*/
            /*
            if ($_SESSION['playerTotal']>=21) {
                redirectTo(url("/form/view"));
                return;
            }
            */

            if ($_SESSION['playerTotal'] > 21) {
                /*$computerTotal = 0;*/
                $_SESSION['computerTotal'] = 0;
                redirectTo(url("/form/view"));
                return;
            }
            $_SESSION['diceimage'] = '<img src="../src/images/' . $_SESSION['lastroll'] . '.png">';
            $_SESSION["gameStatus"] = "true";
            redirectTo(url("/dice"));
            return;
        } else if ($method === "POST" && $path === "/form/stop") {
            $_SESSION["output"] = $_POST["content"] ?? null;
            $_SESSION["gameStatus"] = "false";
            redirectTo(url("/dice"));
            return;
        } else if ($method === "POST" && $path === "/form/new") {
            /*
            $_SESSION["output"] = $_POST["content"] ?? null;
            $_SESSION["gameStatus"] = "true";
            */
            /*$_SESSION["playerTotal"] = $_POST["playerTotal"] ?? null;*/
            redirectTo(url("/form/view"));
            return;
        } else if ($method === "POST" && $path === "/form/again") {
            $_SESSION["output"] = $_POST["content"] ?? null;
            $_SESSION["gameStatus"] = "true";
            /*$_SESSION["playerTotal"] = $_POST["playerTotal"] ?? null;*/
            redirectTo(url("../../htdocs/dice"));
            return;
        } else if ($method === "POST" && $path === "/form/view2") {
            $_SESSION["output"] = $_POST["content"] ?? null;
            /*$dicereturn = new \vaaa20\Dice\Dice();*/
            /*$_SESSION['lastroll'] = $dicereturn->roll();*/
            $_SESSION["playerTotal"] = $_SESSION["playerTotal"] + ($_SESSION['lastroll'] * 2);
/*
            if (($_SESSION['playerTotal']+$_SESSION['lastroll']) > 21) {
                redirectTo(url("/form/view"));
                return;
            }
*/


            if ($_SESSION['playerTotal'] > 21) {
                /*$computerTotal = 0;*/
                $_SESSION['computerTotal'] = 0;
                redirectTo(url("/form/view"));
                return;
            }

            $_SESSION['diceimage'] = '<img src="../src/images/' . $_SESSION['lastroll'] . '.png">';
            $_SESSION["gameStatus"] = "true";


            redirectTo(url("/dice"));
            return;
        }

        $data = [
            "header" => "404",
            "message" => "The page you are requesting is not here. You may also checkout the HTTP response code, it should be 404.",
        ];
        $body = renderView("layout/page.php", $data);
        sendResponse($body, 404);
    }
}

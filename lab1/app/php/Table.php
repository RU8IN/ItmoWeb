<?php

require "Rows.php";
require_once "Timer.php";
require "utils.php";
require "hit-checker.php";
require "data-validator.php";

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

session_start();

$timer = new Timer();

$timer->startCountdown();

$row;
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    $x = preprocessValue($_GET["x"]);
    $y = preprocessValue($_GET["y"]);
    $r = preprocessValue($_GET["r"]);
    
    $dataIsCorrect = isArgumentsAreNumbers($x, $y, $r) && checkX($x) && checkY($y) && checkR($r);
    $dataInfo;

    if (!$dataIsCorrect) {
        $dataInfo = "Ошибка ввода данных";
    } else if (isHit($x, $y, $r)) {
        $dataInfo = "Попал";
    } else {
        $dataInfo = "Не попал";
    }

    $row = new Row(date(DATE_ATOM, time()), $_GET["x"], $_GET["y"], $_GET["r"], $dataInfo, changePointToComma($timer->stopCountdown()) . " ms");
} else {
    $row = new Row("PLEASE", "USE", "ANOTHER", "METHOD", "FOR", "SENDING!");
}

$rows;

if (!isset($_SESSION["rows"])) {
    $rows = new Rows($row);
} else {
    $rows = $_SESSION["rows"];
    $rows->pushFront($row);
}

$_SESSION["rows"] = $rows;
?>

<?php
printRows($rows);
?>
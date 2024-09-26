<?php
session_start();

$words = [];

if (!isset($_SESSION['randomDutchWord']) || !isset($_SESSION['correctFrenchWords'])) {
    $_SESSION['randomDutchWord'] = array_rand($words);
    $_SESSION['correctFrenchWords'] = $words[$_SESSION['randomDutchWord']];
}

if (isset($_POST["answer"])) {
    $answer = $_POST["answer"];
    $randomDutchWord = $_SESSION['randomDutchWord'];
    $correctFrenchWords = $_SESSION['correctFrenchWords'];
    if (in_array(strtolower($answer), array_map('strtolower', $correctFrenchWords))) {
        echo "Juist!<br>";
        echo "Juiste antwoord was $correctFrenchWords[0]<br>";
        echo "Jou antwoord was $answer";
        echo "<br><a href='opniew.php'>Opniew</a>";
    } else {
        echo "Fout. Juiste antwoord is $correctFrenchWords[0] <br>";
        echo "Jou antwoord was $answer";
        echo "<br><a href='opniew.php'>Opniew</a>";
    }
} else {
    $randomDutchWord = $_SESSION['randomDutchWord'];
    echo "Vertaal '$randomDutchWord' ";
    echo "<form method='post'>
        <input type='text' name='answer'>
        <input type='submit' value='Submit'>
    </form>";
}
?>

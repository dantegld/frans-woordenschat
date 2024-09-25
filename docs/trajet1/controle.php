<?php
session_start();

$words = [
    "het verband" => ["le bandage", "la bandage", "bandage"],
    "de helm" => ["le casque", "casque", "la casque"],
    "het ontsmettingsmiddel" => ["le désinfectant", "desinfectant", "la desinfectant"],
    "de handschoen" => ["le gant", "gant", "la gant"],
    "de hartmassage" => ["le massage cardiaque", "massage cardiaque", "la massage cardiaque"],
    "het gereedschap" => ["l'outil", "outil"],
    "de pleister" => ["le pansement", "pansement", "la pansement"],
    "het gips" => ["le plâtre", "platre", "le platre", "la plâtre","plâtre", "la plâtre"],
    "de verpleger" => ["le secouriste", "secouriste", "la secouriste"],
    "de hulpdiensten" => ["les services de secours", "services de secours", "les secours", "secours"],
    "de brandwonde" => ["la brûlure", "brulure", "la brulure", "le brulure", "le brûlure", "brûlure"],
    "de wonde" => ["la plaie", "plaie", "le plaie"],
    "de veiligheid" => ["la sécurité", "securite", "la securite", "securite", "le sécurité", "le securite"],
    "de oplossing" => ["la solution", "solution", "le solution"],
    "de outfit" => ["la tenue vestimentaire", "tenue vestimentaire", "le tenue vestimentaire", "tenue", "la tenue", "le tenue"],
    "het spoedgeval" => ["l'urgence", "urgence"],
    "het slachtoffer" => ["la victime", "victime", "le victime"],
    "bewusteloos" => ["inconscient"],
    "inslikken" => ["avaler"],
    "uitschakelen" => ["débrancher", "debrancher"],
    "klimmen op" => ["monter sur"], 
    "flauwvallen" => ["s'évanouir","s'evanouir","evanouir","évanouir"],
    "verdrinken" => ["se noyer", "noyer"],
    "zich beschermen tegen" => ["se protéger de", "se proteger de", "proteger", "protéger"],
    "gebruik maken van" => ["se servir de", "servir"],
    "aanraken" => ["toucher"],
    "struikelen" => ["trébucher", "trebucher"],
    "pijn hebben aan" => ["avoir mal à", "avoir mal a"],
    "in geval van" => ["en cas de"],
    "flauwvallen" => ["perdre connaissance"],
    "de hulpverlener" => ["le secouriste", "secouriste", "la secouriste"]

];

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

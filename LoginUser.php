<?php
include "connectie.php";
session_start();

$naam = $_POST["Naam"];
$wachtwoord = $_POST["Wachtwoord"];

$query = "SELECT * FROM users WHERE Naam = '$naam' AND Wachtwoord = '$wachtwoord' LIMIT 1";

if (!($result = $mysqli->query($query)))
showerror($mysqli->errno,$mysqli->error);

//geeft resultaat weer
$row = $result->fetch_assoc();


//als row id gelijk is aan je GET id (dan weet je dat het antwoord hetzelde is als wat je erin gestopt hebt) als hij gelukt is, laat je de session_id zien en anders 0. dan weet arduino dat het niet gelukt is (dan zou je bijv een lampje aan kunnen doen zodat je weet dat het niet is gelukt)

if ($row["Naam"] == $naam) {
    //naam zit in de sessie
    $_SESSION["naam"]=$row["id"];

    echo session_id();
}

if ($row["Naam"]!=$naam)
    echo '0';


//sessies maken we om zoveel mogelijk info te beperken. dus als we bijv. alleen de temparatuur willen meesturen, dan doen we dat met een sessie
//in jouw pagina moet de sessie_id zichtbaar worden gemaakt, zodat het naar de arduino kan worden gestuurd
//http://home.hku.nl/~ton.markus/kern_iad/index.php?les=6&content=7



//http://studenthome.hku.nl/~noura.dakkak/1.KERIAD4/5.herkansing2018/login.php?id=1&wachtwoord=hoi

//de sessie_id die je krijgt als antwoord, stuur je naar je arduino. ook de data die je wilt vergaren

//session_id voor id=1 en wachtwoord= hoi 
//mqtqt2kju7hkna7094bp9qum36

?>



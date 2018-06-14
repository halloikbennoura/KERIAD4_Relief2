<!DOCTYPE html>
<html>
<head>
<title>Relief | Insert_nat</title>


<?php
include "connectie.php";
session_start();

//de sessies verbinden alle paginas met elkaar
//op 1 pagina maak je hem aan, en op de anderen paginas ga je m gebruiken
//$_SESSION["users_id"]; //deze variabele geldt voor de hele sessie, daarom []

//$thing_id = $_GET["thing_id"];
//$data_knop = $_GET["data_knop"];

//insert tijdstip wanneer katether nat word en ledje op Relief brand
//tijd_geleegd blijft NULL want die moet pas worden ingevuld wanneer zorgverlener op knop drukt

//$query = "INSERT INTO things_data (id, thing_id, tijd_nat, tijd_geleegd) VALUES (NULL, $thing_id, NOW(), NULL)";

$query = "INSERT INTO things_data(thing_id, tijd_nat, geleegd) 
VALUES ('".$_GET["thing_id"]."', NOW( ), NULL)";

if (!($result = $mysqli->query($query)))
showerror($mysqli->errno,$mysqli->error);


//sessie_id en wachtwoord moet je aansturen via arduino
//met je arduino ga je naar die paginas toe

?>

</head>
<body>

</body>
</html>

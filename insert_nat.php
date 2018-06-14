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
$query = "INSERT INTO things_data(thing_id, tijd_nat, geleegd) 
VALUES ('".$_GET["thing_id"]."', NOW( ), NULL)";

if (!($result = $mysqli->query($query)))
showerror($mysqli->errno,$mysqli->error);

?>

</head>
<body>

</body>
</html>

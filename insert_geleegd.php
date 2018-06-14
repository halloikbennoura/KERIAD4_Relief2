<!DOCTYPE html>
<html>
<head>
<title>Relief | Insert_geleegd</title>

<?php
include "connectie.php";
session_start();

//de sessies verbinden alle paginas met elkaar
//op 1 pagina maak je hem aan, en op de anderen paginas ga je m gebruiken
//$_SESSION["users_id"]; //deze variabele geldt voor de hele sessie, daarom []

$thing_id = $_GET["thing_id"];
//$geleegd = $_GET["geleegd"];

//pakt laatst row van things_data en update deze naar nieuwe tijd met knop_waarde
//limiteer dat hij maar 1 pakt en hij moet de meest recente pakken
//$query = "UPDATE things_data SET tijd_geleegd = NOW(),
//geleegd=$geleegd WHERE thing_id=$thing_id ORDER BY tijd_nat DESC LIMIT 1";
    
$query = "UPDATE things_data SET tijd_geleegd = NOW(),
geleegd=1 WHERE thing_id=$thing_id ORDER BY tijd_nat DESC LIMIT 1";
    
    
if( $query){
    echo "Succes! De katheter is geleegd en de tijd is geplaatst.";
} 
if (!($result = $mysqli->query($query)))
showerror($mysqli->errno,$mysqli->error);
      

//mensen toevoegen in database:
//http://studenthome.hku.nl/~noura.dakkak/1.KERIAD4/5.herkansing2018/opdracht5.php?naam=binnie&locatie=%22gang%22&catheter=1
?>

</head>
<body>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
<title>Relief | Agenda</title>

<?php
include "connectie.php";
session_start();


//----------

//opdracht 9
//temperature en things zijn hier gekoppeld
//Maak een lijst met gebruikersnamen en bijbehorende thing namen


$query = "SELECT things.id, things.patient, things.waarschuwing_legen, things_data.id AS data_id, things_data.tijd_nat, things_data.tijd_geleegd, things_data.geleegd
FROM things_data
LEFT JOIN things ON things_data.thing_id
WHERE things_data.thing_id =1
AND things.id =1
ORDER BY things_data.tijd_nat DESC 
LIMIT 1";
    
if (!($result = $mysqli->query($query)))
showerror($mysqli->errno,$mysqli->error);

//geeft resultaat weer
$row = $result->fetch_assoc();


do {
    
    $patient = $row["patient"];
    $waarschuwing = $row["waarschuwing_legen"];
    $tijd_nat = $row["tijd_nat"];
    $tijd_geleegd = $row["tijd_geleegd"];
    $is_geleegd = $row["geleegd"];
    $_SESSION['patient_naam'] = $patient;

    echo '<b>Patient naam:</b>';
    echo "<br>";
    echo $patient;
    echo "<br>";
    echo "Legen binnen: ";
    echo $waarschuwing;
    echo " uur!";
    
    echo "<br>";
    echo "<br>";
    
    echo '<b>Katheter vol op:</b>';
    echo "<br>";
    echo $tijd_nat;
    
    echo "<br>";
    echo "<br>";
    
    echo '<b>Katheter geleegd op:</b>';
    echo "<br>";
    echo $tijd_geleegd;
    
    echo "<br>";
    echo "<br>";
    
    if ($is_geleegd == 1) {
        echo '<b>Op tijd geleegd<b>';
    } 
    
    if ($is_geleegd == 0) {
        echo "Niet op tijd geleegd";
    }   
    echo $is_geleegd;
    
    

} while ($row = $result->fetch_assoc());

?>

</head>
<body>

<!-- <h1><?php echo $_SESSION['patient_naam']; ?></h1>
<h3>tijd nats</h3> -->

</body>
</html>



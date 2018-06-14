<!DOCTYPE html>
<html>
<head>
<title>Relief | Waarschuwing</title>

<?php
include "connectie.php";
session_start();

$query = "SELECT things.waarschuwing_legen
FROM things ORDER BY things.waarschuwing_legen DESC 
LIMIT 1";


if (!($result = $mysqli->query($query)))
showerror($mysqli->errno,$mysqli->error);

//geeft resultaat weer
$row = $result->fetch_assoc();


do {
    
    $waarschuwing = $row["waarschuwing_legen"];
 

    echo "Legen binnen: ";
    echo $waarschuwing;
    echo " uur!";
    echo "<br>";
    

} while ($row = $result->fetch_assoc());

?>


</head>
<body>

<!-- <h1><?php echo $_SESSION['patient_naam']; ?></h1>
<h3>tijd nats</h3> -->

</body>
</html>

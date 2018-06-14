<?php


//deze file moet overal worden geinclude
// ' enkele aanhalingsteken duidt tekst aan

   $db_user = 'noura';
   $db_pass = 'ha1ka9ZeiW';
   $db_host = 'localhost';
   $db_name = 'noura';

/* Open a connection */
$mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");

/* check connection */
//als er geen fout is krijg ik een 0 als antwoord
//als iets anders dan 0, dan is er iets fout
if ($mysqli->connect_errno) {
   echo "Failed to connect to MySQL: (" . $mysqli->connect_errno() . ") " . $mysqli->connect_error();
   exit();
} 

//error
function showerror($error,$errornr) {
die("Error (" . $errornr . ") " . $error);
}


?>

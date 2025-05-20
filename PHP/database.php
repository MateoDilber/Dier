<?php
// Database instellingen
$host = "localhost"; 
$user = "root"; 
$password = "";
$database = "Dier";

// Maak verbinding met de database
$mysqli = new mysqli($host, $user, $password, $database);

try {
    if ($mysqli->connect_errno) {
        throw new Exception("Connection failed: " . $mysqli->connect_error);
    }
} catch (Exception $e) {
    die("Fout opgetreden: " . $e->getMessage());
}

// Als alles goed gaat:
return $mysqli;
?>

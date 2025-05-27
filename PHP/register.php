<?php
require_once 'database.php';

// Controleer of het formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de gegevens op uit het formulier
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Valideer de invoer
    if (empty($name) || empty($email) || empty($password)) {
        die("Alle velden moeten worden ingevuld");
    }

    // Valideer email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Ongeldig email adres");
    }

    // Hash het wachtwoord
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Voeg de gebruiker toe aan de database
    $sql = "INSERT INTO user (name, email, password_hash) VALUES ('$name', '$email', '$password_hash')";
    
    if ($mysqli->query($sql) === TRUE) {
        // Start een sessie en sla de gebruikersgegevens op
        session_start();
        $_SESSION["user_id"] = $mysqli->insert_id;
        $_SESSION["user_name"] = $name;
        $_SESSION["user_email"] = $email;
        
        // Stuur door naar profiel pagina
        header("Location: ../HTML/profiel.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    
    $mysqli->close();
}
?>
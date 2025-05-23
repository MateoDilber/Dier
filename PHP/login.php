<?php
require_once 'database.php';

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Zoek de gebruiker in de database
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Controleer het wachtwoord
        if (password_verify($password, $user['password_hash'])) {
            // Login succesvol
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            header("Location: ../HTML/index.html");
            exit();
        } else {
            // Verkeerd wachtwoord
            header("Location: ../HTML/login.html?error=wrong_password");
            exit();
        }
    } else {
        // Gebruiker niet gevonden
        header("Location: ../HTML/login.html?error=user_not_found");
        exit();
    }

    $mysqli->close();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    
    <h1>Login</h1>
    
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    
    <form method="post">
        <label for="email">email</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        
        <button>Log in</button>
    </form>
    
</body>
</html>









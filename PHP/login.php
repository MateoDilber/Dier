<?php
require_once 'database.php';
require_once 'User.php';

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User($mysqli);
    $result = $user->login($_POST['email'], $_POST['password']);
    
    if ($result['success']) {
        header("Location: ../HTML/profiel.html");
        exit();
    } else {
        header("Location: ../HTML/login.html?error=" . urlencode($result['message']));
        exit();
    }
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









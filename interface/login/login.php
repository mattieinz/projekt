<?php
session_start();
require_once __DIR__ . '/../../database/connect.php';

function sanitizeInput($conn, $key) {
    return isset($_POST[$key]) ? trim($conn->real_escape_string($_POST[$key])) : '';
}

function redirectToApp() {
    header("Location: ../App/App.php");
    exit;
}

function validateLoginInput($username, $password) {
    return !empty($username) && !empty($password);
}

function findUserByUsername($conn, $username) {
    $stmt = $conn->prepare("SELECT * FROM players WHERE Name = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function handleLogin($conn) {
    $username = sanitizeInput($conn, 'Name');
    $password = sanitizeInput($conn, 'Password');

    if (!validateLoginInput($username, $password)) {
        return "Benutzername und Passwort dürfen nicht leer sein.";
    }

    $user = findUserByUsername($conn, $username);

    if (!$user) {
        return "Benutzername existiert nicht.";
    }

    if (!password_verify($password, $user['Password'])) {
        return "Falsches Passwort.";
    }

    $_SESSION['user'] = $username;
    redirectToApp();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = getConnection();
    $error = handleLogin($conn);
    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <?php if (!empty($error))
        echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        Benutzername: <input type="text" name="Name" required><br>
        Passwort: <input type="password" name="Password" required><br>
        <button type="submit">Login</button>
    </form>
    <p><a href="register.php">Noch kein Konto? Registrieren</a></p>
</body>

</html>

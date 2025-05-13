<?php
session_start();

require_once('..\..\database\connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = getConnection();
    $username = $conn->real_escape_string($_POST['name']);
    $password = $conn->real_escape_string($_POST['Password']);
    if (empty($username) || empty($password)) {
        $error = "Benutzername und Passwort dürfen nicht leer sein.";
    }
    $sql = "SELECT * FROM players WHERE Name = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows === 0) {
        $error = "Benutzername existiert nicht.";
    } else {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['Password'])) {
            $_SESSION['user'] = $username;
            header("Location: ../App/App.php");
            exit;
        } else {
            $error = "Falsches Passwort.";
        }
    }
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
        Benutzername: <input type="text" name="name" required><br>
        Passwort: <input type="password" name="Password" required><br>
        <button type="submit">Login</button>
    </form>
    <p><a href="register.php">Noch kein Konto? Registrieren</a></p>
</body>

</html>
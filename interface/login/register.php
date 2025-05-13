<?php
session_start();
require_once('..\..\database\connect.php');

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connection = getConnection();
    $username = $connection->real_escape_string($_POST['name']);
    $password = $connection->real_escape_string($_POST['Password']);

    if (empty($username) || empty($password)) {
        $error = "Benutzername und Passwort dürfen nicht leer sein.";
    } else {
        $sql = "SELECT * FROM players WHERE Name = '$username'";
        $result = $connection->query($sql);

        if (!$result) {
            $error = "Datenbankfehler: " . $connection->error;
        } elseif ($result->num_rows > 0) {
            $error = "Benutzername existiert bereits.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insert = $connection->query("INSERT INTO players (Name, Password) 
                                    VALUES ('$username', '$hashedPassword')");

            if ($insert) {
                $success = "Registrierung erfolgreich!";
            } else {
                $error = "Registrierung fehlgeschlagen: " . $connection->error;
            }
        }
    }
    $connection->close();
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Registrierung</title>
</head>

<body>
    <h1>Registrieren</h1>
    <?php
    if (!empty($error))
        echo "<p style='color:red;'>$error</p>";
    if (!empty($success))
        echo "<p style='color:green;'>$success</p>";
    ?>
    <form method="POST">
        Benutzername: <input type="text" name="name" required><br>
        Passwort: <input type="password" name="Password" required><br>
        <button type="submit">Registrieren</button>
    </form>
    <p><a href="login.php">Zurück zum Login</a></p>
</body>

</html>
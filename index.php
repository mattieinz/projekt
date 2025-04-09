<?php
session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login check</title>
</head>
<body>

<?php
if (isset($_SESSION['login']) && isset($_SESSION['passwort'])) {
    include './interface/menu/menu.php';
} else {
    include './interface/login/login.php';
}
?>

</body>
</html>

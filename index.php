<?php
// Start der Session
session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Meine Anwendung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
        }
    </style>
</head>
<body>

<?php
if (isset($_SESSION['login']) && isset($_SESSION['passwort'])) {
    include './interface/menu/menu.php';
} else {
    include './interface/login/login.php';
}
?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    console.log("Seite geladen und bereit.");
});
</script>

</body>
</html>

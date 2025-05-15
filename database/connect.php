<?php
function getConnection(): mysqli
{
    $config = parse_ini_file(__DIR__ . '/database.env', true);
    $conn = new mysqli(
        $config['servername'],
        $config['database_username'],
        $config['database_password'],
        $config['database']
    );

    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

    return $conn;
}
?>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "sswrm";
$table = "tabelle1";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
$sql = "SELECT Name, Vorname, Beschreibung, bild FROM $table ORDER BY Lehrjahr DESC ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $entry = array(
            'Name' => $row['Name'],
            'Vorname' => $row['Vorname'],
            'Beschreibung' => $row['Beschreibung'],
            'bild' => $row['bild']
        );
        array_push($data, $entry);
    }
    //convert php Array to JavaScript Array 
    echo '<script>';
    echo 'var dataArray = ' . json_encode($data) . ';';
    echo '</script>';
} else {
    echo "Keine Daten gefunden";
}
$conn->close();
?>
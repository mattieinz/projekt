<?php
session_start();
$connectionPath = '..\..\database\connect.php';
if (!$connectionPath) {
    die("Datei nicht gefunden: " . __DIR__ . '/../../database/connection.php');
}
require_once($connectionPath);

if (!isset($_SESSION['user'])) {
    header("Location: ../login/login.php");
    exit;
}

;

?>
<script>console.log(<?php echo json_encode($_SESSION['user']); ?>);</script>

<link rel="stylesheet" href="./css/style.css">
<script src="../../js/jquery-3.7.1.min.js"></script>
<script type="module" src="./js/app.js"></script>


<body>
    <header>
        <name><?php echo $_SESSION['user']; ?></name>
        <resdisplay id="credits" style="background-color:#e0c70ba0;">Kredits: 100 </resdisplay>
        <resdisplay id="raw_material" style="background-color:#0bb9e0a0;">Rohstoffe: 0</resdisplay>
        <resdisplay id="fabrics" style="background-color:#16e00ba0;">Stoffe: 0 </resdisplay>
        <resdisplay id="equipment_material" style="background-color:#a60f0ba0;">Hilfsmittel: 0</resdisplay>
    </header>

    <app>

    </app>

    <footer>
        <button>Standorte</button>
        <button>Marktplatz</button>
        <button>Verbrauchsübersicht</button>
        <button>Runde Beenden</button>
    </footer>

    <Locations>

    </Locations>

    <market>

    </market>

    <usage>

    </usage>

    <round>

    </round>

    <overlay>
        <h1>ich bin h1</h1>
        <p>i bims test</p>
    </overlay>

    <button id="etest"
        style="color: black;Background: Red; position: absolute; bottom: 50vh;left: 88vw; width: 10vw;">Event
        Testen</button>
</body>
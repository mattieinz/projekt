<link rel="stylesheet" href="./interface/app/css/style.css">
<script src="./js/jquery-3.7.1.min.js"></script>
<script src="./interface/app/js/app.js"></script>

<body>
    <header>
        <resdisplay style="background-color:#e0c70b;">Kredits: 100 </resdisplay>
        <resdisplay style="background-color:#0bb9e0;">Rohstoffe: 0</resdisplay>
        <resdisplay style="background-color:#16e00b;">Stoffe: 0 </resdisplay>
        <resdisplay style="background-color:#16e00b;">Hilfsstoffe: 0</resdisplay>
    </header>

    <app>

        <layer1 class="layer">
            <ort>Standort1</ort>
            <list>
                <Fabrik id="fabrik1">
                    <fabrikname>fabrik1</fabrikname>
                    <fabriktype>Stahlgießerei</fabriktype>
                    <fabrikarbeiter>2/5</fabrikarbeiter>
                </Fabrik>
                <Fabrik>
                    <p>+</p>
                </Fabrik>
            </list>
        </layer1>

    </app>

    <footer>

        <button>Standorte</button>
        <button>Marktplatz</button>
        <button>Marktplatz</button>
        <button>Runde Beenden</button>

    </footer>

    <button style="color: black;Background: Red; position: absolute; bottom: 50vh;left: 88vw; width: 10vw;">Event Testen</button>
</body>
<link rel="stylesheet" href="./interface/app/css/style.css">
<script src="./js/jquery-3.7.1.min.js"></script>
<script type="module" src="./interface/app/js/factorys.js"></script>
<script type="module" src="./interface/app/js/app.js"></script>


<body>
    <header>
        <resdisplay style="background-color:#e0c70ba0;">Kredits: 100 </resdisplay>
        <resdisplay style="background-color:#0bb9e0a0;">Rohstoffe: 0</resdisplay>
        <resdisplay style="background-color:#16e00ba0;">Stoffe: 0 </resdisplay>
        <resdisplay style="background-color:#a60f0ba0;">Hilfsmittel: 0</resdisplay>
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
        <button>Verbrauchsübersicht</button>
        <button>Runde Beenden</button>
    </footer>

    <overlay>
        <h1>ich bin h1</h1>
        <p>i bims test</p>
    </overlay>

    <button id="etest" style="color: black;Background: Red; position: absolute; bottom: 50vh;left: 88vw; width: 10vw;">Event Testen</button>
</body>
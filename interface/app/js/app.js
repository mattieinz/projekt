import { mine } from './factorys.js';

console.log(mine.logtestdings());


var factorys = {
    standort1: {
        0: {
            "name": "fabrik1",
        }
    },
    standort2: {},
    standort3: {}
}
class events {
    r() {
        switch (ranInt(1, 3)) {
            case 1: this.strike(); break;
            case 2: this.ecodisatser(); break;
            case 3: this.marketchange(); break;
        }
    }

    strike() {

        var amount_factory = ranInt(1, factorys.length / 2);
        var amount_decrease = ranInt(10, 60);
        var affected_factorys = [];

        for (var i = 0; i < amount_factory; i++) {
            affected_factorys.push(factorys[ranInt(0, factorys.length)]);
        }

        var output = "";
        output += "amount_factory: " + amount_factory + "<br>";
        output += "amount_decrease: " + amount_decrease + "<br>";

        for (var i = 0; i < affected_factorys.length; i++) {
            output += affected_factorys[i] + "<br>";
        }

        overlay(60, 60, "Streik in der Arbeitschaft!", [], []);
    }
    ecodisatser() {

    }
    marketchange() {

    }
}

function overlay(Title, description, option1 = [], option2 = []) {
    const overlay_html = $("overlay")

    overlay_html
        .css({
            "display": "flex"
        })

    overlay_html.find("h1").text(Title)
    overlay_html.find("p").text(description)

    if (option1) overlay_html.find("#option1").text(option1);
    if (option2) overlay_html.find("#option2").text(option2);

}


function ranInt(frist, last) {
    return Math.floor(Math.random() * last) + frist;
}

var player = {
    "name": null,
    "kredits": null,
    "rohstoffe": null,
    "stoffe": null,
    "hilfsstoffe": null
}

$(document).ready(function () {

    $("#etest").on("click", function () {
        new events().r();
    })

});




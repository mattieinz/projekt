var savegame = {
    res: {
        "credits": 10000,
        "raw_material": 100,
        "fabrics": 100,
        "equipment_material": 100
    },
    layers: [
        {
            name: "Standort1",
            factories: [
                mine,
                farm,
                equipment,
                steel
            ]
        }
    ]

}

class Factory {
    constructor({ name, requirements = [], output = [], workers = 0 }) {
        this.name = name;
        this.requirements = requirements;
        this.output = output;
        this.workers = workers;
    }
}

const mine = new Factory({
    name: "Bergbau",
    requirements: [{}],
    output: [{ type: "raw_material", amount: 10 }],
    workers: 8
});

const farm = new Factory({
    name: "Farm",
    requirements: [{}],
    output: [{ type: "fabrics", amount: 8 }],
    workers: 5
});

const equipment = new Factory({
    name: "Ausrüstung",
    requirements: [{ type: "raw_material", amount: 5 }, { type: "fabrics", amount: 5 }],
    output: [{ type: "equipment_material", amount: 8 }],
    workers: 5
});

const steel = new Factory({
    name: "Stahlgießerei",
    requirements: [{ type: "raw_material", amount: 5 }],
    output: [{ type: "steel", amount: 5 }],
    workers: 5
});


class Factory {
    constructor({ name, requirements = [], output = [], workers = 0 }) {
        this.name = name;
        this.requirements = requirements;
        this.output = output;
        this.workers = workers;
    }
}



function randomEvent() {
    switch (ranInt(1, 3)) {
        case 1: strikeEvent(); break;
        case 2: disatserEvent(); break;
        case 3: marketChangeEvent(); break;
    }
}
function strikeEvent() {
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

    overlay(60, 60, "Streik in der Arbeiterschaft!", [], []);
}
function disatserEvent() {

}
function marketChangeEvent() {

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


$(document).ready(function () {

    $("#etest").on("click", function () {
        randomEvent();
    })

});




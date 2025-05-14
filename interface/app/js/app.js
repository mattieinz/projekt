let savegame = {
    res: {
        "credits": 10000,
        "material_raw_metals": 100,
        "material_fabrics": 1000000,
        "material_equipment": 100,
        "processed_steel": 100,
        "processed_Clothes": 100,
        "processed_furniture": 100
    },
    location:
    {
        "Standort1": {

            0: {
                type: "mine",
                workers: 6,
                modifer: 60,
                modifer_time: 5,
                modifer_description: "streik"
            },
            1: {
                type: "farm",
                workers: 5,
                modifer: 0,
                modifer_time: 0,
                modifer_description: ""
            },
            2: {
                type: "equip",
                workers: 5,
                modifer: 0,
                modifer_time: 0,
                modifer_description: ""
            },
            3: {
                type: "steel",
                workers: 5,
                modifer: 0,
                modifer_time: 0,
                modifer_description: ""
            },
            4: {
                type: "mine",
                workers: 5,
                modifer: 0,
                modifer_time: 0,
                modifer_description: ""
            }
        },
        "Standort2":
        {
            0: {
                type: "mine",
                workers: 4,
                modifer: 0,
                modifer_time: 0,
                modifer_description: ""
            },
            1: {
                type: "farm",
                workers: 5,
                modifer: 0,
                modifer_time: 0,
                modifer_description: ""
            }

        },
        "Standort3": {

        }
    }
}




function loadSavegame() {
    let res = savegame.res;

    $("#credits").html("Kredits:" + res.credits);
    $("#raw_material").html("Rohstoffe:" + res.material_raw_metals);
    $("#fabrics").html("Stoffe:" + res.material_fabrics);
    $("#equipment_material").html("Hilfsmittel:" + res.material_equipment);

    let output = "";
    let layer = savegame.location;

    for (let standort in layer) {

        let eintrag = layer[standort];
        if (Object.keys(eintrag).length != 0) {
            output += `
                <layer1 class="layer">
                    <ort>${standort}</ort>
                    <list>
                `
            for (let factoryName in eintrag) {
                let factoryType = eval(eintrag[factoryName].type);
                let factoryStatus = eintrag[factoryName]

                output += `
                <Fabrik>
                    <fabrikname>${factoryType.name}</fabrikname>
                `
                if (factoryStatus.modifer != 0) {
                    output += `
                        <fabriktype class="badModifer">${factoryStatus.modifer_description}</fabriktype>
                        <fabriktype class="badModifer">${"Einbußen: " + factoryStatus.modifer + "%"}</fabriktype>
                    `
                }
                else {
                    output += `
                        <fabriktype>${factoryType.requirements}</fabriktype>
                    `
                }
                output +=
                    `
                    <fabrikarbeiter>${factoryStatus.workers}/${factoryType.workers}</fabrikarbeiter>
                </Fabrik>
                `
            }

            output += `
                <Fabrik id="${standort}add">
                    <p>+</p>
                </Fabrik>
                    `
            output += `
                    </list>
                </layer1>
                `
        }
    }
    $('app').append(output);
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
    workers: 8,
});

const farm = new Factory({
    name: "Farm",
    requirements: [{}],
    output: [{ type: "fabrics", amount: 8 }],
    workers: 5
});

const equip = new Factory({
    name: "Ausrüstung",
    requirements: [{ type: "raw_material", amount: 5 }, { type: "fabrics", amount: 5 }],
    output: [{ type: "equipment_material", amount: 8 }],
    workers: 5
});

const steel = new Factory({
    name: "Stahlgießerei",
    requirements: [{ type: "raw_material", amount: 5 }],
    output: [{ type: "processed_steel", amount: 5 }],
    workers: 5
});

for (let location = 0; location < savegame.location.length; location++) {
    const element = savegame.location[location];
    if (element) console.log(element);

}


function randomEvent() {
    switch (ranInt(1, 3)) {
        case 1: strikeEvent(); break;
        case 2: disatserEvent(); break;
        case 3: marketChangeEvent(); break;
    }
}
function strikeEvent() {
    let amount_factory = ranInt(1, savegame.location.length / 2);
    let amount_decrease = ranInt(10, 60);
    let affected_factorys = [];

    let output = "";
    output += "amount_factory: " + amount_factory + "<br>";
    output += "amount_decrease: " + amount_decrease + "<br>";

    for (let i = 0; i < affected_factorys.length; i++) {
        output += affected_factorys[i] + "<br>";
    }

    overlay("Streik in der Arbeiterschaft!", "Beischreibung", [], []);
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

    let opt1Element = overlay_html.find("#option1");
    let opt2Element = overlay_html.find("#option2");

    if (option1) opt1Element.text(option1).css({ "display": "block" });
    else opt1Element.css({ "display": "none" });
    
    if (option2) opt2Element.text(option2).css({ "display": "block" });
    else opt2Element.css({ "display": "none" });

}

function ranInt(frist, last) {
    return Math.floor(Math.random() * last) + frist;
}


$(document).ready(function () {
    loadSavegame();
});




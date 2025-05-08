class Factory {
    constructor({ name, requirements = [], output = [], workers = 0 }) {
        this.name = name;
        this.requirements = requirements;
        this.output = output;
        this.workers = workers;
    }
}

export const mine = new Factory({
    name: "Bergbau",
    requirements: [{}],
    output: [{ type: "raw_material", amount: 10 }],
    workers: 8
});

export const farm = new Factory({
    name: "Farm",
    requirements: [{}],
    output: [{ type: "fabrics", amount: 8 }],
    workers: 5
});

export const equipment = new Factory({
    name: "Ausrüstung",
    requirements: [{ type: "raw_material", amount: 5 }, { type: "fabrics", amount: 5 }],
    output: [{ type: "equipment_material", amount: 8 }],
    workers: 5
});

export const steel = new Factory({
    name: "Stahlgießerei",
    requirements: [{ type: "raw_material", amount: 5 }],
    output: [{ type: "steel", amount: 5 }],
    workers: 5
});

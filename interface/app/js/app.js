class event {
    random() {
        switch (random_Number(1, 3)) {
            case 1: this.strike(); break;
        }
    }
    strike() {

    }
    ecodisatser() {

    }

    marketchange() {
        
    }
}

class player {
    
    constructor(name, kredits, ressource) {
        this.name = name;
        this.kredits = kredits;
        this.ressource = ressource;
    }
}


$(document).ready(function () {

    const current_player = new player("test", 100, 0);
    const app = new event();

});

function random_Number(frist, last) {
    return Math.floor(Math.random() * last) + frist;
}
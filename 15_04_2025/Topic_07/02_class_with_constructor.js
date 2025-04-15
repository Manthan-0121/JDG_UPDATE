class Car {
    constructor(name, year) {
        this.name = name;
        this.year = year;
    }
}

const myCar1 = new Car("Ford", 2014);
const myCar2 = new Car("Audi", 2019);

console.log("First Car is :" + myCar1.name + " in " + myCar1.year + " Years");
console.log("Second Car is :" + myCar2.name + " in " + myCar2.year + " Years");

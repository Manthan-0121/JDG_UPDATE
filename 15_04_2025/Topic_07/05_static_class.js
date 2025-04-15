class Car {
    constructor(name) {
        this.name = name;
    }
    static hello() {
        return "Hello!!!!";
    }
}

const myCar = new Car("Ford");

// You can call 'hello()' on the Car Class:
console.log(Car.hello());
const obj = {
    fname: "Manthan",
    lname: "Mistry",
    position: "Developer",
    education: "MCA",
    fullname: function () {
        return this.fname + " " + this.lname;
    }

};

console.log("First Name is " + obj.fname);
console.log();
console.log();
console.log("Add new property to object");
obj['company'] = "JDG";
console.log("New company is " + obj['company']);


let fullname = obj.fullname();
console.log("Full name is " + fullname);

console.log("Delete property from object");
delete obj['company'];
console.log("New company is " + obj['company']);
console.log("Company is deleted from object");

// nested object
myObj = {
    name: "John",
    age: 30,
    myCars: {
        car1: "Ford",
        car2: "BMW",
        car3: "Fiat"
    }
}

console.log();
console.log();
// get mycar value first
console.log("First car is: " + myObj.myCars.car1);
console.log("Second car is: " + myObj.myCars.car2);
console.log("Third car is: " + myObj.myCars.car3);

// assign() method
console.log(Object.assign(obj, myObj));

// constructor
// const person = {
//     firstName: "John",
//     lastName: "Doe",
//     age: 50,
//     eyeColor: "blue"
// };

// console.log(person.constructor);


// Create an Object:
const personobj = {
    firstName: "John",
    lastName: "Doe"
};

// Create new Object
const man = Object.create(personobj);
man.firstName = "Peter";
console.log(man.firstName);


// add new multiple properties
Object.defineProperties(personobj,{
    age:{value: "23"},
    city:{value:"New York"}
});

console.log("age is "+personobj.age);

Object.defineProperty(personobj, "language", {value:"En"})

console.log("Language is :"+personobj.language);
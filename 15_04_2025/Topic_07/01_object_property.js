
// Create an Object:
const personobj = {
    firstName: "John",
    lastName: "Doe"
};


//add new only one Property
Object.defineProperty(personobj, "language", { value: "En" })

console.log("Language is :" + personobj.language);



const account = {
    _balance: 1000
};

Object.defineProperty(account, 'balance', {
    get() {
        return this._balance;
    },
    set(amount) {
        if (amount >= 0) this._balance = amount;
    },
    enumerable: true,
    configurable: true
});

account.balance = 1500;
console.log(account.balance); // 1500
// console.log(account._balance);



// Strings have indices as enumerable own properties
console.log(Object.entries("foo")); // [ ['0', 'f'], ['1', 'o'], ['2', 'o'] ]

// Other primitives except undefined and null have no own properties
console.log(Object.entries(100)); // []


const arrd = [0, 1, 3];

Object.freeze(arrd);

try {
    "use strict";
    arrd[3] = 50;
    console.log();
} catch (err) {
    console.log(err);
}


const fruits = [
    ["apples", 300],
    ["pears", 900],
    ["bananas", 500]
];

const myObj = Object.fromEntries(fruits);
console.log(myObj.pears);
console.log(myObj);


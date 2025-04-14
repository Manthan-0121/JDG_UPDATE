const numbers = [45, 4, 9, 16, 25];
let txt = "";
numbers.forEach(myFunction);

function myFunction(value) {
    console.log(value);
}

console.log();
console.log("map() method");

const numbers1 = [45, 4, 9, 16, 25];
console.log(numbers1.map(myFunction1));
function myFunction1(value) {
    return value * 2;
}

console.log();
console.log("flatMap() method");
const myArr = [1, 2, 3, 4, 5, 6];
console.log(myArr.flatMap((x) => x * 2));

console.log();
console.log("reduce() method");

const numbersre = [45, 4, 9, 16, 25];
console.log(numbers.reduce(myFunctionre));

function myFunctionre(total, value) {
    return total + value;
}


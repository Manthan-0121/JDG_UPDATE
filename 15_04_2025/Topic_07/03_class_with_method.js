class person {
    constructor(name, dob_year) {
        this.name = name;
        this.dob_year = dob_year;
    }
    age() {
        const date = new Date();
        return date.getFullYear() - this.dob_year;
    }
}

const person_info = new person("Manthan Mistry", 2002);

console.log("My name is : " + person_info.name + "and age is : " + person_info.age());
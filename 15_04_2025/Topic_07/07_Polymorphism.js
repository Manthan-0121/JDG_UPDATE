class Animal {
    speak() {
        return "Animal makes a sound";
    }
}

class Dog extends Animal {
    speak() {
        return "Dog barks";
    }
}

class Cat extends Animal {
    speak() {
        return "Cat meows";
    }
}

const animal_obj = new Animal();
console.log(animal_obj.speak());

const dog_obj = new Dog();
console.log(dog_obj.speak());

const cat_obj = new Cat();
console.log(cat_obj.speak());

// Define the win, lost or draw from a Rock, paper or Scissors game

const rps = (p1, p2) => {
    
    if (p1 == p2) {
        return 'Draw!'
    } else {

        if (p1 == "rock" && p2 == "scissors") {
            return 'Player 1 won!'
        }else if (p1 == "scissors" && p2 == "rock"){
            return 'Player 2 won!'
        }

        if (p1 == "scissors" && p2 == "paper") {
            return 'Player 1 won!'
        }else if (p1 == "paper" && p2 == "scissors"){
            return 'Player 2 won!'
        }

        if (p1 == "paper" && p2 == "rock") {
            return 'Player 1 won!'
        }else if (p1 == "rock" && p2 == "paper"){
            return 'Player 2 won!'
        }
    }

};


// Returns the double of an Array

function maps(x){
    let double = []
    for(let i = 0; i < x.length; i++) double[i] = x[i] * 2;
      return double;
}


// Calculates the number of paper to write in function of the documentation

function paperwork(n, m) {
    let num;
    if (n <= 0 || m <= 0){
      return 0
    }

    else{
      num = n*m
    }
    return num
}

// Removes the first and last character from a String

function removeChar(str){
    str = str.slice(1,- 1);
    return str;
};

// For each Dragon must be 2 bullets for be defeated, so, Hero will survive if there are 7 bullets and 4 dragons?

function hero(bullets, dragons){
    if (bullets < dragons * 2) {
        return false
    }
    else if (bullets > dragons){
        return true
    }
    else {
        return false
    }
}

// Delete vowels from String
function disemvowel(str) {
    str = str.replace(/[aeiou]/gi, "");
    return str;
}

// Operations based on the signs

function basicOp(operation, value1, value2){

  switch (operation) {
    case '+':
        let sum = value1 + value2
        return sum

    case '-':
        let less = value1 - value2
        return less

    case '*':
        let mul = value1 * value2
        return mul
    
    case '/':
        let div = value1 / value2
        return div
  
    default:
        return 'Unkonwn Sign'
  }
}

// Split String into Array

function stringToArray(string){
    let arrayStr = []
    arrayStr = string.split(" ")
    return arrayStr;
}

// Remove spaces from a String

function noSpace(x){
    return x.replace(/[" "]/g, "");
}

// Number of petals even or odd defines if Timmy and Sara are in love <3

function lovefunc(flower1, flower2){
    if (flower1 % 2 == 0 && flower2 % 2 != 0 || flower1 % 2 != 0 && flower2 % 2 == 0) {
        return true
    } else{
        return false
    }
}



function nbYear(p0, percent, aug, p) {
    percent = 1 + percent / 100
    let anualGrowing = (p0 * percent) + aug
    let expectedGrowing = anualGrowing / p
    return expectedGrowing;
}

// Make a number negative if it's positive

function makeNegative(num) {
    if (num < 0) {
      return num
    }else{
      return Number(-num)
    }
}

function hoopCount (n) {
    return n >= 10 ? "Great, now move on to tricks" : "Keep at it until you get it"
}

function solution(str){
    if(str.length % 2 == 0) {
      return str.split("");
    }
    else {
        return str.split("")
    }
 }

console.log(solution("Hol"));

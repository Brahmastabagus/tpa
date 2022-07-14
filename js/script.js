var plus = document.getElementById("plus");
var plus2 = document.getElementById("plus2");
var plus3 = document.getElementById("plus3");
var plus4 = document.getElementById("plus4");
var plus5 = document.getElementById("plus5");

var min = document.getElementById("min");
var min2 = document.getElementById("min2");
var min3 = document.getElementById("min3");
var min4 = document.getElementById("min4");
var min5 = document.getElementById("min5");

var cardzBody = document.getElementById("cardzBody");

var displayToggle = document.getElementById("displayToggle");
var displayToggleHead = document.getElementById("displayToggleHead");
// 
var displayToggle2 = document.getElementById("displayToggle2");
var displayToggleHead2 = document.getElementById("displayToggleHead2");
// 
var displayToggle3 = document.getElementById("displayToggle3");
var displayToggleHead3 = document.getElementById("displayToggleHead3");
// 
var displayToggle4 = document.getElementById("displayToggle4");
var displayToggleHead4 = document.getElementById("displayToggleHead4");
// 
var displayToggle5 = document.getElementById("displayToggle5");
var displayToggleHead5 = document.getElementById("displayToggleHead5");

function plusFunction(data){
    if(data == 1){
        console.log(1)
        plus.classList.add("dNone");
        min.classList.add("dBlock");
        displayToggleHead.classList.add("cardActive");
        displayToggle.classList.add("dBlock");
    }

    if(data == 2){
        console.log(2)
        plus2.classList.add("dNone");
        min2.classList.add("dBlock");
        displayToggleHead2.classList.add("cardActive");
        displayToggle2.classList.add("dBlock");
    }

    if(data == 3){
        plus3.classList.add("dNone");
        min3.classList.add("dBlock");
        displayToggleHead3.classList.add("cardActive");
        displayToggle3.classList.add("dBlock");
    }

    if(data == 4){
        console.log(4)
        plus4.classList.add("dNone");
        min4.classList.add("dBlock");
        displayToggleHead4.classList.add("cardActive");
        displayToggle4.classList.add("dBlock");
    }

    if(data == 5){
        console.log(5)
        plus5.classList.add("dNone");
        min5.classList.add("dBlock");
        displayToggleHead5.classList.add("cardActive");
        displayToggle5.classList.add("dBlock");
    }
}

function minFunction(data){
    if(data == 1){
        plus.classList.remove("dNone");
        min.classList.remove("dBlock");
        displayToggleHead.classList.remove("cardActive");
        displayToggle.classList.remove("dBlock");
    }

    if(data == 2){
        plus2.classList.remove("dNone");
        min2.classList.remove("dBlock");
        displayToggleHead2.classList.remove("cardActive");
        displayToggle2.classList.remove("dBlock");
    }

    if(data == 3){
        plus3.classList.remove("dNone");
        min3.classList.remove("dBlock");
        displayToggleHead3.classList.remove("cardActive");
        displayToggle3.classList.remove("dBlock");
    }

    if(data == 4){
        plus4.classList.remove("dNone");
        min4.classList.remove("dBlock");
        displayToggleHead4.classList.remove("cardActive");
        displayToggle4.classList.remove("dBlock");
    }

    if(data == 5){
        plus5.classList.remove("dNone");
        min5.classList.remove("dBlock");
        displayToggleHead5.classList.remove("cardActive");
        displayToggle5.classList.remove("dBlock");
    }

} 
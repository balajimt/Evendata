function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    
    document.getElementById("sideDrawer").style.color = "rgba(0, 0, 0, 0.4)";
    document.getElementById("main").style.marginLeft = "250px";
    
    document.getElementById("mySidenav").style.fontSize = "25px";
    
    document.body.style.backgroundColor = "rgb(60, 60, 60)";
    
}

function closeNav() {
   
   document.getElementById("mySidenav").style.fontSize = "0px";
     document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "#2e2c2c";
    
    document.getElementById("sideDrawer").style.color = "black";
    
}

function hover(element) {
    element.setAttribute('src', 'images/homeover.png');
}
function unhover(element) {
    element.setAttribute('src', 'images/home.png');
}

function hoverPower(element) {
    element.setAttribute('src', 'images/powerOff.png');
}
function unhoverPower(element) {
    element.setAttribute('src', 'images/power.png');
}
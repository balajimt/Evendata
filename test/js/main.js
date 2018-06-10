function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    
    document.getElementById("sideDrawer").style.color = "rgba(0,0,0,0.4)";
    document.getElementById("main").style.marginLeft = "250px";
    
    document.getElementById("mySidenav").style.fontSize = "25px";
    
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    
}

function closeNav() {
   
   document.getElementById("mySidenav").style.fontSize = "0px";
     document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "#2e2c2c";
    
    document.getElementById("sideDrawer").style.color = "black";
    
}

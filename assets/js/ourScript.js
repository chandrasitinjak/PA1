/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function navFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function dropFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
  }
}

function dropFunctionRight() {
    document.getElementById("myDropdown-right").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn-right')) {
    var myDropdownRight = document.getElementById("myDropdown-right");
      if (myDropdownRight.classList.contains('show')) {
        myDropdownRight.classList.remove('show');
      }
  }
}

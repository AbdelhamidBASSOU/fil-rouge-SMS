/*!
 * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2022 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }

  
});



let email = document.getElementById("email")
let email_error = document.getElementById("email_error")

let password = document.getElementById("password")
let password_error = document.getElementById("password_error")


let submit = document.getElementById("submit")



// password Input validation  : 
submit.addEventListener("click", (e) => {
    if (password.value == "") {
        e.preventDefault();
        password.setAttribute("style", "color:red; border: 1px red solid ;");
        password_error.innerText = "Veuillez entrer Une password"
        password_error.setAttribute("style", "color:red;font-size:10px;");
    } else {
        password.setAttribute("style", "color:black; border: 1px green solid ;");
        password_error.innerText = "";
    }
})

// email Input Validation :
submit.addEventListener("click", (e) => {
        if (email.value == "" || !(/^[a-zA-Z_0-9]{3,}@[a-zA-Z]{3,}[.]{1}[a-z]{2,4}$/).test(email.value)) {
            e.preventDefault();
            email.setAttribute("style", "color:red; border: 1px red solid ;");
            email_error.innerText = "Veuillez entrer Un titre valide qui contient au moins 3 caractéres ! "
            email_error.setAttribute("style", "color:red;font-size:10px;");
        } else {
            email.setAttribute("style", "color:black; border: 1px green solid ;");
            email_error.innerText = "";
        }
    })
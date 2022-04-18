
//get the submit button element of the form
const signup = document.querySelector(".signup_btn");
const login = document.querySelector(".login_btn");
//-------get the input element 
const inputs = document.querySelectorAll("input");
const fname = document.querySelector(".fname");
const lname = document.querySelector(".lname");
const email = document.querySelector(".email");
const password = document.querySelector(".password");
const com_password = document.querySelector(".password2");
// -------get the paragraphs that will show the error
const fname_error = document.querySelector(".fname_error");
const lname_error = document.querySelector(".lname_error");
const email_error = document.querySelector(".email_error");
const password_error = document.querySelector(".pass_error");
const password_error2 = document.querySelector(".pass2_error");

//regex for email validation
const email_regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//regex for password validation
const password_regex = /^[a-zA-Z0-9]{6,}$/;
//regex for name validation
const name_regex = /^[a-zA-Z]{3,}$/;

signup.disabled=false;

inputs.forEach(input => {
    input.addEventListener("keyup", () => {
        validateEmail();
        validatePassword();
        validateName();
        validatelName();
        if(!(email_regex.test(email.value)) || !(password_regex.test(password.value)) || !(name_regex.test(fname.value)) || !(name_regex.test(lname.value))){
            signup.disabled=true;
        }else{
            signup.disabled=false;
        }
        if(password.value === com_password.value){
            com_password.classList.remove("error");
            password_error2.innerHTML = "";
        }else{
            com_password.classList.add("error");
            password_error2.innerHTML = "Password doesn't match";
            signup.disabled=true;
        }
    })
});

//email regex
function validateEmail() {
    if (email_regex.test(email.value)) {
        email.classList.remove("error");
        email_error.innerHTML = "";
    } else {
        email.classList.add("error");
        email_error.innerHTML = "Invalid email";
    }
}
function validatePassword() {
    if (password_regex.test(password.value)) {
        password.classList.remove("error");
        password_error.innerHTML = "";
        
    } else {
        password.classList.add("error");
        password_error.innerHTML = "Invalid password";
    }
}
function validateName() {
    if (name_regex.test(fname.value)){
        fname.classList.remove("error");
        fname_error.innerHTML = "";
    } else {
        fname.classList.add("error");
        fname_error.innerHTML = "Invalid name";
    }
}
function validatelName() {
    if (name_regex.test(lname.value)) {
        lname.classList.remove("error");
        lname_error.innerHTML = "";
    } else {
        lname.classList.add("error");
        lname_error.innerHTML = "Invalid name";
    }
}



//function to get current date and time
function getDateTime() {
    var now     = new Date(); 
    var year    = now.getFullYear();
    var month   = now.getMonth()+1; 
    var day     = now.getDate();
    var hour    = now.getHours();
    var minute  = now.getMinutes();
    var second  = now.getSeconds(); 
    if(month.toString().length == 1) {
        var month = '0'+month;
    }
    if(day.toString().length == 1) {
        var day = '0'+day;
    }   
    if(hour.toString().length == 1) {
        var hour = '0'+hour;
    }
    if(minute.toString().length == 1) {
        var minute = '0'+minute;
    }
    if(second.toString().length == 1) {
        var second = '0'+second;
    }   
    var dateTime = year+'/'+month+'/'+day+' '+hour+':'+minute+':'+second;   
    return dateTime;
}
getDateTime()












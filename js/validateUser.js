const nameInput = document.querySelector('#name')
const emailInput = document.querySelector('#email')
const passwordInput = document.querySelector('#pass')
const repasswordInput = document.querySelector('#repass')
const registerInput = document.querySelector('#register-btn')
const nameError = document.querySelector('#name-error')
const printError = document.querySelector('#pass-error')
const printLengthError = document.querySelector('#pass-length-error')
const emailError = document.querySelector('#email-error')

nameInput.addEventListener('change', nameCheck)
registerInput.addEventListener('click', checkPassword)
passwordInput.addEventListener('blur', checkPasswordLength)
registerInput.addEventListener('click', checkEmailEmpty)
emailInput.addEventListener('blur', checkEmail)
registerInput.addEventListener('click', registerUser)

function nameCheck(){
    if(nameInput.value === ''){
        nameError.innerHTML = '<p>Name cannot be empty'
    } else{
        nameError.style.display = 'none'
        return true
    }
}
function checkPassword(e){
    e.preventDefault()
    if(passwordInput.value !== repasswordInput.value){
        printError.innerHTML = "<p>Passwords do not match</p>"
    } else{
        printError.style.display = 'none'
        return true
    }
}

function checkPasswordLength(){
    if(passwordInput.value.length >= 8){
        printLengthError.style.display = 'none'
        return true
    } else{
        printLengthError.style.display = 'block'
        printLengthError.innerHTML = "<p>Password should be atleast <br> 8 characters long</p>"
    }
}

function checkEmailEmpty(e){
    e.preventDefault()
    if(emailInput.value == ''){
        emailError.innerHTML = '<p>Email cannot be empty</p>'
    }
    else{
        emailError.style.display = 'none'
        return true
    }
}

function checkEmail(){
    const emailRegex =  	
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    if(!emailRegex.test(emailInput.value)){
        emailError.innerHTML = '<p>Please enter a valid email</p>'
    } else{
        emailError.style.display = 'none'
        return true
    }
}

function registerUser(e){
    e.preventDefault()
    if(checkPassword(e) && checkPasswordLength() && checkEmail() && checkEmailEmpty(e)){
        document.querySelector('#register-form').submit()
    }
}
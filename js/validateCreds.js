const usernameInput = document.querySelector('#username')
const passInput = document.querySelector('#password')
const loginInput = document.querySelector('#login-btn')
const nameError = document.querySelector('#name-error')
const printLengthError = document.querySelector('#pass-length-error')

usernameInput.addEventListener('change', nameCheck)
passInput.addEventListener('change', checkPasswordLength)

function nameCheck(){
    if(usernameInput.value !== ''){
        nameError.style.display = 'none'
        return true   
    } else{
        nameError.innerHTML = '<p>Userame cannot be empty</p>'
    }
}

function checkPasswordLength(){
    if(passInput.value.length >= 8){
        printLengthError.style.display = 'none'
        return true
    } else{
        printLengthError.style.display = 'block'
        printLengthError.innerHTML = "<p>Password should be atleast <br> 8 characters long</p>"
    }
}



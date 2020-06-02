function emailIsValid(email){
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
}

function isEmpty(input){
    return input == true;
}

function verifyForm(form){
    if(isEmpty(form.name.value) || isEmpty(form.telephone.value) || isEmpty(form.email.value)){
        alert("Fill all the form!");
        return false;
    }else if(!emailIsValid(form.email.value)){
        alert("Use a valid email address!");
        return false;
    }
    return true;
}   



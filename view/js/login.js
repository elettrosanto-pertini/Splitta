const accedi = document.getElementById('login-btn');
const username = document.getElementById('nameField');
const password = document.getElementById('passwordField');

//enableDisable del bottone
function enableDisable(){
    if(username.value.trim() != "" && password.value.trim() != ""){
        accedi.disabled = false;
    }else if(username.value.trim() == "" || password.value.trim() == ""){
        accedi.disabled = true;
    }
}

document.addEventListener('DOMContentLoaded', ()=>{
    document.querySelectorAll('#nameField, #passwordField').forEach((element)=>{
        element.addEventListener('keyup', ()=>{
            enableDisable();
        });
    });
});

accedi.addEventListener('click', ()=>{

    const usr = username.value;
    const pwd = password.value;

    data = {usr, pwd}

    options = {
        method: 'POST',
        headers:{
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }

    fetch('../../api/login.php', options)
    .then(response=>response.json())
    .then(oggetto=>alert(oggetto.message))
    .then(()=>window.location='../pages/starter.php')
    .catch(error=>alert(error));
});
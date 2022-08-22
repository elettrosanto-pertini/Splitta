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

    fetch('../../api/User/login.php', options)
    .then(response=>response.json())
    .then(oggetto=>alert(oggetto.message))
    .then(()=>window.location='../pages/starter.php')
    .catch(error=>alert(error));
});


// function rightStringLength(stringa, lunghezza){
//     if(stringa.length > lunghezza){
//         return false
//     }

//     return true
// }

// username validation: max 127 caratteri, solo lettere, numeri, _ , - .
username.addEventListener('input', (event)=>{
    let aiuto = document.querySelector('#username-help')
    aiuto.classList = ''
    aiuto.textContent = ''

    if(!rightStringLength(event.target.value, 127)){
        aiuto.textContent = 'Lunghezza massima: 127 caratteri'
        aiuto.classList.add('help','is-danger')

        event.target.value = event.target.value.substring(0,127)
    }else{

        if(/[^\w\-]/g.test(event.target.value)){
            event.target.value = event.target.value.replace(/[^\w\-]/g, '')
            aiuto.textContent = 'Caratteri consentiti: lettere, numeri, \'_\' , \'-\''
            aiuto.classList.add('help','is-danger')
        }
    }
})

password.addEventListener('input', (event)=>{
    let aiuto = document.querySelector('#password-help')
    aiuto.classList = ''
    aiuto.textContent = ''

    if(!rightStringLength(event.target.value, 200)){
        aiuto.textContent = '200 caratteri possono bastare!'
        aiuto.classList.add('help','is-danger')

        event.target.value = event.target.value.substring(0,201) 
    } 
})
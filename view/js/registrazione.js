const username = document.getElementById('username');
const password = document.getElementById('password');
const email = document.getElementById('email');
const iscrivitiBtn = document.getElementById('iscriviti-btn');

function enableDisable(){
    if(username.value.trim() != "" && password.value.trim() != "" && email.value.trim() != ""){
        iscrivitiBtn.disabled = false;

    }else if(username.value.trim() == "" || password.value.trim() == "" || email.value.trim() == ""){
        iscrivitiBtn.disabled = true;

    }
}

document.addEventListener('DOMContentLoaded', ()=>{
    document.querySelectorAll('#username, #password, #email').forEach((element)=>{
        element.addEventListener('keyup', ()=>{
            enableDisable();
        });
    });
});

function registra(){

    // creo pacchetto di dati 'rozzi'
    const usr = username.value;
    const pwd = password.value;
    const mail = email.value;

    data = {usr, pwd, mail};

    let options = {
        method:'POST',
        headers: {
            'Content-type': 'application/json'
        },
        body: JSON.stringify(data)
    };

    fetch('../../api/User/register.php', options)
    .then(response=>response.json())
    .then((oggetto)=>{
        alert(oggetto.message);
        window.location = '../pages/'+oggetto.result
    })
    .catch(err=>alert(err));

    username.value = '';
    password.value = '';
    email.value = '';
    
};
const aggiungiBtn = document.getElementById('aggiungi-btn');
const userSearchEl = document.getElementById('user-search');
const inviteListEl = document.getElementById('invite_list');

let invitedArray = [];


/*************************************SEZIONE AGGIUNTA INVITATI************************************************* */
const tableRow = `
    <tr>
        <td class="m-0" id="@" onclick="eliminaUser(this)"><button class="button is-small is-danger p-0" style="height:1.25rem; width:1.25rem" type="button">&times;</button></td>
        <td id="name-@"></td>
    </tr>`
;

function eliminaUser(questo){
    invitedArray.splice(invitedArray.indexOf(questo.id),1);
    questo.closest('tr').remove();
}


function updateInviteList(array){
    array.forEach(element => {
        let newTableRow = tableRow.replace(/@/g, element);
        inviteListEl.innerHTML = inviteListEl.innerHTML + newTableRow;
        document.getElementById('name-'+element).textContent = element;
    });
}


aggiungiBtn.addEventListener('click', ()=>{
    if(userSearchEl.value == ''){
        alert('Magari inserisci un username prima, coglione.');
    }else{

        let usr = userSearchEl.value

        let data = {usr};

        let options = {
            method: 'POST',
            headers:{
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }

        fetch('../../api/User/existance_check.php', options)
        .then(response => response.json())
        .then(oggetto => {
            if(oggetto.result === true){
                invitedArray.push(data.usr);
                inviteListEl.innerHTML = '';
                updateInviteList(invitedArray);
                userSearchEl.value = '';
            }else if(oggetto.result === false){
                alert('L\'utente cercato non esiste! Riprova con un altro username.')
            }else if(oggetto.result === 2){
                alert('Non ha molto senso aggiungere se stessi, non trovi?')
            }
        })
        .catch(error=>alert(error));
    }
});
/**********************************************************************************************************************/


/********************************************SEZIONE CREAZIONE ISTANZA GROUPS**********************************************************/

const totalCreditData = 0.00;

const confermaBtn = document.getElementById('conferma_btn');

confermaBtn.addEventListener('click', ()=>{
    if(invitedArray.length === 0){
        alert('Magari invita qualcuno, genio.')
    }else{
        const nomeGruppoEl = document.getElementById('nome_gruppo');
        const nomeGruppoData = nomeGruppoEl.value;
        const sizeData = invitedArray.length + 1;

        let data = {nomeGruppoData, sizeData, totalCreditData}
        let options = {
            method: 'POST',
            headers: {
                'Content-Type':'application/json'
            },
            body: JSON.stringify(data)
        }

        fetch('../../api/Group/create.php', options)
        .then(response=>response.json())
        .then(oggetto=>alert(oggetto.message))
        .then(()=>{
            let dati = {invitedArray, nomeGruppoData}
            let opzioni = {
                method: 'POST',
                headers: {
                'Content-Type':'application/json'
                },
                body: JSON.stringify(dati)
            }
            fetch('../../api/Invite/create.php', opzioni)
            .then(response=>response.json())
            .then(oggetto=>{
                if(oggetto.result === false){
                    alert(oggetto.message)
                }
            })
            .catch(error=>alert(error))
        })
        .then(()=>window.location = '../pages/gruppi.php')
        .catch(error=>alert(error));
    }
})

/**************************************************************************************************************************************/
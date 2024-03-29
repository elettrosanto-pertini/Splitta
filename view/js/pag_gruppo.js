const nomeGrouppoEl = document.querySelector('#nomeGruppo')
const rigaUtente = `
<div class="level p-2 hovera is-flex is-flex-wrap-nowrap">
    <div class="level-left nome-utente has-text-weight-bold"></div>
    <div class="level-right mt-0"></div>
</div>`

const noGroup = `<div class="container">
    <h3 class="title is-3">Nessun Gruppo</h3>
    <p id="warning-message" class="content">Injection riuscita alla perfezione, sei dentro i nostri sistemi. Ci arrendiamo a te, Sam Sepiol</p>
</div>` 

window.addEventListener('load', ()=>{
    fetch('../../api/Club/read_group.php')
    .then(response=>response.json())
    .then(oggetto=>{
        if(oggetto.result===true){
            nomeGrouppoEl.textContent = oggetto.group_name
            document.querySelector('#eliminaGruppo').id = oggetto.gruppo_id
            document.querySelector('#eliminaGruppo-effective').id = oggetto.gruppo_id

            oggetto.utenti.forEach(element=>{
                let outerDiv =document.createElement('div')
                outerDiv.classList = "level p-2 hovera is-flex is-flex-wrap-nowrap"

                let nomeLevel = document.createElement('div')
                nomeLevel.classList = 'level-left nome-utente has-text-weight-bold'
                outerDiv.append(nomeLevel)

                let balanceLevel = document.createElement('div')
                balanceLevel.classList = 'level-right mt-0'
                outerDiv.append(balanceLevel)

                outerDiv.firstChild.textContent = element.nome
                outerDiv.lastChild.textContent = element.balance+'€'
                document.querySelector('#vetrina').append(outerDiv)

            })
        }else{
            document.querySelector('#vetrina').innerHTML = noGroup
            document.querySelector('#group-btns').remove()
        }
    })
})

function deleteGroup(questo){
    let deletedId = questo.id

    let data = {deletedId}
    let options = {
        method:'DELETE',
        headers:{
            'Content-type':'application/json'
        },
        body: JSON.stringify(data)
    }

    fetch('../../api/Group/delete.php', options)
    .then(response=>response.json())
    .then(oggetto=>{
        alert(oggetto.message)
        if(oggetto.result===true){
            window.location = '../pages/gruppi.php'
        }else{
            window.location.reload()
        }
    })
}
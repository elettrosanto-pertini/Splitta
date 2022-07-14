const nomeGrouppoEl = document.querySelector('#nomeGruppo')
const rigaUtente = `
<div class="level p-2 hovera is-flex is-flex-wrap-nowrap">
    <div class="level-left nome-utente has-text-weight-bold"></div>
    <div class="level-right mt-0"></div>
</div>`

const noGroup = `<div class="container">
    <h3 class="title is-3">Nessun Gruppo</h3>
    <p id="warning-message" class="content">Wow, bravo! Il bimbo autistico sa smanettare con l'URL per fare l'HaCkEr ihihihi! Ora però per favore restituisci il PC ad un adulto, grazie</p>
</div>` 

window.addEventListener('load', ()=>{
    fetch('../../api/Club/read_group.php')
    .then(response=>response.json())
    .then(oggetto=>{
        if(oggetto.result===true){
            nomeGrouppoEl.textContent = oggetto.group_name
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
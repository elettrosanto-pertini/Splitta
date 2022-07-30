const trMockUp = `
<div class="box">
    <div class="level is-flex is-flex-wrap-wrap">
        <div class="level-right">
            <div class="is-flex is-flex-direction-column">
                <label class="label"><strong>nome spesa</strong></label>
                <p class="content mb-0"><strong>Da:</strong> <span>Utente1</span></p>
                <p class="content mb-0"><strong>Per:</strong> <span>Utente2</span></p>
                <p class="content mb-0"><strong>Data:</strong> <span>25-05-2022</span></p>
            </div>
        </div>
        <div class="level-left">
            <p class="content"><span>0.00</span>€</p>
        </div>
    </div>
</div>`


const trDestinatario = `
<label class="checkbox">
    <input type="checkbox" value="Utente1" id="Utente1" class="destinatario">
    Utente1
</label>`

const trMittente = `
<label class="radio mx-0">
    <input type="radio" value="Utente1" name="myMittente" class="mittente">
    Utente1
</label>
`

const bacheca = document.querySelector('#bacheca')
const destinatariEl = document.querySelector('#destinatari')
const mittenteEl = document.querySelector('#mittente')

window.addEventListener('load', ()=>{
    fetch('../../api/Transaction/read.php')
    .then(response=>response.json())
    .then(oggetto=>{
        oggetto.forEach(element=>{
            let newTransaction = trMockUp

            newTransaction = newTransaction.replace('nome spesa', element.tr_name)
            newTransaction = newTransaction.replace('Utente1', element.tr_payer_name)
            newTransaction = newTransaction.replace('Utente2', element.tr_receiver_name)
            newTransaction = newTransaction.replace('25-05-2022', element.tr_date)
            newTransaction = newTransaction.replace('0.00', Math.abs(element.tr_amount))

            bacheca.innerHTML = bacheca.innerHTML + newTransaction
        })
    })
    .then(()=>{
        fetch('../../api/Club/read_group.php')
        .then(response=>response.json())
        .then(oggetto=>{
            oggetto.utenti.forEach(element=>{
                let newDestinatario = trDestinatario
                let newMittente = trMittente

                newDestinatario = newDestinatario.replace(/Utente1/g, element.nome)
                newMittente = newMittente.replace(/Utente1/g, element.nome)

                destinatariEl.innerHTML = destinatariEl.innerHTML + newDestinatario
                mittenteEl.innerHTML = mittenteEl.innerHTML + newMittente
            })
        })
        .catch(error=>alert('OPS! C\'è stato un problema interno. Riprova più tardi. \n ERRORE: '+error))
    })
    .catch(error=>alert('OPS! C\'è stato un problema interno. Riprova più tardi. \n ERRORE: '+error))
})


// document.querySelector('#transactionBtn').addEventListener('click', ()=>{
//     let tuttiDestinatari = document.querySelectorAll('.destinatario')
//     let destinatariArray = []
//     let somma = document.querySelector('#somma').value

//     tuttiDestinatari.forEach(element=>{
//         if(element.checked === true){
//             destinatariArray.push(element.value)
//         }
//     })

//     let data = {destinatariArray, 'num_destinatari':destinatariArray.length, somma}
//     console.log(destinatariArray, data)
// })
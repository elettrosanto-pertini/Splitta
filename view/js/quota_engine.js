//const mittenteEl = document.querySelector('#mittente')
let nomeSpesa = document.querySelector('#nomeSpesa')
let sommaEl = document.querySelector('#somma')

let usersData
fetch('../../api/Club/read_group.php')
.then(response=>response.json())
.then(oggetto=>{
    usersData = oggetto.utenti
})
.catch(errore=>alert('OPS C\'è stato un problema interno. Riprova più tardi. \n ERRORE: '+errore))
.finally()


// CREAZIONE DELLA TRANSAZIONE

document.querySelector('#transactionBtn').addEventListener('click', ()=>{

    let tuttiDestinatari = document.querySelectorAll('.destinatario')
    let tuttiMittenti = document.querySelectorAll('.mittente')
    let destinatariArray = []
    let mittenteUsr = ''
    let somma = sommaEl.value
    

    tuttiMittenti.forEach(element=>{
        if(element.checked === true){
            mittenteUsr = element.value
        }
    })

    tuttiDestinatari.forEach(element=>{
        if(element.checked === true){
            destinatariArray.push(element.value)
        }
    })


    let data = {'mittente':mittenteUsr, destinatariArray, 'num_destinatari':destinatariArray.length, 'somma':parseFloat(somma)}
    // calculate quotas
    let frazione = parseFloat((data.somma/data.num_destinatari).toFixed(2))
    let quote = {}

    destinatariArray.forEach(element=>{
        if(element != mittenteUsr){
            quote[element]=-frazione
        }
    })

    if(destinatariArray.some(element=>element==mittenteUsr)){
        quote[mittenteUsr] = data.somma - frazione
    }else{
        quote[mittenteUsr] = data.somma
    }
    //console.log(quote)

    // GET group user data (needed: name, balance)(use read_group.php of Club control) --> fatto in cima con promise
    // modify balances with the calculated quotas
    
    usersData.forEach(element=>{
        if(element.nome in quote){
            element.balance = element.balance + quote[element.nome]
        }
    })

    //console.log(usersData)

    // POST them back (through Club model)
    let options = {
        method: 'POST',
        headers:{
            'Content-Type':'application/json'
        },
        body:JSON.stringify(usersData)
    }

    fetch('../../api/Club/update_balance.php', options)
    .then(response=>response.json())
    .then(oggetto=>{
        alert(oggetto.message)
        creaTransaction()
       // window.location.reload()
    })
    .catch(errore=>alert('OPS C\'è stato un problema interno. Riprova più tardi. \n ERRORE: '+errore))
    //.finally(window.location.reload())

    //C'è da aggiungere le transazioni nel DB
    function creaTransaction(){
        let package = {'tr_name':nomeSpesa.value, 'tr_payer_name':mittenteUsr}
        let trueDestinatari = destinatariArray.filter(dest=>dest!=mittenteUsr)
        
        trueDestinatari.forEach(element=>{
            package['tr_receiver_name'] = element
            package['tr_amount'] = quote[element]
            options = {
                method: 'POST',
                headers:{
                    'Content-Type':'application/json'
                },
                body:JSON.stringify(package)
            }
    
            fetch('../../api/Transaction/create.php', options)
            .then(response=>response.json())
            .then(oggetto=>{
                if(oggetto.result === false){
                    alert(oggetto.message)
                }
            })
            .then(()=>window.location.reload())
            // .finally(window.location.reload())
            .catch(errore=>alert('OPS C\'è stato un problema interno. Riprova più tardi. \n ERRORE: '+errore))
            
        })
        //window.location.reload()
    }
    
})

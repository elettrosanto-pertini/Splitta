const modalBtnEl = document.getElementById('tr_modal_btn');
const modalBoxEl = document.getElementById('tr_modal_box');

//apertura modal
modalBtnEl.addEventListener('click', ()=>{
    modalBoxEl.classList.add('is-active');
});

//chiusura modal
document.addEventListener('DOMContentLoaded', ()=>{
    document.querySelectorAll('.modal-background, .modal-close').forEach(element=>{
        element.addEventListener('click', ()=>{
            modalBoxEl.classList.remove('is-active');
        });
    });
});






// VALIDAZIONE: titolo della transazione
 
let aiuto = document.createElement('span')
document.querySelector('#nomeSpesa').closest('.field').append(aiuto)
document.querySelector('#nomeSpesa').addEventListener('input', (event)=>{
    aiuto.classList = ''
    aiuto.textContent = ''
    event.target.classList.remove('is-danger')

    if(!rightStringLength(event.target.value, 127)){
        aiuto.textContent = 'Lunghezza massima: 127 caratteri'
        aiuto.classList.add('help','is-danger')
        event.target.classList.add('is-danger')

        event.target.value = event.target.value.substring(0,127)
    }else{

        if(/[^\w\-\s]/g.test(event.target.value)){
            event.target.value = event.target.value.replace(/[^\w\-\s]/g, '')
            aiuto.textContent = 'Caratteri consentiti: lettere, numeri, \'_\' , \'-\''
            aiuto.classList.add('help','is-danger')
            event.target.classList.add('is-danger')
        }
    }
})


// VALIDAZIONE: somma della transazione

let newSpan = document.createElement('span')
document.querySelector('#somma').closest('.field').append(newSpan)
document.querySelector('#somma').addEventListener('input', (event)=>{
    let aiutoSomma = document.querySelector('#somma').closest('.field').lastChild
    aiutoSomma.classList = ''
    aiutoSomma.textContent = ''
    event.target.classList.remove('is-danger')

    if(!rightStringLength(event.target.value, 127)){
        aiutoSomma.textContent = 'Lunghezza massima: 127 caratteri'
        aiutoSomma.classList.add('help','is-danger')
        event.target.classList.add('is-danger')

        event.target.value = event.target.step
    }else{
        if(!event.target.validity.valid || event.target.validity.badInput){
            console.log('valedation message', event.target.validationMessage)
            
            event.target.value = event.target.step
            aiutoSomma.textContent = 'Caratteri consentiti: numeri, punto. Numero minimo: 0.01'
            aiutoSomma.classList.add('help','is-danger')
            event.target.classList.add('is-danger')
        }
    }    
})

// ENABLE DISABLE OF BUTTONS: attivare il bottone fine se tutti i campi sono riempiti

// controllo sui mittenti
function abbiamoIlMittente(){
    let mittenti = document.querySelectorAll('.mittente')
    let result = false
    
    mittenti.forEach(element=>{
        if(element.checked){
            result = true
        }
    })

    return result
}

// controllo sui destinatari
function abbiamoIDestinatari(){
    let mittenti = document.querySelectorAll('.destinatario')
    let result = false
    
    mittenti.forEach(element=>{
        if(element.checked){
            result = true
        }
    })

    return result
}

//nomeSpesa checker
const abbiamoTitolo = ()=>{
    return document.querySelector('#nomeSpesa').value === '' ? false : true
}

const abbiamoSomma = ()=>{
    return document.querySelector('#nomeSpesa').valueMissing ? false : true
}


function enableDisable(){
    if(abbiamoIlMittente() && abbiamoIDestinatari() && abbiamoTitolo() && abbiamoSomma()){
        document.querySelector('#transactionBtn').disabled = false
    }
}

document.addEventListener('change', ()=>{
    enableDisable()
})
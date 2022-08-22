[nomeGruppoEl, userSearchEl].forEach(element=>{
    let aiuto = document.createElement('span')
    element.closest('.field').append(aiuto)

    element.addEventListener('input', (event)=>{
        aiuto.classList = ''
        aiuto.textContent = ''
        event.target.classList.remove('is-danger')

        if(!rightStringLength(event.target.value, 127)){
            aiuto.textContent = 'Lunghezza massima: 127 caratteri'
            aiuto.classList.add('help','is-danger')
            event.target.classList.add('is-danger')

            event.target.value = event.target.value.substring(0,127)
        }else{

            if(/[^a-zA-Z\d\-\_]/g.test(event.target.value)){
                event.target.value = event.target.value.replace(/[^a-zA-Z\d\-\_]/g, '')
                aiuto.textContent = 'Caratteri consentiti: lettere, numeri, \'_\' , \'-\''
                aiuto.classList.add('help','is-danger')
                event.target.classList.add('is-danger')
            }
        }
    })

    element.addEventListener('focusout', (event)=>{
        aiuto.classList = ''
        aiuto.textContent = ''
        event.target.classList.remove('is-danger')
    })
})


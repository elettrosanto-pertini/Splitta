const mokupInvito = `
<div class="box">
    <div class="level is-flex is-flex-wrap-wrap">
        <div class="level-right">
            <div>
                <p class="content">Da: <span id="inviting-user" class="has-text-weight-bold">NomeInvitante</span><br>
                    Gruppo: <span id="new-group-name" class="has-text-weight-bold">NomeGruppo</span>
                </p>
            </div>
        </div>
        <div class="level-left">
            <div id="@" class="buttons">
                <button class="accetta button is-success" id="accetta">Accetta</button>
                <button class="rifiuta button is-danger">Rifiuta</button>
            </div>
        </div>
    </div>
</div>`

/***********************************FETCH DATI DA MOSTRARE A SCHERMO*********************************** */
window.addEventListener('load',()=>{
    fetch('../../api/Invite/read.php')
    .then(response=>response.json())
    .then(oggetto=>{
        if(oggetto.inviti.length===0){
            alert('Non ci sono inviti!')
        }else{
            oggetto.inviti.forEach(element=>{
                let newInvite = mokupInvito
                let bachehca = document.querySelector('#bacheca')

                newInvite = mokupInvito.replace("NomeInvitante", element.inviter_name)
                newInvite = newInvite.replace(/NomeGruppo/g, element.group_name)
                newInvite = newInvite.replace(/@/g, element.invite_id)

                bachehca.innerHTML = bacheca.innerHTML + newInvite
            })
        }
    })
    .catch(errore=>alert(errore))
})
/********************************************************************************************************** */


/****************************************RIFIUTA FUNCTION*******************************************/
setTimeout(()=>{
    document.querySelectorAll('.rifiuta').forEach(element=>{
        element.addEventListener('click',()=>{
            let closest = element.closest('div')
            let id = closest.id
    
            let data = {id}
            let options = {
                method: 'POST',
                headers:{
                    'Content-Type':'application/json'
                },
                body: JSON.stringify(data)
            }
    
            fetch('../../api/Invite/delete.php', options)
            .then(response=>response.json())
            .then(oggetto=>{
                alert(oggetto.message)
                window.location.reload()
            })
            .catch(errore=>alert(errore))
        })
    })

    document.querySelectorAll('.accetta').forEach(element=>{
        element.addEventListener('click', ()=>{
            let closest = element.closest('div')
            let id = closest.id
    
            let data = {id}
            let options = {
                method: 'POST',
                headers:{
                    'Content-Type':'application/json'
                },
                body: JSON.stringify(data)
            }

            
            fetch('../../api/Invite/read_single.php',options)
            .then(response=>response.json())
            .then(oggetto=>{
                let data2 = oggetto
                let options = {
                    method: 'POST',
                    headers:{
                        'Content-Type':'application/json'
                    },
                    body: JSON.stringify(data2)
                }

                fetch('../../api/Club/create.php', options)
                .then(response=>response.json())
                .then(oggetto=>{alert(oggetto.message)})
                .then(()=>{
                    let inviteId = data2.invite_id
                    let data3 = {"id":inviteId}
                    let options = {
                        method: 'POST',
                        headers:{
                            'Content-Type':'application/json'
                        },
                        body: JSON.stringify(data3)
                    }

                    fetch('../../api/Invite/delete.php', options)
                    .then(window.location.reload())
                    .catch(errore=>alert(errore))
                })
                .catch(errore=>alert(errore))
            })
            .catch(errore=>alert(errore))

        })
    })
}, 350)

/***************************************************************************************************/
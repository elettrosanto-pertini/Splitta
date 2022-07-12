const groupBoxMokup = `<div class="box">
<div class="level is-flex is-flex-wrap-wrap">
    <div class="level-right">
        <a href="pag_gruppo.php?gruppo_id=@&group_name=#" id="@" class="has-text-black al-gruppo">
            <div class="is-flex is-flex-direction-column">
                <p id="nome-@" class="content is-size-4">
                </p>
                <p class="content is-small">
                    Bilancio:€ <span id="bilancio-@"></span>
                </p>
            </div>
        </a>
    </div>
    <div class="level-left">
        <fugure class="image is-64x64">
            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.istockphoto.com%2Fphotos%2Ffairytale-landscape-picture-id870755932%3Fk%3D6%26m%3D870755932%26s%3D612x612%26w%3D0%26h%3DuZA-rk95HtQNJHXrEQewaBH9iAq3dlswIGcXNc-sDjQ%3D&f=1&nofb=1" alt="Splitta Logo">
        </figure>
    </div>
</div>
</div>`

const noGroup = `<div class="box">
    <h3 class="title is-3">Nessun Gruppo</h3>
    <p id="warning-message" class="content">Non stai partecipando a nessun gruppo :(</p>
</div>` 
/*  <div class="level-left">
        <a class="button is-danger is-small">
            <span class="icon">
                <i class="fas fa-times"></i>
            </span>
        </a>
    </div> */
let userGroups = [];
let bacheca = document.querySelector('#bacheca')

window.addEventListener('load', ()=>{
    fetch('../../api/Club/read.php')
    .then(response=>response.json())
    .then(oggetto=>oggetto.forEach(element=>userGroups.push(element)))
    .then(()=>{
        if(userGroups.length>0){
            for(let $i=0;$i<userGroups.length;$i++){
                let newBox = groupBoxMokup.replace(/@/g, userGroups[$i].group_id)  
                newBox = newBox.replace(/#/g, userGroups[$i].group_name)
            
                bacheca.innerHTML = bacheca.innerHTML + newBox
                document.getElementById('nome-'+userGroups[$i].group_id).textContent = userGroups[$i].group_name
                document.getElementById('bilancio-'+userGroups[$i].group_id).textContent = userGroups[$i].balance
            }
        }else{
            bacheca.innerHTML = noGroup;
        }
    })
    .catch(errore=>alert(errore))
})


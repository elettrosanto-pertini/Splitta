// const modalBtnEl = document.getElementById('tr_modal_btn');
// const modalBoxEl = document.getElementById('tr_modal_box');

// //apertura modal
// modalBtnEl.addEventListener('click', ()=>{
//     modalBoxEl.classList.add('is-active');
// });

// //chiusura modal
// document.addEventListener('DOMContentLoaded', ()=>{
//     document.querySelectorAll('.modal-background, .modal-close').forEach(element=>{
//         element.addEventListener('click', ()=>{
//             modalBoxEl.classList.remove('is-active');
//         });
//     });
// });


/****************************ELIMINA GRUPPO MODAL******************************/

const eliminaBtnEl = document.querySelector('#eliminaGruppo');
const eliminaBoxEl = document.querySelector('#eliminaGruppo_modal_box');

//apertura modal
eliminaBtnEl.addEventListener('click', ()=>{
    eliminaBoxEl.classList.add('is-active');
});

//chiusura modal
document.addEventListener('DOMContentLoaded', ()=>{
    document.querySelectorAll('.modal-background, .modal-close, .annulla-btn').forEach(element=>{
        element.addEventListener('click', ()=>{
            eliminaBoxEl.classList.remove('is-active');
        });
    });
});
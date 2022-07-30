// const burgerBtn = document.getElementById('burger-btn');
// const myNavEl = document.getElementById('myNav');
const accediBtnEl = document.getElementById('accediBtn');
const modalBoxEl = document.getElementById('modal-box');
const modalBackgroundEl = document.getElementById('modalBackground');

// burgerBtn.addEventListener('click', ()=>{
//     burgerBtn.classList.toggle('is-active');
//     myNavEl.classList.toggle('is-active');
// });

accediBtnEl.addEventListener('click', ()=>{
    modalBoxEl.classList.add('is-active');
});


document.addEventListener('DOMContentLoaded', ()=>{
    document.querySelectorAll('.modal-background, .modal-close').forEach((element)=>{
        element.addEventListener('click', ()=>{
            modalBoxEl.classList.remove('is-active');
            document.getElementById('passwordField').value = '';
            document.getElementById('nameField').value = '';
        })
    });
})
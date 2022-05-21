const burgerBtn = document.getElementById('burger-btn');
const navMenu = document.getElementById('myNav');

burgerBtn.addEventListener('click', ()=>{
    burgerBtn.classList.toggle('is-active');

    navMenu.classList.remove('ml-6');
    navMenu.classList.toggle('is-active');
});
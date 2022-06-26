const burgerBtn = document.getElementById('burger-btn');
const navMenu = document.getElementById('myNav');

const logOutBtn = document.getElementById('logOutBtn');

burgerBtn.addEventListener('click', ()=>{
    burgerBtn.classList.toggle('is-active');

    navMenu.classList.remove('ml-6');
    navMenu.classList.toggle('is-active');
});

logOutBtn.addEventListener('click', ()=>{
    fetch('../../api/logout.php')
    .then(response=>response.json())
    .then(oggetto=>alert(oggetto.message))
    .then(()=>window.location='../pages/index.php')
    .catch(error=>alert(error));
})
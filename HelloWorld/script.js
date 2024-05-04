const nome = document.querySelector('.nome');
const btn = document.querySelector('.btn');

btn.addEventListener('click',()=>{
    if(nome.value == 0) {
        alert('Antes me fala seu nome ne.');
    } else {
        alert(`Eai ${nome.value}, como estas?`);
    }
});
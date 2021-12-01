const select = document.querySelector('.select');
const dropdownList = document.querySelector('.dropdown-list');

const item = document.querySelector('.dropdown-list_item');

//AQUI EU VOU PEGAR O SELECT E ADD UM EVENTO DE CLICK

select.addEventListener("click", ()=>{
    dropdownList.classList.toggle("active");
});

item.forEach(o =>{
    o.addEventListener("click", ()=>{
        select.innerHTML = o.querySelector("label").innerHTML;
        dropdownList.classList.remove("active");
    })
})
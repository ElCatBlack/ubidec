//VALIDACION FORMULARIO
 const form = document.querySelector("form"),
 name =document.getElementById('nom'),
 ape =document.getElementById('apellido'),
 tel = document.getElementById('telefono');

function errorstyle(field){
    field.classList.add("error");//genera el class="error"
}

form.addEventListener('submit', e=>{
    e.preventDefault();//Evitar que el formulario se envíe automáticamente
    validateinputs();
});
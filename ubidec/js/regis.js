var eye1 = document.getElementById('eye1');
const password1 = document.getElementById('password1');
var eye2 = document.getElementById('eye2');
const password2 = document.getElementById('password2');
eye1.addEventListener("click", function(){
    if(password1.type == "password"){
        password1.type = "text"
        eye1.style.opacity=0.8
    }else{
        password1.type = "password"
        eye1.style.opacity = 0.3
    }
})

eye2.addEventListener("click", function(){
    if(password2.type == "password"){
        password2.type = "text"
        eye2.style.opacity=0.8
    }else{
        password2.type = "password"
        eye2.style.opacity = 0.3
    }
})


const form = document.querySelector("form"),
              name =document.getElementById('nom'),
              ape =document.getElementById('apellido'),
              tel = document.getElementById('telefono'),
              correo = document.getElementById('correo'),
              error = document.getElementById('error');
//cambia el estilo de color del input si da error
function errorstyle(field){
    field.classList.add("error");//genera el class="error"
}

form.addEventListener('submit', e=>{
    e.preventDefault();//Evitar que el formulario se envíe automáticamente
    validateinputs();
});
//empieza la validacion
const validateinputs = ()=>{
    const namevalidate = name.value.trim();
    const apevalidate = ape.value.trim();
    const telvalidate = tel.value;
    const telvalue= /^\d+$/;
    const correovalidate= /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    const correovalue = correo.value.trim();
    const password1value = password1.value.trim();
    const password2value = password2.value.trim();
    //elimina en los inputs la class="error" en caso que esten bien los campos
    document.querySelectorAll(".error").forEach(field=> field.classList.remove("error"));
    //deteccion de codigo html
    function containsHTML(str) {
        var doc = new DOMParser().parseFromString(str, "text/html");
        return Array.from(doc.body.childNodes).some(node => node.nodeType === 1); // 1 es el tipo de nodo para elementos
    }
    if (containsHTML(namevalidate) || containsHTML(apevalidate) || containsHTML(telvalidate) || containsHTML(correovalue) || containsHTML(password1value) || containsHTML(password2value)) {
        error.innerHTML='<div class="mensajes">Por favor ingrese bien los datos.</div>'
        return;
    }
    //campos vacios
    if(namevalidate === ''   || apevalidate==='' || correovalidate==='' || password1value === ''){
        error.innerHTML='<div class="mensajes">COMPLETA TODOS LOS DATOS</div>'
        errorstyle(name);
        errorstyle(ape);
        errorstyle(correo);
        errorstyle(password1);
        errorstyle(password2);
        return;
    }
    //validar el telefono
    if(telvalidate !=='' && !telvalue.test(telvalidate)){//si no esta vacio verifica que se halla puesto solo numeros
        error.innerHTML='<div class="mensajes">INGRESA SOLO NUMEROS</div>'
        errorstyle(tel);
        return;
    }
    //validar correo
    //si correovalidate es falso
    if(!correovalidate.test(correovalue)){
        error.innerHTML='<div class="mensajes">CORREO NO VALIDO</div>'
        errorstyle(correo);
        return;
    }
    //si la contraseña es corta
    if(password1value.length < 6){
        error.innerHTML='<div class="mensajes">LAS CONTRASEÑAS DEBE CONTENER ALMENOS 6 CARÁCTERES</div>'
        errorstyle(password1);
        return;
    }
    //si las contraseñas no coinciden
    if(password1value !== password2value){
        error.innerHTML='<div class="mensajes">LAS CONTRASEÑAS NO COINCIDEN</div>'
        errorstyle(password1);
        errorstyle(password2);
        return;
    }

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "sistem/guardar.php", true);
        xhr.onload= ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    const response = xhr.responseText;
                    if(response === "ok"){
                        window.location.href='session.php';
                    }else{
                        error.innerHTML = `<div class="mensajes">${response}</div>`;
                    }
                    
                }else{
                    error.innerHTML='<div class="mensajes">ERROR EN LA CONSULTA</div>'
                }
            }
        }
        //xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        let formData = new FormData(form);//se crea una variable que recopila los datos de los campos
        xhr.send(formData);//hace el envio del formulario
}





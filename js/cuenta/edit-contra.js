function eye(){
    var eye1 = document.getElementById('eye1');
    const password1 = document.getElementById('password1');
    var eye2 = document.getElementById('eye2');
    const password2 = document.getElementById('password2');
    var eye3 = document.getElementById('eye3');
    const password3 = document.getElementById('password3');
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

    eye3.addEventListener("click", function(){
        if(password3.type == "password"){
            password3.type = "text"
            eye3.style.opacity=0.8
        }else{
            password3.type = "password"
            eye3.style.opacity = 0.3
        }
    })
}

//VALIDACION
function formc(){
    const form = document.querySelector("form");
    form.addEventListener('submit', e=>{
        e.preventDefault();//Evitar que el formulario se envíe automáticamente
        validarPassword();
    });
}

function errorstyle(field){
    field.classList.add("error");//genera el class="error"
}

function validarPassword() {
    const password1 = document.getElementById("password1"),
    password2 = document.getElementById("password2"),
    password3 = document.getElementById("password3");

    var contraseñaActual = password1.value.trim();
    var nuevaContraseña = password2.value.trim();
    var confirmarContraseña = password3.value.trim();

    document.querySelectorAll(".error").forEach(field=> field.classList.remove("error"));

    var errorElement = document.getElementById("error1");
    var errorElement2 = document.getElementById("error2");

    if (contraseñaActual === "" || nuevaContraseña === "" || confirmarContraseña === "") {
        errorElement.innerHTML = '<img src="icons/exclamacion.png"> Por favor, complete todos los campos.';
        errorstyle(password1);
        errorstyle(password2);
        errorstyle(password3);
        return;
    }

    if (nuevaContraseña !== confirmarContraseña) {
        errorElement2.innerHTML = '<img src="icons/exclamacion.png"> Las contraseñas nuevas no coinciden.';
        errorstyle(password2);
        errorstyle(password3);
        return;
    }

    errorElement.innerHTML = ""; // Limpiar el mensaje de error si todo es válido
    errorElement2.innerHTML = "";

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "sistem/cuenta/edit-cuenta/edit-cont.php", true);
    xhr.onload= ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                const response = xhr.responseText;
                if(response === "ok"){
                    console.log(response)
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

var eye = document.getElementById('eye');
var input = document.getElementById('input');

eye.addEventListener("click", function(){
    if(input.type == "password"){
        input.type = "text"
        eye.style.opacity=0.8
    }else{
        input.type = "password"
        eye.style.opacity = 0.3
    }
})

const form = document.querySelector("form"),
error = document.getElementById('error');

form.addEventListener('submit', e=>{
    e.preventDefault();//Evitar que el formulario se envíe automáticamente

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "sistem/login.php", true);
    xhr.onload= ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                const response = xhr.responseText;
                if(response.includes("ok")){
                    window.location.href='index.php';
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
});


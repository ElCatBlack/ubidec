//BOTONES AL COSTADO
let dinamic = -1
const confiItem = document.querySelectorAll('.confi-item'),
                confiContent = document.querySelectorAll(".confi-content");
//foreach es un bucle
confiItem.forEach((listElement, index) =>{
    
    listElement.addEventListener('click', ()=>{//al hacer click activa la funcion
        confiItem.forEach(listElement=>{listElement.classList.remove('active')});//remueve la clase active
        listElement.classList.add('active'); // se agrega la clase active
        
    })
})

//
const confiItem = document.querySelectorAll('.confi-item');
const confiContent = document.querySelector(".confi-content");

confiItem.forEach((listElement, index) => {
  listElement.addEventListener('click', () => {
    confiItem.forEach(listElement => {
      listElement.classList.remove('active');
    });

    listElement.classList.add('active');

    // Elimina el contenido existente dentro de confiContent
    confiContent.innerHTML = '';

    // Crea y agrega el nuevo contenido según el índice del elemento clicado
    switch (index) {
      case 0:
        confiContent.innerHTML = '<div class="profile-content"></div>';
        break;
      case 1:
        confiContent.innerHTML = '<div class="password-content"></div>';
        break;
      case 2:
        confiContent.innerHTML = '<div class="institucion-content"></div>';
        break;
      case 3:
        confiContent.innerHTML = '<div class="configuracion-content"></div>';
        break;
      case 4:
        confiContent.innerHTML = '<div class="help-support"></div>';
        break;
      case 5:
        confiContent.innerHTML = '<div class="politic-privacity"></div>';
        break;
      default:
        break;
    }
  });
});

//
//foreach es un bucle
confiItem.forEach((listElement)=>{
    
  listElement.addEventListener('click', ()=>{//al hacer click activa la funcion
    confiItem.forEach(listElement=>{listElement.classList.remove('active')});//remueve la clase active
    listElement.classList.add('active'); // se agrega la clase active
    ajax("sistem/cuenta/confi.php");
  })
})

function ajax(url, code) {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", url, true);
  xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
              let data = xhr.response;
              confiContent.forEach((element) => {
                  element.innerHTML = data;
              });
          }
      }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("code=" + encodeURIComponent(code));
}

const submibtn = document.getElementById('guardar');
submibtn.onclick=()=>{
    let xhr = new XMLHttpRequest();//se crea una variable xhr y el XMLHttpRequest se encarga de solitar envios a un servidor(en este caso seria la base) y recibir respuesta
    xhr.open("POST", "sistem/guardar.php", true);//xhr.open establece parametros para la solicitud XMLHttpRequest  que seria (method, URL, booleano) como es true se siguira ejecutando el codigo de abajo
    xhr.onload = ()=>{//cuando la solicitud es correcta va a cargar lo siguiente
        if(xhr.readyState === XMLHttpRequest.DONE){//si XMLHttpRequest .readyState verifica si alcanza cierto valor y verifica la solicitud, esta desde el 0 al 4. como decimos que es igual a XMLHttpRequest.DONE(done tiene valor como 4 ) DONE quiere decir que la solicitud se completo
            if(xhr.status === 200){//si esta condicion verifica el estado de xhr es 200  lo que quiere decir que la conexion y la respuesta del servidor a sido exitosa (hay otros numeros que lanza diferetes respuesta con el servidor como error 404 etc)
                window.location.href='session.php';
            }else{
                error.innerHTML='<div class="mensajes">ERROR EN LA CONSULTA</div>'
            }
        }
    }
    let formData = new FormData(form);//se crea una variable que recopila los datos de los campos
    xhr.send(formData);//hace el envio del formulario
}
//AUMENTAR TAMAÑO TEXTAREA
//descripcion
var desc = document.getElementById('desc');
desc.addEventListener("keyup", e =>{
    desc.style.height = `102px`;
    let scHeight = e.target.scrollHeight;
    desc.style.height = `${scHeight}px`;
})
//requisitos
var reque = document.getElementById('reque');
reque.addEventListener("keyup", e =>{
    reque.style.height = `52px`;
    let scHeight = e.target.scrollHeight;
    reque.style.height = `${scHeight}px`;
})


//MODALIDADES
//ajax trae las modalidades
function option() {
  const selectMenus = document.querySelectorAll(".select-menu");
  selectMenus.forEach((optionMenu,valor) => {
    const select = optionMenu.querySelector(".options");
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'sistem/modalidad.php', true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          select.innerHTML = data;
          selectoption(optionMenu,valor); // una ves traido los datos se llama la funcion selectoption
        } else {
          console.error('Error encontrar los datos');
        }
      }
    };
    xhr.send();
  });
}

option();//se llama el ajax para cuando cargue la pagina traiga los datos

//selecciona una modalidad
function selectoption(optionMenu,valor) {
  //llamo las variables
  const selectBtn = optionMenu.querySelector(".select-btn");
  const options = optionMenu.querySelectorAll(".option");
  const sBtn_text = optionMenu.querySelector(".sBtn-text");
  const btnimg = optionMenu.querySelector(".btn-img");

  selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));//al hacer click sobre el boton de seleccionar activa la funcion del menu al darle un class="active" o borrar la clase

  options.forEach((option)=> {//selecciona todos las modalidades y se guarda en option
    option.addEventListener("click", () => {//al hacer click sobre alguna modalidad
      let selectedOption = option.querySelector(".option-text").innerText;//el texto que esta dendro de la modalidad seleccionada se guarda en selectedOption
      sBtn_text.innerText = selectedOption;//el texto de selecciona titulo se actualiza por la modalidad seleccionada

      let imgOption = option.getAttribute('data-img'); // se obtiene la ruta de la imagen de la modalidad
      btnimg.setAttribute('src', imgOption); // actualiza la ruta de la imagen del ?

      let titulos = document.getElementsByName('titulos[]')//se obtine el input oculto
      let idval = option.value//se optiene el valor de la id de la opcion seleccionada
      //console.log(valor)

      titulos[valor].value = idval

      optionMenu.classList.remove("active");
    });
  });

  document.addEventListener("click", (event) => {
    const target = event.target;//se obtiene el evento caundo hacemos click
    if (!target.closest(".select-btn")&& !target.closest(".option")){//closest busca el elemento padre
      optionMenu.classList.remove("active");
    }
});

}

//VALIDACION DATOS

//variables campos a validar
const coords = document.getElementById('coordenadas'),
              direc = document.getElementById('direccion'),
              tel = document.getElementById('telefono'),
              correo = document.getElementById('correo'),
              red1 = document.getElementById('face'),
              red2 = document.getElementById('insta'),
              red3 = document.getElementById('whats'),
              red4 = document.getElementById('twit'),
              red5 = document.getElementById('yout'),
              web = document.getElementById('sitioweb'),
              title = document.getElementById('title-insti'),
              cue = document.getElementById('cue'),
              horario = document.querySelectorAll('input[name="horarios[]"]');
              descrip = document.getElementById('desc'),
              director = document.getElementById('director'),
              subdirector = document.getElementById('subdirector'),
              secretario = document.getElementById('secretario'),
              //cuenta = document.getElementById(''),
              requesi = document.getElementById('reque');
//console.log()

//funcion estilo de error
function errorstyle(field){
    field.classList.add("error");
}

//funcion de validacion
const form = document.querySelector("form");

form.addEventListener('submit', e=>{
  e.preventDefault();//Evitar que el formulario se envíe automáticamente

  validateinsti();
  //window.location.reload();
});

const validateinsti = ()=> {
    const validatecoords = coords.value.trim();
    const validatedirec = direc.value.trim();
    const validatetel = tel.value.trim();
    const telvalue= /^\d+$/;
    const validatecorreo = correo.value.trim();
    const correovalue= /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    const validatered1 = red1.value;
    const validatered2 = red2.value;
    const validatered3 = red3.value;
    const validatered4 = red4.value;
    const validatered5 = red5.value;
    const validateweb = web.value;
    const urlvalue = /^(https?:\/\/)?([\w-]+\.)+[\w-]+(\/[\w- ./?%&=]*)?$/;
    const validatetitle = title.value.trim();
    const validatecue = cue.value.trim();
    const validatedescrip = descrip.value.trim();
    const validatedirector =director.value.trim();
    const validatesubdirector = subdirector.value.trim();
    const validatesecretario = secretario.value.trim();
    const validatereque = requesi.value.trim();

    var errorElement = document.getElementById("error1");
    
  //elimina en los inputs la class="error" en caso que esten bien los campos
  document.querySelectorAll(".error").forEach(field=> field.classList.remove("error"));

  //campos vacios
  if(validatecoords === '' ||   validatedirec === '' || validatetel === '' || telvalue === '' || validatecorreo === '' || validatetitle === ''|| validatecue === ''|| validatedescrip === ''|| validatedirector === ''|| validatesubdirector === ''|| validatesecretario === ''|| validatereque === ''){
    errorElement.innerHTML = '<img src="icons/exclamacion.png"> Por favor, complete todos los campos obligatorios.';
    errorstyle(coords);
    errorstyle(direc);
    errorstyle(tel);
    errorstyle(correo);
    errorstyle(title);
    errorstyle(cue);
    errorstyle(descrip);
    errorstyle(director);
    errorstyle(subdirector);
    errorstyle(secretario);
    errorstyle(requesi);
    return;
  }
  //validar el telefono
  if(validatetel !=='' && !telvalue.test(validatetel)){
    errorElement.innerHTML = '<img src="icons/exclamacion.png"> Número de télefono no valido.';
    errorstyle(tel);
    return;
  }
  //validar correo
  //si correovalidate es falso
  if(!correovalue.test(validatecorreo)){
    errorElement.innerHTML = '<img src="icons/exclamacion.png"> Correo electronico no valido.';
    errorstyle(correo);
    return;
  }
  //validar las redes
  if(validatered1 !=='' && !urlvalue.test(validatered1)){
    errorElement.innerHTML = '<img src="icons/exclamacion.png"> URL no valida.';
    errorstyle(red1);
    return;
  }
  if(validatered2 !=='' && !urlvalue.test(validatered2)){
    errorElement.innerHTML = '<img src="icons/exclamacion.png"> URL no valida.';
    errorstyle(red2);
    return;
  }
  if(validatered3 !=='' && !urlvalue.test(validatered3)){
    errorElement.innerHTML = '<img src="icons/exclamacion.png"> URL no valida.';
    errorstyle(red3);
    return;
  }
  if(validatered4 !=='' && !urlvalue.test(validatered4)){
    errorElement.innerHTML = '<img src="icons/exclamacion.png"> URL no valida.';
    errorstyle(red4);
    return;
  }
  if(validatered5 !=='' && !urlvalue.test(validatered5)){
    errorElement.innerHTML = '<img src="icons/exclamacion.png"> URL no valida.';
    errorstyle(red5);
    return;
  }
  if(validateweb !=='' && !urlvalue.test(web)){
    errorElement.innerHTML = '<img src="icons/exclamacion.png"> URL no valida.';
    errorstyle(web);
    return;
  }
  //verificar horarios
  let checkboxChecked = false;
  for (const checkbox of horario) {
    if (checkbox.checked) {
      checkboxChecked = true;
      break; // Si uno está seleccionado, no es necesario seguir recorriendo
    }
  }
  if(!checkboxChecked){
    //ninguno seleccionado
    for (const checkbox of horario) {
      errorElement.innerHTML = '<img src="icons/exclamacion.png"> Seleccione un horario.';
      errorstyle(checkbox);
    }
    return;
  }

  errorElement.innerHTML = ""; 

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "sistem/guardarinstitu.php", true);
  xhr.onload= ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              const response = xhr.responseText;
              if(response === "ok"){
                  console.log(response)
              }else{
                errorElement.innerHTML = `<div class="mensajes">${response}</div>`;
              }

          }else{
            errorElement.innerHTML='<div class="mensajes">ERROR EN LA CONSULTA</div>'
          }

      }
  }
  //xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  let formData = new FormData(form);//se crea una variable que recopila los datos de los campos
  xhr.send(formData);//hace el envio del formulario
}
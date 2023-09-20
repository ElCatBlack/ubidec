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

// const form = document.querySelector("form");

// form.addEventListener('submit', e=>{
//   e.preventDefault();//Evitar que el formulario se envíe automáticamente
//   window.location.reload();
// });
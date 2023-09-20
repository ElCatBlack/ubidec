// //FILTRO DESPLEGABLE
// const filter = document.querySelectorAll('.filter');
// //foreach es un bucle
// filter.forEach(listElement =>{
//     listElement.addEventListener('click', ()=>{//al hacer click activa la funcion
        
//         listElement.classList.toggle('active');//agrega class= active

//         let height = 0;
//         let menu = listElement.nextElementSibling;//selecciona los subitems adentro del div filtro
//         //console.log(menu.clientHeight) obtiene la altura
//         if(menu.clientHeight == "0"){//si la altura es 0 
//             height= menu.scrollHeight;//cambia el valor alto minimo
//         }
//         menu.style.height = `${height}px`//cuando no es 0 lo pone el valor en cero
//     })
// })

// //FILTRO CHECKBOX
// let arrow = document.querySelectorAll('.item-li');

// arrow.forEach(items =>{
//     items.addEventListener("click", () =>{//al hacer click activa la funcion
//         items.classList.toggle("checked");//agrega class= checked
//     })
// })

function trespuntitos(){

    let dinamic = -1
    const  puntito = document.querySelectorAll('.school-option'),
                  dropdown = document.querySelectorAll('.dropdown1');
    //el index de la funcion permite diferenciar y asociar los puntito y dropdown
    puntito.forEach((buton, index)=>{
        //let isDropdownOpen = false // variable para declarar un estado falso
        buton.addEventListener('click', ()=>{
            if(dinamic==index){//if(isDropdownOpen) //si esta activo debe borrar
                dropdown[index].innerHTML = '';//borra el contenido
                dinamic = -1;//se devuelve el valor -1 para aclarar que no hay ningun elemento activo
            }else{//si no esta activo significa que a echo un nuevo click y genera el html
                const dropdownhtml = '<ul class="dropdown"><li class="menu-li"><img src="icons/compartir.png" alt=""> compartir</li><li class="menu-li"><img src="icons/bandera.png" alt="">denunciar</li>';
                dropdown[index].innerHTML = dropdownhtml; //se genera el html
                if(dinamic !=-1){//si habia un elemento activo previamente
                    dropdown[dinamic].innerHTML='';//borra su contenido
                }
                dinamic = index;//establece un nuevo elemento activo
            }
            //isDropdownOpen =!isDropdownOpen; //alterna los estados del drop de true a false y asi
        })
    })
    document.addEventListener("click", (event) => {
        const target = event.target;//se obtiene el evento caundo hacemos click
        if (!target.closest(".school-option") && !target.closest(".dropdown")){//si el usuario no hizo click sobre el dropmenu
            dropdown.forEach((item) => {//creo una funcion llamada item
                item.innerHTML = "";//
            });
            dinamic = -1;//se devuelve el valor -1 para aclarar que no hay ningun elemento activo
        }
    });
}

//RECIBIR INSTITUCION
//variable donde se van a cragar las escuelas
instiBox = document.querySelector(".load-insti");

function insti() {//creamos una funcion llamada insti en la que nos va a servir para traer los datos del ajax
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `sistem/recibir-insti.php`, true);//trae los datos con el archivo php
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
      if (xhr.status === 200) {//si la solicitud es correcta
         let data = xhr.response;//la variable data guarda los resultados que obtuvo en xhr.reponse
         //console.log(data)
             instiBox.innerHTML = data;//genero el html del echo del php
             
      } else {
        console.error('Error encontrar los datos');
      }
      trespuntitos();
      link();
    };
  }
  xhr.send();
}
insti();

function link(){//funcio que abre la institucion detallada
  // Obtén todos los elementos con la clase "image-direccion"
const Links = document.querySelectorAll(".image-direccion, .title-direccion");

// Agrega un evento de clic a cada enlace de imagen
Links.forEach(link => {
    link.addEventListener("click", function(event) {
        event.preventDefault(); // Evita el comportamiento predeterminado del enlace

        // Obtén el valor del atributo data-id
        const institutoID = link.getAttribute("data-id");

        // Redirige a institucion.php con el ID del instituto como parámetro
        window.location.href = `noinstitucion.php?id=${institutoID}`;
    });
});
}

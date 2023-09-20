instiBox = document.querySelector(".load-insti");

//BUSCADOR
const searchbar = document.querySelector(".search-insti input"),
searchbtn = document.querySelector(".search-insti button");

//funcion del buscador
function performSearch(){
    let searchterm = searchbar.value;//se crea la variable searchterm que guarda los valores o lo que escribis en el input
    if(searchterm != ""){// si searchterm NO esta vacia se ejecuta el siguiente codigo
        searchbar.classList.add("active");//se agrega en el input la clase="active"
    }else{//en cambio si esta vacia 
        searchbar.classList.remove("active");//se le quita el active
    }
  //ajax que trae los institutos
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "sistem/buscador-insti.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                //console.log(data)
                instiBox.innerHTML = data;
                trespuntitos();
                link();
            }
        }
        
    }
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xhr.send("searchterm=" + searchterm);

}

// al presionar la tecla "Enter" en el input
searchbar.addEventListener("keyup", (event) => {
  if (event.key === "Enter") {
      performSearch(); // llama la funcion de busqueda cuando se presiona "Enter"
  }
});

// al hacer clic en el botón de búsqueda
searchbtn.addEventListener("click", () => {
  performSearch(); // llama la función de búsqueda cuando se hace clic en el botón
});

//FILTRO DESPLEGABLE
const filter = document.querySelectorAll('.filter');
//foreach es un bucle
filter.forEach(listElement =>{
    listElement.addEventListener('click', ()=>{//al hacer click activa la funcion
        
        listElement.classList.toggle('active');//agrega class= active

        let height = 0;
        let menu = listElement.nextElementSibling;//selecciona los subitems adentro del div filtro
        //console.log(menu.clientHeight) obtiene la altura
        if(menu.clientHeight == "0"){//si la altura es 0 
            height= menu.scrollHeight;//cambia el valor alto minimo
        }
        menu.style.height = `${height}px`//cuando no es 0 lo pone el valor en cero
    })
})

//FILTRO CHECKBOX
let arrow = document.querySelectorAll('.item-li');

arrow.forEach(items =>{
    items.addEventListener("click", () =>{//al hacer click activa la funcion
        items.classList.toggle("checked");//agrega class= checked

        const selectedOption = items.getAttribute("data-option");

        console.log(selectedOption)

    })
})
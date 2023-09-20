//PERFIL DROPDOWN
let dropprofile = document.querySelectorAll(".profile-confi")[0],
       dropbtn= document.querySelectorAll(".profile-dropdown-btn")[0];

dropbtn.addEventListener("click", ()=>{
    dropprofile.classList.toggle("active");
})
document.addEventListener("click", (event) => {
    const target = event.target;//se obtiene el evento caundo hacemos click
    if (!target.closest(".profile-dropdown")) {//closest busca el elemento padre
        dropprofile.classList.remove("active");
    }
});

//BOTONES AL COSTADO
const confiItem = document.querySelectorAll('.confi-item'),
                confiContent = document.querySelectorAll(".confi-content");
//foreach es un bucle
confiItem.forEach((listElement)=>{
    //al div le agrego un active para un diseño
    listElement.addEventListener('click', ()=>{//al hacer click activa la funcion
        confiItem.forEach(listElement=>{listElement.classList.remove('active')});//remueve la clase active
        listElement.classList.add('active'); // se agrega la clase active
        
    })
})

const btnCuenta = document.getElementById("btnCuenta");
const btnSeguridad = document.getElementById("btnSeguridad");
const btnInstitucion = document.getElementById("btnInstitucion");
const btnConfig = document.getElementById("btnConfig");
const btnSoporte = document.getElementById("btnSoporte");
const btnPrivacidad = document.getElementById("btnPrivacidad");

//AJAX DE LOS BOTONES
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
//ajax ayuda y soporte
function ajas(url, code) {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                
                confiContent.forEach((element) => {
                    element.innerHTML = data;
                    
                });
                activateFAQs()
                
            }
        }
    };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("code=" + encodeURIComponent(code));
}

//editar perfil ajax
function ajae(url, code) {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                
                confiContent.forEach((element) => {
                    element.innerHTML = data;
                    
                });
                formu();
            }
        }
    };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("code=" + encodeURIComponent(code));
}

//contraseña
function ajaxc(url, code) {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                
                confiContent.forEach((element) => {
                    element.innerHTML = data;
                    
                });
                eye();
                //validarFormulario();
                formc();
            }
        }
    };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("code=" + encodeURIComponent(code));
}

//Editar institucion
function ajaup(url, code) {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                
                confiContent.forEach((element) => {
                    element.innerHTML = data;
                    
                });
                link();
            }
        }
    };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("code=" + encodeURIComponent(code));
}

btnCuenta.addEventListener("click", () => {
    ajae("sistem/cuenta/detalles-cuenta.php");
});

btnSeguridad.addEventListener("click", () => {
    ajaxc("sistem/cuenta/contrasena.php");
});

btnInstitucion.addEventListener("click", () => {
    ajaup("sistem/cuenta/institucion.php");
});

btnConfig.addEventListener("click", () => {
    ajax("sistem/cuenta/confi.php");
});

btnSoporte.addEventListener("click", () => {
    ajas("sistem/cuenta/help-support.php");
    
});

btnPrivacidad.addEventListener("click", () => {
    ajax("sistem/cuenta/politics.php");
});

//ABRE LA INSTITUCION
function link(){//funcio que abre la institucion detallada
    // Obtén todos los elementos con la clase "image-direccion y title-direccion"
const Links = document.querySelectorAll(".btn-edit");
  
  // Agrega un evento de clic a cada enlace de imagen
Links.forEach(link => {
  link.addEventListener("click", function(event) {
    event.preventDefault(); // Evita el comportamiento predeterminado del enlace
  
      // Obtén el valor del atributo data-id
      const institutoID = link.getAttribute("data-id");
  
      // Redirige a institucion.php con el ID del instituto con el parámetro
       window.location.href = `updateinstitucion.php?id=${institutoID}`;

      });
  });
}
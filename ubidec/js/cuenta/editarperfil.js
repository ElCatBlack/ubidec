
//EXPANDIR PREGUNTAS
function activateFAQs() {
    const expand = document.querySelectorAll('.report');
    
    expand.forEach(listElement => {
      listElement.addEventListener('click', () => {
        listElement.classList.toggle('active');
        
        let height = 0;
        let menu = listElement.nextElementSibling;
        
        if (menu.clientHeight === 0) {
          height = menu.scrollHeight;
        }
        
        menu.style.height = `${height}px`;
      });
    });
  }


//EDITAR FORMULARIO

//BUTTON DE EDITAR MODAL

document.querySelector('.info-edit button').addEventListener('click', formus);
function formus(){
  let cerrar = document.querySelector(".cerrar-btn button");
  let dropmodal = document.querySelector(".modal");

  dropmodal.classList.add('active');
  
  cerrar.addEventListener('click', ()=>{
      dropmodal.classList.remove('active');
  })

}

function formu(){
    let editabrir = document.querySelector(".info-edit button");
    let cerrar = document.querySelector(".cerrar-btn button");
    let dropmodal = document.querySelector(".modal");

    editabrir.addEventListener('click', ()=>{
        dropmodal.classList.add('active');
    })
    cerrar.addEventListener('click', ()=>{
        dropmodal.classList.remove('active');
    })


}
window.document.addEventListener("click", (event) => {
  const target = event.target;
  if (!target.closest(".info-edit button, .modal-target")) {
    let dropmodal = document.querySelector(".modal");
    dropmodal.classList.remove("active");
  }
});



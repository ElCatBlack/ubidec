
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


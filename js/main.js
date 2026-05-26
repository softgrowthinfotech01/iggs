
const menuBtn = document.getElementById("igsMenuBtn");
const menu = document.getElementById("igsMenu");
if(menuBtn && menu){
    menuBtn.addEventListener("click", () => menu.classList.toggle("show"));
}
window.addEventListener("scroll", () => {
    const header = document.getElementById("igsHeader");
    if(header){
        header.style.boxShadow = window.scrollY > 20 ? "0 16px 45px rgba(7,24,39,.14)" : "0 10px 35px rgba(7,24,39,.08)";
    }
});
const popup = document.getElementById("igsPopup");
const closePopup = document.getElementById("igsPopupClose");
setTimeout(() => {
    if(popup && !sessionStorage.getItem("igsPopupClosed")){
        popup.classList.add("show");
    }
}, 1600);
if(closePopup){
    closePopup.addEventListener("click", () => {
        popup.classList.remove("show");
        sessionStorage.setItem("igsPopupClosed", "yes");
    });
}

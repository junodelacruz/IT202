const showHeader = document.getElementById("show");
const header = document.querySelector(".header");

showHeader.addEventListener("mouseover", mouseOver)
showHeader.addEventListener("mouseout", mouseOut)

function mouseOver() {
   header.style.visibility = "visible";
}

function mouseOut() {
    header.style.visibility = "hidden";
}
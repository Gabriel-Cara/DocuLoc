const dropArea = document.querySelector(".picture");
const imgView = document.querySelector(".picture__img");
const input = document.querySelector("#picture__input");

input.addEventListener("change", uploadImage);

function uploadImage() {
    let imgLink = URL.createObjectURL(input.files[0]);
    dropArea.style.backgroundImage = `url(${imgLink})`
    imgView.textContent = ""
}
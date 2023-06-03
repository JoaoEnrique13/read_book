//PREVIEW DA IMAGEM DA CAPA DO LIVRO
const inputImage = document.querySelector("[data-input-image]")
const labelImage = document.querySelector("[data-label-image]")
const previewImage = document.querySelector("[data-image-preview]")

// labelImage.addEventListener("click", ()=>{  
//   const [file] = inputImage.files;
//   previewImage.src = URL.createObjectURL(file);
// })



inputImage.onchange = () => {
    const [file] = inputImage.files;
    previewImage.src = URL.createObjectURL(file);
}
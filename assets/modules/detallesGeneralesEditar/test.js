 // Capturar el input de archivo y el botón
 const inputImagen = document.getElementById("input_imagen");
 const btnSubirImagen = document.getElementById("btn_subir_imagen");
 const preview = document.getElementById("preview_imagen");

 // Previsualización de la imagen seleccionada
 inputImagen.addEventListener("change", function () {
   const archivo = this.files[0];
   if (archivo) {
     const reader = new FileReader();
     reader.onload = function (e) {
       preview.innerHTML = `<img src="${e.target.result}" style="max-width: 100%; max-height: 200px;" alt="Previsualización" />`;
     };
     reader.readAsDataURL(archivo);
   } else {
     preview.innerHTML = "";
   }
 });

 // Enviar la imagen al servidor
 btnSubirImagen.addEventListener("click", function () {
   const archivo = inputImagen.files[0];
   if (!archivo) {
     alert("Por favor, selecciona una imagen primero.");
     return;
   }

   const formData = new FormData();
   formData.append("imagen", archivo);

   fetch("upload.php", {
     method: "POST",
     body: formData,
   })
     .then((response) => response.json())
     .then((data) => {
       if (data.success) {
         alert("¡Imagen subida exitosamente!");
       } else {
         alert("Hubo un error al subir la imagen: " + data.error);
       }
     })
     .catch((error) => {
       console.error("Error al subir la imagen:", error);
       alert("Ocurrió un error inesperado.");
     });
 });
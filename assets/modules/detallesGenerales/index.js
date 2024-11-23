var DETALLE_OBJ = {

}

export const detallasGenerales = (DETALLE_OBJ) => {


let urlParams = new URLSearchParams(window.location.search);

let not_print_agregar = true;
let not_print_eliminar = true;

if (urlParams.get('opcion') == "ver_libros_favoritos"){
not_print_agregar = "none";
}

if (!urlParams.get('opcion')){
not_print_eliminar = "none";
}

// console.log('resena:' + resena_personal);

descripcion = descripcion == 'undefined'? `Este libro, aunque aún no tiene una descripción detallada, guarda en sus
páginas una historia única esperando ser descubierta. A veces, las mejores aventuras son aquellas que no se pueden
resumir en unas pocas palabras. Te invitamos a abrir sus páginas y sumergirte en una narrativa que solo tú podrás
experimentar. ¿Qué secretos esconde? Solo al leerlo podrás saberlo.` : descripcion;
resena_personal = resena_personal == 'undefined' ? "Agrega un texto para tu resena" : resena_personal ;
imagen = imagen ? imagen : "http://localhost/PARCIALES/PARCIAL_4/assets/images/test_portada.jpg";

return `
  <div class="detalle_receta_contenedor row" style="background-size: 100% 100%;">
    
    <div class='detalle_contenedor_imagenes col'>
      <img class="detalle_contenedor_imagenes_img" src='.\assets\images\receta_presentacion.png' class="shadow">
      <img class="detalle_contenedor_imagenes_img" src='.\assets\images\receta_presentacion.png' class="shadow">
      <img class="detalle_contenedor_imagenes_img" src='.\assets\images\receta_presentacion.png' class="shadow">
    </div>

    <div class="detalle_receta_detalles col" style="position: relative;">
      <div class="detalle_receta_detalles_informacion col">

        <label class="detalle_receta_detalles_informacion_titulo row">

          <b>${titulo_receta}</b>

        </label>

        <div class="detalle_receta_detalles_informacion_descripcion">
          ${descripcion}

          Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam rem numquam, placeat repellat delectus cumque
          sed quidem. Incidunt, provident possimus error magnam eligendi totam id repudiandae ratione quisquam libero non.
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt nesciunt facere quo temporibus sapiente quasi
          rerum odit nobis accusamus dicta laudantium veniam distinctio iste, inventore voluptates error incidunt! Harum,
          sapiente.

        </div>

        <div class="detalle_receta_detalles_informacion_agregar pasos col">
          
          <div class="detalle_titulo_comentario"> Pasos: </div>

          <div class="pasos_receta">
            1. Aqui ira tu primera paso de receta.

          </div>

          <div class="row contenedor_agregar">
            <input class="text_area_pasos" id="text_area_ingredientes"></input>

            <svg style='display:${not_print_agregar}' id='agregar_favorito_${my_book_id}'
              onclick="agregar_favorito('${titulo_receta}', '${descripcion}','${imagen}', '${autor}', '${my_book_id}', '${my_book_id}')"
              class="clickeable" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
              class="bi bi-plus-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
              <path
                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg>

          </div>

        </div>

        <div class="detalle_receta_detalles_informacion_agregar ingredientes col">

          <div class="detalle_titulo_comentario"> Ingredientes: </div>

          <div class="pasos_receta">
            1. Aqui ira tu primer ingrediente de receta.

          </div>

          <div class="row contenedor_agregar">
            <input class="text_area_pasos" id="text_area_ingredientes"></input>

            <svg style='display:${not_print_agregar}' id='agregar_favorito_${my_book_id}'
              onclick="agregar_favorito('${titulo_receta}', '${descripcion}','${imagen}', '${autor}', '${my_book_id}', '${my_book_id}')"
              class="clickeable" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
              class="bi bi-plus-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
              <path
                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg>

          </div>

        </div>

        <div class="detalle_receta_detalles_informacion_otros col">
          <div class="detalle_receta_detalles_informacion_autor"><b>Autor del receta:</b> ${autor} </div>
          <div class="detalle_receta_detalles_informacion_anop"><b>Última Edición:</b> ${ano_publicacion} </div>
        </div>

      </div>

      <div class="contenedor_detalles_inf col">

        <div class="contenedor_detalles_inf_comentarios col">
          <div class="detalle_titulo_comentario"> Comentarios: </div>
          <div class="detalles_comentarios_usuarios"></div>
          <textarea id='text_area_detalle' text='' placeholder='${resena_personal}'></textarea>
        </div>

        <div class="contenedor_detalles_inf_opciones row">

          <svg style='display:${not_print_eliminar}' id="eliminar_favorito_${my_book_id}"
            onclick="eliminar_favoritos('${my_book_id}')" xmlns="http://www.w3.org/2000/svg" width="25" height="25"
            fill=" clickeable currentColor" class="clickeable bi bi-x-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
            <path
              d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
          </svg>

          <label style="font-weight: bold; display:${not_print_eliminar}"> Eliminar de favoritos</label>

          <svg style='display:${not_print_agregar}' id='agregar_favorito_${my_book_id}'
            onclick="agregar_favorito('${titulo_receta}', '${descripcion}','${imagen}', '${autor}', '${my_book_id}', '${my_book_id}')"
            class="clickeable" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
            class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
            <path
              d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
          </svg>

          <label style="font-weight: bold; display:${not_print_agregar}"> Agregar comentario</label>

        </div>

      </div>

      <div id='close_detalle' class="detalle_receta_close_tag" onclick='toggle_element("detalle")'>
        <svg class="clickeable" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white"
          class="bi bi-x-circle-fill" viewBox="0 0 16 16">
          <path
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
        </svg>
      </div>

    </div>

  </div>

`

}
export const detallasGeneralesEditar = (DETALLE_OBJ, id, comentarios, eliminar, agregar) => {
  let my_HTML = '';
  
  if(DETALLE_OBJ) {
    
    my_HTML = `
      <div class="detalle_receta_contenedor row" style="background-size: 100% 100%;">  
        
        <div class='detalle_contenedor_imagenes col'>
          <img class="detalle_contenedor_imagenes_img" src='./assets/images/receta_presentacion.png' class="shadow">
          <img class="detalle_contenedor_imagenes_img" src='./assets/images/receta_presentacion.png' class="shadow">
          <img class="detalle_contenedor_imagenes_img" src='./assets/images/receta_presentacion.png' class="shadow">
        </div>

        <div class="detalle_receta_detalles col" style="position: relative;">
          
          <div class="detalle_receta_detalles_informacion col margen_top">
        
            <input id="agregar_receta_titulo" class="detalle_receta_detalles_informacion_titulo row" placeholder='titulo'>
            <input id='agregar_receta_descripcion' class="detalle_receta_detalles_informacion_descripcion" placeholder='descripcion'>
              
            <div class="detalle_receta_detalles_informacion_agregar pasos col">
              
              <div class="detalle_titulo_comentario"> Pasos: </div>

              <div  class="pasos_receta">
                <table> <thead>
                    <tr> <th>#</th> <th>Paso</th></tr>
                </thead>
                  <tbody id="pasos_receta_{id}">  </tbody>
                </table>
              </div>

              <div class="row contenedor_agregar">
                <input class="text_area_pasos" id="text_area_pasos_{id}"></input>
                
                <svg style='display:{not_print_agregar}' id='agregar_favorito_{my_book_id}'
                  onclick="agregar_pasos('text_area_pasos_{id}', 'pasos_receta_{id}')"
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

              <div class="row pasos_receta">
                <table> <thead>
                  <tr> <th>#</th> <th>Ingrediente</th> <th>Cantidad</th> <th>Unidades </th></tr>
                </thead>
                  <tbody id="ingredientes_receta_{id}">  </tbody>
                </table>
              </div>

              <div class="row contenedor_agregar">

                <input class="text_area_ingredientes" id="text_area_ingredientes_{id}"></input>
                <input class="text_area_ingredientes" id="text_area_cantidades_{id}"></input>
                <input class="text_area_ingredientes" id="text_area_unidades_{id}"></input>

                <svg 
                
                  style='display:{not_print_agregar}' id='agregar_favorito_{my_book_id}'
                  onclick="agregar_ingredientes('text_area_ingredientes_{id}', 'ingredientes_receta_{id}', 'text_area_cantidades_{id}', 'text_area_unidades_{id}')"
                  class="clickeable" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                  class="bi bi-plus-circle" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                  
                </svg>

              </div>

              <select id="agregar_receta_tipo" name="color" height='50px'>
                
                <option value="" disabled selected>-- Selecciona una opción --</option>
                <option value="3">China</option>
                <option value="1">Pollo</option>
                <option value="2">Res</option>
                
              </select>

            </div>

          </div>

          <div class="contenedor_detalles_inf col" >

            <div class="contenedor_detalles_inf_comentarios col" style='display:${comentarios}'>
              <div class="detalle_titulo_comentario"> Comentarios: </div>
              <div class="detalles_comentarios_usuarios"></div>
              <textarea id='text_area_detalle' text='' placeholder='{resena_personal}'></textarea>
            </div>

            <div class="contenedor_detalles_inf_opciones row" style=''>

              <svg 
                style='display:${eliminar};'
                onclick="eliminar_favoritos('{DETALLE_OBJ.id}')" xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                fill="currentColor" class="clickeable bi bi-x-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
              </svg>

              <label style="display:${eliminar}; font-weight: bold;"> Eliminar de favoritos</label>

              <svg 
                style="display:${agregar};"
                onclick="agregar_receta()"
                class="clickeable" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                <path
                  d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
              </svg>

              <label style="font-weight: bold; display:${agregar};"> Agregar Receta</label>

            </div>

          </div>

          <div id='close_detalle' class="detalle_receta_close_tag" onclick='close_tag()'>
            <svg class="clickeable" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white"
              class="bi bi-x-circle-fill" viewBox="0 0 16 16">
              <path  d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
            </svg>
          </div>

        </div>
        
      </div>
    `
  }else{

    my_HTML = `
    <div class="detalle_receta_contenedor row" style="background-size: 100% 100%;">  
      
      <div class='detalle_contenedor_imagenes col'>
        <img class="detalle_contenedor_imagenes_img" src='./assets/images/receta_presentacion.png' class="shadow">
        <img class="detalle_contenedor_imagenes_img" src='./assets/images/receta_presentacion.png' class="shadow">
        <img class="detalle_contenedor_imagenes_img" src='./assets/images/receta_presentacion.png' class="shadow">
      </div>

      <div class="detalle_receta_detalles col" style="position: relative;">
        <div class="detalle_receta_detalles_informacion col margen_top">
       
          <input id="agregar_receta_titulo" class="detalle_receta_detalles_informacion_titulo row" placeholder='titulo'>
          <input id='agregar_receta_descripcion' class="detalle_receta_detalles_informacion_descripcion" placeholder='descripcion'>
            
          <div class="detalle_receta_detalles_informacion_agregar pasos col">
            
            <div class="detalle_titulo_comentario"> Pasos: </div>

            <div  class="pasos_receta">
              <table> <thead>
                  <tr> <th>#</th> <th>Paso</th></tr>
              </thead>
                <tbody id="pasos_receta_{id}">  </tbody>
              </table>
            </div>

            <div class="row contenedor_agregar">
              <input class="text_area_pasos" id="text_area_pasos_{id}"></input>
              
              <svg style='display:{not_print_agregar}' id='agregar_favorito_{my_book_id}'
                onclick="agregar_pasos('text_area_pasos_{id}', 'pasos_receta_{id}')"
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

            <div class="row pasos_receta">
              <table> <thead>
                <tr> <th>#</th> <th>Ingrediente</th> <th>Cantidad</th> <th>Unidades </th></tr>
              </thead>
                <tbody id="ingredientes_receta_{id}">  </tbody>
              </table>
            </div>

            <div class="row contenedor_agregar">

              <input class="text_area_ingredientes" id="text_area_ingredientes_{id}"></input>
              <input class="text_area_ingredientes" id="text_area_cantidades_{id}"></input>
              <input class="text_area_ingredientes" id="text_area_unidades_{id}"></input>

              <svg 
              
                style='display:{not_print_agregar}' id='agregar_favorito_{my_book_id}'
                onclick="agregar_ingredientes('text_area_ingredientes_{id}', 'ingredientes_receta_{id}', 'text_area_cantidades_{id}', 'text_area_unidades_{id}')"
                class="clickeable" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                
              </svg>

            </div>

            <select id="agregar_receta_tipo" name="color" height='50px'>
              
              <option value="" disabled selected>-- Selecciona una opción --</option>
              <option value="3">China</option>
              <option value="1">Pollo</option>
              <option value="2">Res</option>
              
            </select>

          </div>

        </div>

        <div class="contenedor_detalles_inf col" >

          <div class="contenedor_detalles_inf_comentarios col" style='display:${comentarios}'>
            <div class="detalle_titulo_comentario"> Comentarios: </div>
            <div class="detalles_comentarios_usuarios"></div>
            <textarea id='text_area_detalle' text='' placeholder='{resena_personal}'></textarea>
          </div>

          <div class="contenedor_detalles_inf_opciones row" style=''>

            <svg 
              style='display:${eliminar};'
              onclick="eliminar_favoritos('{DETALLE_OBJ.id}')" xmlns="http://www.w3.org/2000/svg" width="25" height="25"
              fill="currentColor" class="clickeable bi bi-x-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
            </svg>

            <label style="display:${eliminar}; font-weight: bold;"> Eliminar de favoritos</label>

            <svg 
              style="display:${agregar};"
              onclick="agregar_receta()"
              class="clickeable" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
              class="bi bi-plus-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
              <path
                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg>

            <label style="font-weight: bold; display:${agregar};"> Agregar Receta</label>

          </div>

        </div>

        <div id='close_detalle' class="detalle_receta_close_tag" onclick='close_tag()'>
          <svg class="clickeable" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white"
            class="bi bi-x-circle-fill" viewBox="0 0 16 16">
            <path  d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
          </svg>
        </div>

      </div>
      
    
    </div>
  `

  }

return my_HTML;


}
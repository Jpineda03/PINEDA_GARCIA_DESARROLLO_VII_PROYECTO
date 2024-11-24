/***
 * OBJ = { titulo, imagen, descripcion, autor, cantidad_estrellas + comentario}
 */

export const Receta = (OBJECT_RECETA) => {

    return `
        <div class="componente_receta row shadow clickeable">

            <img class="componente_recetas_imagen" src='./assets/images/receta_presentacion.png' class="shadow" height="100%">

            <div class="componente_receta_contenedor_der col" style="position: relative;">

                <div class="componente_receta_contenedor_der_sup col">

                    <label class="componente_receta_titulo row">

                        <b>{titulo_receta}</b>

                    </label>

                    <div class="componente_receta_descripcion">
                        {descripcion}

                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam rem numquam, placeat repellat delectus
                        cumque sed quidem. Incidunt, provident possimus error magnam eligendi totam id repudiandae ratione
                        quisquam
                        libero non. Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt nesciunt facere quo
                        temporibus
                        sapiente quasi rerum odit nobis accusamus dicta laudantium veniam distinctio iste, inventore voluptates
                        error incidunt! Harum, sapiente.

                    </div>

                </div>

                <div class="componente_receta_contenedor_der_inf row">

                    <div class="detalle_receta_detalles_informacion_autor"><b>Autor del receta:</b> {autor} </div>

                    <div class="componente_receta_stars">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                    </div>

                </div>

                

            </div>

        </div>

    `;
}
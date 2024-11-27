import { toggle_element, redirigir, HtmlEncode } from "./modules/funcionesGenerales/index.js";
import { request } from "./modules/request/index.js";
import { detallasGenerales } from "./modules/detallesGenerales/index.js";
import { Receta } from "./modules/Recetas/index.js";
import { contenedorRecetas } from "./modules/contenedorRecetas/index.js";
import { detallasGeneralesEditar } from "./modules/detallesGeneralesEditar/index.js";

var detalle = document.getElementById('detalle');
var contenido_dinamico = document.getElementById('contenido_dinamico');
var formulario_login = document.getElementById('formulario_login');

var arreglo_recetas = "";
var arreglo_recetas_detalle = "";

const urlParams = new URLSearchParams(window.location.search);

// VALORES POR DEFECTO DEL API DE GOOGLE BOOKS.
const API_RECETAS = 'http://localhost/PROYECTO/assets/php/listar_recetas.php';
const cantidad_receta = 40;
const libro_buscado = "php";

var array_pasos = [];
var array_ingredientes = [];
var AOBJ = {};
var filtro_tipo = 0;


const listar_recetas = async (id_tipo = "") => {

    let recetas = [];
    let HTML = "";
    let id = 0;

    
    let url = API_RECETAS;
   
    if (id_tipo !== "") {

        filtro_tipo = id_tipo;
        url += `?tipo=${id_tipo}`;  

    }else{

        url += `?tipo=${filtro_tipo}`;  

    }
     
    recetas = await request(url);
    
    contenido_dinamico.innerHTML = "";

    if( !recetas.error ){

        recetas.forEach(element => {
            
            HTML += Receta(element, id);
            id++;
        });

        cargar_contenido_dinamico(HTML);
        return await recetas.length;

    }else{
        return 0;
    }

}

const abrir_detalles = (OBJECT, id) => {
    detalle.innerHTML = "";
    toggle_element('detalle');
    detalle.innerHTML = detallasGenerales(OBJECT, id, 'none', "flex", 'none', "flex");
    AOBJ = OBJECT;
}

const agregar_ingredientes = (element_0, element_1, element_2, element_3) => {

    let my_value_1 = document.getElementById(element_0);
    let my_value_2 = document.getElementById(element_2);
    let my_value_3 = document.getElementById(element_3);
    let HTML = '';

    let my_container = document.getElementById(element_1);
    
    array_ingredientes.push({ "ingrediente" : my_value_1.value, "cantidad" :  my_value_2.value , "unidades" : my_value_3.value});

    if(array_ingredientes.length > 0){
        
        let x = 1;
        my_container.innerHTML = "";

        array_ingredientes.forEach(element => {

            my_container.innerHTML += `<tr> <td>${x}</td> <td>${element.ingrediente}</td> <td>${element.cantidad}</td> <td>${element.unidades}</td> </tr>`
                
            x++;
        });

    }
    
    my_value_1.value = "";
    my_value_2.value = "";
    my_value_3.value = "";

}

const agregar_pasos = (element_0, element_1) => {

    let my_value_1 = document.getElementById(element_0);
    let my_container = document.getElementById(element_1);
    
    
    array_pasos.push(my_value_1.value);

    if( array_pasos.length > 0){
        
        let x = 1;
        my_container.innerHTML = "";

        array_pasos.forEach(element => {
            
            my_container.innerHTML += `<tr> <td>${x}</td> <td>${element}</td> </tr>`;

            x++;
        });

    }
    
    my_value_1.value = "";

    
}

const agregar_nueva_receta = () => {
    contenido_dinamico.innerHTML = "";
    toggle_element('detalle');
    toggle_element('login')
    listar_recetas();
    detalle.innerHTML = detallasGeneralesEditar("", "", 'none', "none", 'flex');
}

const agregar_receta = () => {
    
    let element_1 = document.getElementById('agregar_receta_titulo');
    let element_2 = document.getElementById('agregar_receta_descripcion');
    let element_3 = document.getElementById('agregar_receta_tipo');

    

    let arreglo_pasos = JSON.stringify(array_pasos);
    let arreglo_ingredientes = JSON.stringify(array_ingredientes);


    request(`/PROYECTO/assets/php/guardar_recetas.php?titulo=${element_1.value}&descripcion=${element_2.value}&id_tipo=${element_3.value}&ingrediente=${arreglo_ingredientes}&pasos=${arreglo_pasos}`).then(
        () => {
            toggle_element('detalle');
            sin_recetas( listar_recetas());


        }
    );

    array_ingredientes = [];
    array_pasos = [];

}

const eliminar_favoritos = async (id) => {
 
    request(`/PROYECTO/assets/php/eliminar_recetas.php?id=${id}`).then(
        () => {
            
            toggle_element('detalle');
            sin_recetas( listar_recetas() );

        }
    );
}

const sin_recetas = async (cantidad) => {
    let cant = await cantidad;

    if(!cant > 0 ){
        alert('Sin recetas disponibles para mostras Redirigiendo...');
        redirigir('/PROYECTO/');
    }
}

const close_tag = async () => {
    toggle_element('detalle');
    sin_recetas( await listar_recetas());

}

const cargar_contenido_dinamico = (HTML) => {
    contenido_dinamico.innerHTML += contenedorRecetas(HTML);
}

const mostrat_lista_favoritos = async () => {
    sin_recetas(await listar_recetas());
}

const editar_receta = () => {
    detalle.innerHTML = "";
    toggle_element('detalle');
    
    setTimeout( ()=>{
        toggle_element('detalle');

    }, 500);

    detalle.innerHTML = detallasGeneralesEditar(AOBJ, "", 'none', "none", 'flex');
   
}

const subir_imagen = () => {
    
    let  inputImagen = document.getElementById("input_imagen");
    let  btnSubirImagen = document.getElementById("btn_subir_imagen");
    let  preview = document.getElementById("preview_imagen");
    
  
    // Previsualización de la imagen seleccionada
    inputImagen.addEventListener("change", function () {

        const archivo = this.files[0];

        if (archivo) {
            const reader = new FileReader();
            reader.onload = function (e) {
            // preview.innerHTML = `<img src='/PROYECTO/assets/php/uploads/${archivo.name}' style="max-width: 100%; max-height: 200px;" alt="Previsualización" />`;
            };
            
            reader.readAsDataURL(archivo);

        } else {
            preview.innerHTML = "";
        }

        inputImagen.removeEventListener("click");
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

        console.log(archivo);

        fetch("assets/php/upload.php", {
            method: "POST",
            body: formData,
        }).then((response) => response.json()).then((data) => {
        
        if (data.success) {
            alert("¡Imagen subida exitosamente!");
            preview.innerHTML += `<img class="detalle_contenedor_imagenes_img" src='/PROYECTO/assets/php/uploads/${archivo.name}'  alt="Previsualización" />`;

        } else {

        alert("Hubo un error al subir la imagen: " + data.error);
        }
        })
        .catch((error) => {
        console.error("Error al subir la imagen:", error);
        alert("Ocurrió un error inesperado.");
        });

        btnSubirImagen.removeEventListener("click");

    });

    



}

window.addEventListener('DOMContentLoaded', () => {
    //listar_recetas()
});

window.redirigir = redirigir;
window.abrir_detalles = abrir_detalles;
window.listar_recetas = listar_recetas;
window.toggle_element = toggle_element;
window.agregar_ingredientes = agregar_ingredientes;
window.agregar_pasos = agregar_pasos;
window.agregar_nueva_receta = agregar_nueva_receta;
window.agregar_receta = agregar_receta;
window.eliminar_favoritos = eliminar_favoritos;
window.close_tag = close_tag;
window.mostrat_lista_favoritos = mostrat_lista_favoritos;
window.detallasGeneralesEditar = detallasGeneralesEditar;
window.editar_receta = editar_receta;
window.subir_imagen = subir_imagen





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

const listar_recetas = async () => {

    let recetas = [];
    let HTML = "";
    let id = 0;
    recetas = await request(API_RECETAS);
    contenido_dinamico.innerHTML = "";

    if(recetas.length > 0 ){
        recetas.forEach(element => {
            HTML += Receta(element, id);
            id++;
        });
    }

    cargar_contenido_dinamico(HTML);

    return await recetas.length;

}

const abrir_detalles = (OBJECT, id) => {
    // console.log(OBJECT);
    detalle.innerHTML = "";
    toggle_element('detalle');
    detalle.innerHTML = detallasGenerales(OBJECT, id, 'none', "flex", 'none');
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
            
            my_container.innerHTML += "<div><div class='contenedor_detallesGenerales_ingredientes'>" + element.ingrediente + "</div>"; 
            my_container.innerHTML += "<div class='contenedor_detallesGenerales_ingredientes'>" + element.cantidad + "</div>"; 
            my_container.innerHTML += "<div class='contenedor_detallesGenerales_ingredientes'>" + element.unidades + "</div> </div><br>"; 
            
            x++;
        });

    }
    
    my_value_1.value = "";
    my_value_2.value = "";
    my_value_3.value = "";

}

const agregar_pasos = (element_0, element_1, element_2) => {

    let my_value_1 = document.getElementById(element_0);
   

    let my_container = document.getElementById(element_1);
    
    
    array_pasos.push(my_value_1.value);

    if( array_pasos.length > 0){
        
        let x = 1;
        my_container.innerHTML = "";

        array_pasos.forEach(element => {
            
            my_container.innerHTML += "<div class='contenedor_detallesGenerales_ingredientes'>" + x + ". "+ element + "</div><br>";

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

    request(`/PROYECTO/assets/php/guardar_recetas.php?titulo=${element_1.value}&descripcion=${element_2.value}&id_tipo=${element_3.value}`).then(
        () => {
            toggle_element('detalle');
            toggle_element('login');
            sin_recetas( listar_recetas());


        }
    );

}

const eliminar_favoritos = (id) => {
 
    request(`/PROYECTO/assets/php/eliminar_recetas.php?id=${id}`).then(
        () => {
            
            toggle_element('detalle');
            sin_recetas( listar_recetas());

        }
    );
}

const sin_recetas = (cantidad) =>{
    
    if(!cantidad > 0 ){
        alert('Sin recetas disponibles para mostras Redirigiendo...');
        redirigir('/PROYECTO/');
    }

}

const close_tag = () => {
    toggle_element('detalle');
    
    sin_recetas( listar_recetas());

}

const cargar_contenido_dinamico = (HTML) => {
    contenido_dinamico.innerHTML += contenedorRecetas(HTML);
}

const mostrat_lista_favoritos = () => {
    sin_recetas(listar_recetas());
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
document.mostrat_lista_favoritos = mostrat_lista_favoritos;




import { toggle_element, redirigir, HtmlEncode } from "./modules/funcionesGenerales/index.js";
import { request } from "./modules/request/index.js";
import { detallasGenerales } from "./modules/detallesGenerales/index.js";
import { Receta } from "./modules/Recetas/index.js";
import { contenedorRecetas } from "./modules/contenedorRecetas/index.js";




var contenido_dinamico = document.getElementById('contenido_dinamico');

var arreglo_recetas = "";
var arreglo_recetas_detalle = "";

const urlParams = new URLSearchParams(window.location.search);

// VALORES POR DEFECTO DEL API DE GOOGLE BOOKS.
const GOOGLE_BOOK_URL = 'http://localhost/PARCIALES/PARCIAL_4/assets/php/GoogleBooks/google_book.php';
const cantidad_receta = 40;
const libro_buscado = "php";

const listar_recetas = () => {

    contenido_dinamico.innerHTML = "";
    let HTML = ""
    for (let index = 0; index < 5; index++) {
        
         HTML += Receta();
        
    }

    contenido_dinamico.innerHTML += contenedorRecetas(HTML);

}

window.addEventListener('DOMContentLoaded', () => {
    listar_recetas()
});




window.redirigir = redirigir;
window.toggle_element = toggle_element;
window.listar_recetas = listar_recetas;




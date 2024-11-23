import { toggle_element, redirigir, HtmlEncode } from "./modules/funcionesGenerales/index.js";
import { request } from "./modules/request/index.js";
import { detallasGenerales } from "./modules/detallesGenerales/index.js";

import { Receta } from "./modules/Recetas/index.js";

var arreglo_recetas = "";
var arreglo_recetas_detalle = "";

const urlParams = new URLSearchParams(window.location.search);

// VALORES POR DEFECTO DEL API DE GOOGLE BOOKS.
const GOOGLE_BOOK_URL = 'http://localhost/PARCIALES/PARCIAL_4/assets/php/GoogleBooks/google_book.php';
const cantidad_receta = 40;
const libro_buscado = "php";


window.addEventListener('load', () => {

});



window.toggle_detalle = toggle_detalle;
window.arreglo_receta = arreglo_receta;
window.redirigir = redirigir;
window.agregar_favorito = agregar_favorito;
window.eliminar_favoritos = eliminar_favoritos;
window.toggle_element = toggle_element;




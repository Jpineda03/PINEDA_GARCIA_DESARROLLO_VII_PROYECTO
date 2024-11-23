import { toggle_element, redirigir, HtmlEncode } from "./modules/funcionesGenerales/index.js";
import { request } from "./modules/request/index.js";

import { mostrar_detalles_libros } from "./modules/detallesGenerales/index.js";
import { libros } from "./modules/libros/index.js";

const urlParams = new URLSearchParams(window.location.search);

// VALORES POR DEFECTO DEL API DE GOOGLE BOOKS.
const GOOGLE_BOOK_URL = 'http://localhost/PARCIALES/PARCIAL_4/assets/php/GoogleBooks/google_book.php';
const cantidad_libros = 40;
const libro_buscado = "php";


var libros_disponibles = "";
var arreglo_libros = "";
var arreglo_libros_detalle = "";



const toggle_detalle = (titulo_libro, descripcion, imagen, autor, ano_publicacion, my_book_id, resena_personal) => {  

    if(my_book_id){

        detalle_libro.innerHTML = "";
        detalle_libro.innerHTML = mostrar_detalles_libros(titulo_libro, descripcion, imagen, autor, ano_publicacion, my_book_id, resena_personal);

    }

    toggle_element(detalle_libro);
}

const obtener_libro = (imagen_libro, titulo_libro, descripcion, autor, ano_publicacion, my_book_id, resena_personal) => {

    if(imagen_libro && titulo_libro) {
        // console.log(imagen_libro.thumbnail);
       return libros(imagen_libro, titulo_libro, descripcion, autor, ano_publicacion, my_book_id, resena_personal);
    }

}

const agregar_favorito = (titulo_libro, descripcion, imagen, autor, ano_publicacion, my_book_id) => {
    
    let api = 'http://localhost/PARCIALES/PARCIAL_4/assets/php/guardar_favoritos.php';
    
    let my_resena_personal = document.getElementById('text_area_detalle');
    
    let my_resena_personal_value = my_resena_personal.value ? my_resena_personal.value : 'Sin resena';
    
    if (my_book_id && titulo_libro && descripcion && imagen && autor){
        
        const URL = `${api}?user_id=${encodeURIComponent('1')}&google_books_id=${encodeURIComponent(my_book_id)}&titulo=${encodeURIComponent(titulo_libro)}&autor=${encodeURIComponent(autor)}&imagen_portada=${encodeURIComponent(imagen)}&resena_personal=${encodeURIComponent(my_resena_personal_value)}&descripcion_libro=${encodeURIComponent(descripcion)}`;
        const mensaje = request(URL);    
    
        if(mensaje.mensaje == "00x1"){

            alert('Libro no agregado hubo error en el usuario.');

        }else{

            alert('Libro agregado a la base de datos.');

        }
        
        toggle_detalle();
        
    }else {
        alert('error_detectado');
    }
    
}

const eliminar_favoritos = (book_id) => {
    
    let api = 'http://localhost/PARCIALES/PARCIAL_4/assets/php/eliminar_favorito.php';

    if (book_id){

        detalle_libro.innerHTML = "";
        contenedor_libro.innerHTML = '';    
        const URL = `${api}?google_books_id=${encodeURIComponent(book_id)}`;
        
        request(URL);
        alert('Libro eliminado a la base de datos.');
        toggle_detalle();
        reload_favoritos();
        
    }else {
        alert('error_detectado');
    }

}


const reload_favoritos = async () => {
    contenedor_libro.innerHTML = '';
    contenedor_libro.innerHTML = "Pendiente Lista favoritos";
    let HTML = "";
    let id = 0;

    arreglo_libros_detalle = await request(`http://localhost/PARCIALES/PARCIAL_4/assets/php/lista_favoritos.php?user_id=1`);
    
    arreglo_libros_detalle.forEach(element => {
        // console.log(element); 
        HTML += obtener_libro( HtmlEncode(element.imagen_portada), HtmlEncode( element.titulo),  HtmlEncode( element.descripcion),  HtmlEncode( element.autor), "ND",  HtmlEncode( element.google_book_id),  HtmlEncode( element.resena_personal));
        id++
    })

    contenedor_libro.innerHTML = "";
    contenedor_libro.innerHTML = HTML;

}


const listar_libros = (array) => {

    let HTML = "";
    let id = 0;

    array.forEach(element => {
        let imagen_libro = "";
        let titulo_libro = "";
        let descripcion = "";
        let autor = "";
        let ano_publicacion = "";
        let my_book_id = "";
        
        try{

            imagen_libro =  HtmlEncode(element.volumeInfo.imageLinks.thumbnail);
            titulo_libro =  HtmlEncode(element.volumeInfo.title);
            descripcion = HtmlEncode(element.volumeInfo.description);
    
            autor =  typeof element.volumeInfo.authors[0] !== undefined  ? HtmlEncode(element.volumeInfo.authors[0]) :" ND";
            ano_publicacion =  HtmlEncode(element.volumeInfo.publishedDate);
            my_book_id =  HtmlEncode(element.id);

        }catch(error){
            console.log(error);
        }

        if(imagen_libro && titulo_libro) {
            // console.log(imagen_libro.thumbnail);
            HTML += libros(imagen_libro, titulo_libro, descripcion, autor, ano_publicacion, my_book_id);
        }

        

        id += 1;
            
    });

    return HTML;
}



window.toggle_detalle = toggle_detalle;
window.arreglo_libros = arreglo_libros;
window.redirigir = redirigir;
window.agregar_favorito = agregar_favorito;
window.eliminar_favoritos = eliminar_favoritos;
window.toggle_element = toggle_element;




export const toggle_element = (toToggle) => {
    
    let element = document.getElementById(toToggle);

    if (validar_existencia_clase(element, "open")){
        element.classList.add("close");
        element.classList.remove('open');
       
     


    }else{
        
        element.classList.add("open");
        
        element.classList.remove('close');
 
        
    }
}

export const validar_existencia_clase = (elemento, clase) => {
    return Array.from(elemento.classList).includes(clase);
}


export const redirigir = (mylink) => {
    // Redirigir a la página deseada
    window.location.href = mylink;
}


export const  HtmlEncode = (text) => {
    let mod_text = text;
    
    if(mod_text){
        mod_text = text.replaceAll('"', " ");
        mod_text = mod_text.replaceAll("'", " ");

        return mod_text;
        console.log(mod_text);
    }
    // return mod_text;
}

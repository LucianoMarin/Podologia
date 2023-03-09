export const validacionP=(()=>{

'use strict'

const form_nuevo=document.querySelector('#nuevo_perfil');

const form_editar=document.querySelector('#editar_perfil');


const enviarFormulario=(event)=>{
const {verificador, rut, primer_nombre, segundo_nombre, apellido_paterno, apellido_materno,cargo}=event.target;
event.preventDefault();
if(rut.value==''){
    alert('ERROR: Campo rut vacio!');
}
else if(verificador.value==''){
    alert('ERROR: Seleccione numero verificador');
}

else if(primer_nombre.value==''){
    alert('ERROR: Campo primer nombre vacio!');
}else if(segundo_nombre.value==''){
    alert('ERROR: Campo segundo nombre vacio!');
}
else if(apellido_paterno.value==''){
    alert('ERROR: Campo apellido paterno vacio!');
}
else if(apellido_materno.value==''){
    alert('ERROR: Campo apellido materno vacio!');

}

else if(cargo.value==''){
    alert('ERROR: Seleccione un Cargo');

}
else{
    form_nuevo.submit();

}



}

if(form_nuevo){

    form_nuevo.addEventListener('submit', enviarFormulario);
}




const editarPerfil=(event)=>{
    const {primer_nombre, segundo_nombre, apellido_paterno, apellido_materno,cargo}=event.target;
    event.preventDefault();

    if(primer_nombre.value==''){
        alert('ERROR: Campo primer nombre vacio!');
    }else if(segundo_nombre.value==''){
        alert('ERROR: Campo segundo nombre vacio!');
    }
    else if(apellido_paterno.value==''){
        alert('ERROR: Campo apellido paterno vacio!');
    }
    else if(apellido_materno.value==''){
        alert('ERROR: Campo apellido materno vacio!');
    
    }
    
    else if(cargo.value==''){
        alert('ERROR: Seleccione un Cargo');
    
    }
    else{
        form_editar.submit();
    
    }
    

}


if(form_editar){

form_editar.addEventListener('submit', editarPerfil)

}



})();





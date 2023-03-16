export const validarPaciente=(()=>{

'use strict';


const fPaciente=document.querySelector('#formulario_paciente');
const btnCrearPaciente=document.querySelector('#btnCrearPaciente');
const sFecha=document.querySelector('#fecha_nacimiento');
const inputEdad=document.querySelector('#edad');



const calcularEdad=(fecha_nacimiento)=>{
    const fechaActual=new Date();
    const anoActual=parseInt(fechaActual.getFullYear());
    const mesActual=parseInt(fechaActual.getMonth())+1;
    const diaActual=parseInt(fechaActual.getDate());
    
    const anoNacimiento=parseInt(String(fecha_nacimiento).substring(0,4));
    const mesNacimiento=parseInt(String(fecha_nacimiento).substring(5,7));
    const diaNacimiento=parseInt(String(fecha_nacimiento).substring(8,10));
    
    
    let edad=anoActual-anoNacimiento;
    
    if(mesActual<mesNacimiento){
    edad--;
    
    }else if(mesActual===mesNacimiento){
    if(diaActual<diaNacimiento){
    edad--;
    }
    
    }
    return edad;
    }




if(sFecha){
    fecha_nacimiento.addEventListener('change',()=>{

     if(fecha_nacimiento.value){
        inputEdad.value=calcularEdad(fecha_nacimiento.value);
     }

    })
}
        



if(fPaciente){

const enviarFormulario=((e)=>{
    e.preventDefault();

const{  rut,
        verificador,
        primer_nombre,
        segundo_nombre,
        apellido_paterno,
        apellido_materno,
        fecha_nacimiento,
        edad,
        direccion,
        telefono,
        }=e.target;

   






if(rut.value==''){
alert('ERROR: Campo rut vacio!');
}
else if(verificador.value==''){
    alert('ERROR: debe seleccionar n° verificador Rut');

}
else if(primer_nombre.value=='' || !isNaN(primer_nombre.value)){
if(primer_nombre.value==''){
    alert('ERROR: Campo primer nombre vacio!');
}
else{
    alert('ERROR: El nombre no puede ser un numero!');

}

}


    else if(apellido_paterno.value=='' || !isNaN(apellido_paterno.value)){
        if(apellido_paterno.value==''){
            alert('ERROR: Campo apellido paterno vacio!');
        }
        else{
            alert('ERROR: El apellido paterno no puede ser un numero!');
        
        }
        
        }

else if(apellido_materno.value=='' || !isNaN(apellido_materno.value)){
    if(apellido_materno.value==''){
        alert('ERROR: Campo apellido materno nombre vacio!');
    }
    else{
        alert('ERROR: El apellido materno no puede ser un numero!');
    
    }
    
    }


 

else if(fecha_nacimiento.value==''){
    alert('ERROR: debe seleccionar una fecha de nacimiento!');
}

else if(edad.value=='' || isNaN(edad.value)){
if(edad.value==''){
    alert('ERROR: Campo edad vacio!');
}

else{
    alert('Error: Campo edad debe ser numerico!');
}

}



else{
fPaciente.submit();

}


});


fPaciente.addEventListener('submit', enviarFormulario);

}




})();
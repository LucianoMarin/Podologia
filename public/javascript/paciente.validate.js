export const validarPaciente=(()=>{

'use strict';


const fPaciente=document.querySelector('#formulario_paciente');
const sFecha=document.querySelector('#fecha_nacimiento');





const fEditarPaciente=document.querySelectorAll('#formulario_editarPaciente');
const btneditarPaciente=document.querySelectorAll('#btnEditarPublicacion');
const eFecha=document.querySelectorAll('.fecha_nacimiento2');





const btnEditar=document.querySelectorAll(".btnTablasAtenciones");
const lfecha=document.querySelectorAll(".fecha_atencion");
const lhora=document.querySelectorAll(".inicio_hora");


//modificacion modal ingreso

if(lfecha[0]){
lfecha[0].addEventListener('keyup',()=>{
lfecha[0].value='';
});

}


if(fPaciente){

const enviarFormulario=((e)=>{
    e.preventDefault();

const{  rut,
        verificador,
        primer_nombre,
        apellido_paterno,
        apellido_materno,
        fecha_nacimiento,
        discapacidad,

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




else if(discapacidad.value==''){

    alert('Error: seleccione un campo en discapacidad!');

}


else{
fPaciente.submit();

}


});


fPaciente.addEventListener('submit', enviarFormulario);

}


















//modificacion modal tabla edicion

 

for(let i=0; i<=eFecha.length-1; i++){





if(fEditarPaciente){
const enviarFormularioeditar=((e)=>{
    e.preventDefault();

  

const{  rut,
        verificador,
        primer_nombre,
        apellido_paterno,
        apellido_materno,
        fecha_nacimiento,
        discapacidad,

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


else if(discapacidad.value==''){

    alert('Error: seleccione un campo en discapacidad!');

}


else{
    fEditarPaciente[i].submit();
}

});

fEditarPaciente[i].addEventListener('submit', enviarFormularioeditar);

}
if(btneditarPaciente){
    const rut=document.querySelectorAll('#rut');
    const verificador=document.querySelectorAll('#verificador');
    const primer_nombre=document.querySelectorAll('#primer_nombre');
    const segundo_nombre=document.querySelectorAll('#segundo_nombre');
    const apellido_paterno=document.querySelectorAll('#apellido_paterno');
    const apellido_materno=document.querySelectorAll('#apellido_materno');
    const fecha_nac=document.querySelectorAll('#fecha_nacimiento2');
    const direccion=document.querySelectorAll('#direccion');
    const telefono=document.querySelectorAll('#telefono');
    

const persona=new Object();
persona.rut=rut[i].value;
persona.verificador=verificador[i].value;
persona.nombre=primer_nombre[i].value;
persona.s_nombre=segundo_nombre[i].value;
persona.a_paterno=apellido_paterno[i].value;
persona.a_materno=apellido_materno[i].value;
persona.f_nac=fecha_nac[i].value;
persona.direccion=direccion[i].value;
persona.telefono=telefono[i].value;


    btneditarPaciente[i].addEventListener('click',()=>{
        rut[i].value=persona.rut;
        verificador[i].value=persona.verificador;
        primer_nombre[i].value=persona.nombre;
        segundo_nombre[i].value=persona.s_nombre;
        apellido_paterno[i].value=persona.a_paterno;
        apellido_materno[i].value=persona.a_materno;
        fecha_nac[i].value=persona.f_nac;
        direccion[i].value=persona.direccion;
        telefono[i].value=persona.telefono;


    })
}  

}



for(let j=0; j<lfecha.length; j++){
    if(btnEditar[j]){
    btnEditar[j].addEventListener("click",()=>{

    lfecha[j].value="";
    lhora[j].value="";

    
    })
}

}






})();



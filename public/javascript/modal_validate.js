
export const vModal=(() => {
    'use strict';



const btnCrearNota=document.querySelector('#btnNotas');
const btnEditarPublicacion=document.querySelectorAll('#btnEditarPublicacion');
const inputTitulo=document.querySelector('#txtTitulo');
const inputPublicacion=document.querySelector('#txtComentario');
const inputTituloEd=document.querySelectorAll('#txtTituloEd');
const inputPublicacionEd=document.querySelectorAll('#txtComentarioEd');
const msValidar=document.querySelectorAll('.vModal');
const msValidarEdTitulo=document.querySelectorAll('.vModalEDTitulo');
const msValidarEdComentario=document.querySelectorAll('.vModalEDComentario');
const texto=document.createElement('div');
const texto2=document.createElement('div');
const mVF=document.querySelector('#form_crearPublicacion');
const mVFE=document.querySelector('#form_EPublicacion');








//MODALES PUBLICACION
//MODAL CREAR PUBLICACION

if(btnCrearNota)
{

btnCrearNota.addEventListener('click',()=>{

inputTitulo.value='';
inputPublicacion.value='';
texto.innerHTML='';
texto2.innerHTML='';






    inputTitulo.addEventListener('input',(e)=>{
        const titulo=e.target.value;

      
        if(titulo.length>=200){
           
        texto.innerHTML='* Titulo no puede superar 200 caracteres..';
        }
        else{
            texto.innerHTML='';
        
            
        }
        msValidar[0].classList.add('vModales');
        msValidar[0].append(texto);


    })


    inputPublicacion.addEventListener('input',(e)=>{
    const titulo2=e.target.value;

    if(titulo2.length>=65535 ){
           
        texto2.innerHTML='* Comentario no puede superar 65535 caracteres..';
        }
        else{
            texto2.innerHTML='';
        
            
        }
        msValidar[1].classList.add('vModales');
        msValidar[1].append(texto2);


    

    })


});




document.addEventListener("DOMContentLoaded",()=>{
    mVF.addEventListener('submit',formularioPublicacion);

})


const formularioPublicacion=(e)=>{
    e.preventDefault();
    
    if(inputTitulo.value.length==0){
        alert('Debe ingresar un titulo');
        return;
    }
    else if(inputPublicacion.value.length==0){
        alert('Debe ingresar un comentario');
        return;
    }


    mVF.submit();


}



//MODAL MODIFICACION
const titulos=[];
let aTitulo=[];
let aComentario=[];
for(let i=0; i<=btnEditarPublicacion.length-1; i++){
         titulos.push(i);
         aTitulo.push(i);
         aComentario.push(i);
         aTitulo[i]=inputTituloEd[i].value; 
         aComentario[i]=inputPublicacionEd[i].value;   
         
         
btnEditarPublicacion[i].addEventListener('click',()=>{
   

        inputTituloEd[i].value=aTitulo[i];
        inputPublicacionEd[i].value=aComentario[i];

        inputTituloEd[i].addEventListener('input',(e)=>{
            
        titulos[i]=e.target.value;

            
        if(titulos[i].length>=200){
           
            texto.innerHTML='* Titulo no puede superar 200 caracteres..';
            }
            else{
                texto.innerHTML='';
            
                
            }
            msValidarEdTitulo[i].classList.add('vModales');
            msValidarEdTitulo[i].append(texto);

    })
})


inputPublicacionEd[i].addEventListener('input',(e)=>{
    const titulo2=e.target.value;

    if(titulo2.length>=65535 ){
           
        texto2.innerHTML='* Comentario no puede superar 65535 caracteres..';
        }
        else{
            texto2.innerHTML='';
        
            
        }
        msValidarEdComentario[i].classList.add('vModales');
        msValidarEdComentario[i].append(texto2);

    })


  
}
         
}








//FIN MODALES PUBLICACION




})();
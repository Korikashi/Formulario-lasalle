// Valida que todos los campos tengan informacion

function validarFormulario(){

let nombre = document.getElementById("nombre").value;
let correo = document.getElementById("correo").value;
let mensaje = document.getElementById("mensaje").value;

if(nombre == "" || correo == "" || mensaje == ""){
    alert("Todos los campos son obligatorios");
    return false;
}

return true;

}
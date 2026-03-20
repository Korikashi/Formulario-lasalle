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

window.onload = function() {
    const params = new URLSearchParams(window.location.search);
    if (params.get('enviado') === '1') {
        document.getElementById('modal').classList.remove('hidden');
    }
}

function cerrarModal() {
    document.getElementById('modal').classList.add('hidden');
    window.history.replaceState({}, document.title, 'contacto.html');
}
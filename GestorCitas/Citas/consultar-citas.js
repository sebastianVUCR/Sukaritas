function redirectAgregarCitas() {
    window.location.href('registrar-citas.php');
}

function establecerEscuchadores() {
    document.getElementById('agregar').addEventListener(redirectAgregarCitas);
}
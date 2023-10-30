    /**
     * 
     * Rubén Sepúlveda O.
     * 29-10-2023
     * 
     * 
     * Código Javascript validaciones, funciones
     *
     * y las busquedas para el front
	 * 
     *
     */

const regionSelect = document.getElementById('region');
fetch('data.php?op=region')
    .then(response => response.json())
    .then(regiones => {
        regiones.forEach(region => {
            const option = document.createElement('option');
            option.value = region.id_region;
            option.text = region.glosa_region;
            regionSelect.appendChild(option);
        });
    })
    .catch(error => console.error('Error al cargar las regiones: ', error));

const candidatoSelect = document.getElementById('candidato');
fetch('data.php?op=candidato')
    .then(response => response.json())
    .then(candidatos => {
        candidatos.forEach(candidato => {
            const option = document.createElement('option');
            option.value = candidato.id_candidato;
            option.text = candidato.nom_candidato +" "+ candidato.app_candidato +" "+candidato.apm_candidato;
            candidatoSelect.appendChild(option);
        });
    })
    .catch(error => console.error('Error al cargar los candidatos: ', error));

function buscarComuna(){
    const selectedRegionId = document.getElementById('region').value;
    const comunaSelect = document.getElementById('comuna');

    /*destruir elementos anteriores*/
    while (comuna.options.length > 0) {
        comuna.remove(0);
    }

    fetch('data.php?op=comuna&valor='+selectedRegionId)
        .then(response => response.json())
        .then(comunas => {
            comunas.forEach(comuna => {
                const option = document.createElement('option');
                option.value = comuna.id_comuna;
                option.text = comuna.glosa_comuna;
                comunaSelect.appendChild(option);
            });
        })
    .catch(error => console.error('Error al cargar las comunas: ', error));
}

function validarVotanteInput(){
    const selectedRutId = document.getElementById('rut').value;
    const countHints = '';
    fetch('data.php?op=votante&valor='+selectedRutId)
        .then(response => response.json())
        .then(data => {
            const countHints = data.length;
            if(countHints > 0){
                alert("ESTE VOTANTE YA VOTÓ");
                rut.focus();
            }else{

            }
        })
    .catch(error => {
        console.error('Error al cargar los votantes: ', error);
        return false;
    });
    return countHints;
}

function validarNombreInput(){
    var contenedor = document.getElementById("container");
    var valor = nombre.value;
    var tieneNumeros = /\d/.test(valor);
    if (valor.length >= 5 && tieneNumeros) {
        return true;
    }else{
        return false;
    }
}

function validarApellidoInput(){
    var contenedor = document.getElementById("container");
    var valor = apellido.value;
    var tieneNumeros = /\d/.test(valor);
    if (valor.length >= 5 && tieneNumeros) {
        return true;
    }else{
        return false;
    }
}

function validarAliasInput(){
    var contenedor = document.getElementById("container");
    var valor = alias.value;
    var tieneLetras = /[a-zA-Z]/.test(valor);
    var tieneNumeros = /\d/.test(valor);
    if (valor.length >= 5 && tieneLetras && tieneNumeros) {
        return true;
    }else{
        return false;
    }

}

function validarRut(rutCompleto) {
    rutCompleto = rutCompleto.replace(/\./g, "").replace(/-/g, "");
    var rut = rutCompleto.slice(0, -1);
    var dv = rutCompleto.slice(-1).toUpperCase();

    if (rut.length < 1) {
        return false;
    }

    var m = 0;
    var s = 1;
    for (; rut; rut = Math.floor(rut / 10)) {
        s = (s + rut % 10 * (9 - m++ % 6)) % 11;
    }

    var dvCalculado = s ? s - 1 + "": "K";

    if (dv === dvCalculado) {
        return true;
    } else {
        return false;
    }
}

function validarEmail(emailtxt) {
    var regex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
    return regex.test(emailtxt);
}

function validarRutInput() {
    var rutInput = document.getElementById("rut");
    var rutDvInput = document.getElementById("rutDv");
    var rut = rutInput.value + "-" + rutDvInput.value;
    if (validarRut(rut)) {
        return true;
    } else {
        alert("RUT INVÁLIDO");
        rutInput.value = "";
        rutDvInput.value = "";
        rutInput.focus();
        return false;
    }
}

function validarEmailInput(){

    var emailInput = document.getElementById("emailtxt").value;
    if (validarEmail(emailInput)) {
       return true;
    } else {
        alert("email inválido");
        emailInput.value = "";
        return false;
    }
}

function validarCasillasActivas(){
    var cantidadActivas = contarCasillasActivas();
    if (cantidadActivas < 2){
        alert("NÚMERO DE OPCIONES DE COMO SE ENTERÓ DE NOSOTROS DEBEN SER MÍNIMO DOS");
        return false;
    }else{
        return true;
    }
}

function contarCasillasActivas() {
    var casillas = document.querySelectorAll('input[type="checkbox"]');
    var contador = 0;

    for (var i = 0; i < casillas.length; i++) {
        if (casillas[i].checked) {
            contador++;
        }
    }

    return contador;
}

function deshabilitarSubmit(){
    var boton = document.getElementById("submit");
    boton.disabled = true;
}

function habilitarSubmit(){
    var boton = document.getElementById("submit");
    boton.disabled = false;
}

<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Formulario de Votación</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<style>
    .form-group label {
        display: inline-block;
        width: 200px;
        margin-right: 10px;
        text-align: right; 
    }
    
    .form-group input {
        display: inline-block;
        width: 500px; 
    }

    .form-group select {
        display: inline-block;
        width: 500px;
    }


</style>

    <div class="container" id="container">
        <h2>Formulario de Registro</h2>
        <form id="formularioVoto" action="grabarvoto.php" method="post" >
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required onblur="validarNombreInput()">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required onblur="validarApellidoInput()">
            </div>
            <div class="form-group">
                <label for="alias">Alias:</label>
                <input type="text" class="form-control" id="alias" name="alias" required onblur="validarAliasInput()">
            </div>
            <div class="form-group">
                <label for="rut">RUT:</label>
                <input type="text" class="form-control" style="width: 200px;" id="rut" name="rut" required>
                <span> - </span>
                <input type="text" class="form-control" style="width: 50px;" id="rutDv" name="rutDv" required onblur="validarRutInput(); validarVotanteInput()">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="emailtxt" name="emailtxt" required onblur="validarEmailInput()">
            </div>
            <div class="form-group">
                <label for="region"><?=utf8_encode('Región:');?></label>
                <select class="form-control" id="region" name="region" required onchange="buscarComuna()">
                    <option value="">Selecciona una Region</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comuna">Comuna:</label>
                <select class="form-control" id="comuna" name="comuna" required>
                    <option value="">Selecciona un comuna</option>
                </select>
            </div>
            <div class="form-group">
                <label for="candidato">Candidato:</label>
                <select class="form-control" id="candidato" name="candidato" required>
                    <option value="">Seleccione un Candidato</option>
                </select>
            </div>
            <div class="form-group2">
                <label for="candidato"><?=utf8_encode('Cómo se entero de nosotros:');?></label>
                <input type="checkbox"  class="form-group" name="web"><span class="form-group"> Web</span>
                <input type="checkbox"  class="form-group" name="tv"><span class="form-group"> TV</span>
                <input type="checkbox"  class="form-group" name="redes"><span class="form-group"> Redes Sociales</span>
                <input type="checkbox"  class="form-group" name="amigo"><span class="form-group"> Amigo</span>
            </div>
            <button id="btnsubmit" type="button" class="btn btn-primary" >Votar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <script>
    document.getElementById("btnsubmit").addEventListener("click", function() {
        var formulario = document.getElementById("formularioVoto");
        if ((validarAliasInput() == true) && (validarRutInput() == true) && (validarEmailInput() == true) && (validarCasillasActivas() == true)) {
            formulario.submit();
        } else {
            alert("FALLA EN VALIDACIÓN");
        }
    });
</script>
   
</body>
</html>


<?php 
    session_start();
    if( !isset($_SESSION['usuario']['idSesio']) ){
        if( !$_SESSION['usuario']['adm'] ){
            header('Location: ../spa');
            exit; 
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Formulario altas</title>
</head>
<body>
    <header>
        <h1>Formulario Altas</h1>
        <input type="button" value="Cerrar Sesion" class="cerrarSesion" id="cerrarSesion">
    </header>

    <main>
            
        <div class="form-container">

            <h2>Formulario de Registro</h2>

            <form action=".php" method="post" id="formAlta">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="contraseña">Contraseña:</label>
                <input type="password" id="contrasenia" name="contrasenia" required>

                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" required>

                <fieldset>
                    <legend>¿Es administrador?</legend>
                    <label for="adm-si">
                        <input type="radio" name="adm" id="adm-si" value="1">
                        Sí
                    </label>
                    <label for="adm-no">
                        <input type="radio" name="adm" id="adm-no" value="0" checked>
                        No
                    </label>
                </fieldset>

                <button type="submit">Registrar</button>
            </form>

        </div>

    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./index.js"></script>
    <footer>

    </footer>
</body>
</html>
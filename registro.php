<?php
$conexion= mysqli_connect("localhost", "root", "", "usuarios", 3306);
$mensaje= "";

if (isset($_POST["registrar"])) {
    $usuario= $_POST["usuario"];
    $password= $_POST["password"];
    $passwordConf= $_POST["passwordConf"];

    if ($password != $passwordConf) {
        $mensaje= "Las contraseñas son diferentes";
    } else {

        $verificar= "SELECT * FROM usuarios WHERE usuario='$usuario'";
        $resultado= mysqli_query($conexion, $verificar);

        if (mysqli_num_rows($resultado) > 0) {
            $mensaje= "El usuario ya existe, prueba otro nombre";
        } else {

            $guardar= "INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$password')";

            if (mysqli_query($conexion, $guardar)) {
                $mensaje= "Usuario registrado correctamente";
            } else {
                $mensaje= "Error al registrar usuario";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
</body>
    <style>
        body {
            background: rgb(88, 25, 25);
        }
        .card {
            border-radius: 15px;
            border: 2px solid rgb(184, 197, 187);
        }
        .btn-registrar {
            background-color: rgb(0, 0, 0);
            border: none;
        }
        .btn-registrar:hover {
            background-color: rgb(43, 43, 43);
        }
    </style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg p-4 ">

                <div class="text-center">
                    <h3 class="mt-2">Crear Cuenta</h3>
                    <p>Registro para prácticas seguras de conducción</p>
                </div>

                <hr>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Usuario</label>
                        <input type="text" name="usuario" class="form-control" placeholder="Ingresa tu usuario" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Confirmar contraseña</label>
                        <input type="password" name="passwordConf" class="form-control" placeholder="Confirma tu contraseña " required>
                    </div>

                    <?php 
                    if (!empty($mensaje)) {
                        echo '<div class="alert alert-danger text-center" style="border-radius:10px;">'.$mensaje.'</div>';
                    }
                    ?>
                    <button type="submit" name="registrar" class="btn btn-registrar text-white fw-bold w-100 mt-2">Registrar</button>
                </form>

                <p class="text-center mt-3">
                <a href="login1.php" class="fw-bold" style="color: rgb(88, 25, 25);">Volver al login</a>
                </p>
            </div>
        </div>
    </div>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
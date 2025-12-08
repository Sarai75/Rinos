<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<style>
    body {
        background:rgb(88, 25, 25);
    }
    .card {
        border-radius: 15px;
        border: 2px solid rgb(184, 197, 187);
    }
    .btn-login {
        background-color:rgb(0, 0, 0);
           border: none;
    }
    .btn-login:hover {
        background-color:rgb(43, 43, 43);
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg p-4">
                <div class="text-center">
                    <h3 class="mt-2">Iniciar Sesión</h3>
                     <p>Sistema de prácticas seguras de conducción</p>
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
                    <button type="submit" name="ingresar" class="btn btn-login text-white fw-bold w-100">
                        Ingresar
                    </button>
                </form>

                <p class="text-center mt-3">
                    ¿No tienes cuenta?  
                    <a href="registro.php" class="text-decoration-none fw-bold" style="color: rgb(88, 25, 25);">Regístrate aquí</a>
                </p>
            </div>
        </div>
    </div>
    </div>

    <?php
    $conexion= mysqli_connect("localhost", "root", "", "usuarios", 3306);

    if (isset($_POST["ingresar"])) {
        $usuario= $_POST["usuario"];
        $password= $_POST["password"];

        $consulta= "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password'";
        $resultado= mysqli_query($conexion, $consulta);

        if (mysqli_num_rows($resultado)>0) {
            echo "<script>
                    window.location = 'inicio.php';
                </script>";

        } else {
            echo "<script>
                    alert('El usuario o contraseña no existen');
                </script>";
        }
    }
    ?>
    </body>
    </html>
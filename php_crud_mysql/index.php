<?php
session_start();

// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Conexión a la base de datos (reemplaza con tus propios datos)
    $conn = mysqli_connect('localhost', 'root', '', 'pyxeles');

    // Consulta para verificar las credenciales
    $query = "SELECT id FROM users WHERE user = '$username' AND password = SHA2('$password', 256)";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Credenciales válidas, redirige al usuario a form.php
        header("Location: view/form.php");
        exit;
    } else {
        // Credenciales incorrectas, muestra un mensaje de error
        echo "Usuario o contraseña incorrectos.";
    }
}
?>

<?php include ("view/includes/header.php") ?>  

    

    <div class="container p-4">

        <div class="row">
                    
                <div class="col-md-4">
                    <div class="card card-body">

                        <h1>LOGIN</h1>

                        <form method="post" action="">
                            <label for="username">User:</label>
                            <input type="text" name="username" required class="form-control" autofocus><br>
                            <label for="password">Password:</label>
                            <input type="password" name="password" required class="form-control" autofocus><br>
                            <input type="submit" value="SEND" class="btn btn-success btn-block">
                        </form>
                    </div>
                </div>
        </div> 
    </div>        
</body>
</html>

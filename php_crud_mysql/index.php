<?php
session_start();
// Check if the form was sent
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Database connection
    $conn = mysqli_connect('', '', '', '');

    // Query to verify credentials
    $query = "SELECT id FROM users WHERE user = '$username' AND password = SHA2('$password', 256)";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Valid credentials, redirect user to form.php
        header("Location: view/form.php");
        exit;
    } else {
        // Incorrect credentials, displays an error message
        echo "Usuario o contraseña incorrectos.";
    }
}
?>

<?php 
//load the content of the file “header.php”
include ("view/includes/header.php") ?>  

    <!--  login form html structure  --> 

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

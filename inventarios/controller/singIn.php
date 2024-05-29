<?php session_start(); ?>
<?php include("../model/db.php")?>

<!-- The head of the page, and script tags that are used to load libraries and scripts -->


<!DOCTYPE html>  <!-- Declare the document type as HTML5 -->
<html lang="en">  <!-- Specifies the primary language of the content (in this case, English) -->
<head>
    <meta charset="UTF-8">  <!-- Sets the character encoding to UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!-- Scales the view to fit the width of the device -->
    <title>PYXELES DATABASE</title>  <!-- Defines the title of the web page -->
    
    <!-- BOOTSTRAP -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
<?php 
if (!isset($_SESSION['usuario'])) {
    // Redirige al formulario de inicio de sesión o muestra un mensaje de error
    header('Location: ../index.php');
    exit;
} ?>
 

<!-- Navigation bar -->
<nav class="navbar navbar-dark bg-dark"> 
    <div class="conteiner">
        <a href="" class="navbar-brand">PYXELES DATABASE</a>
    </div>
    <a href="../view/form.php" class="btn btn-danger"> 
        <i>Go Back</i>
    </a>
</nav>



<?php  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "INSERT INTO users (user, password)
    VALUES ('$username', SHA2('$password', 256))
    ON DUPLICATE KEY UPDATE password = SHA2('$password', 256)";
   $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Datos insertados correctamente.";

        $user_id = mysqli_insert_id($conn);   //get the id
        date_default_timezone_set('America/Mexico_City'); //configure time zone
        $DateAndTime = date('m-d-Y H:i:s', time());  //get the date and time
        $save_user_message = "Save user, id: $user_id";  //configure message
        //send query
        $query = "INSERT INTO events (username, action, date_time) VALUES ('{$_SESSION['usuario']}', '$save_user_message', '$DateAndTime')";
        $result = mysqli_query($conn, $query);



    } else {
        echo "Error al insertar datos: " . mysqli_error($conn);
    }
}

?>



<div class="container p-4">

        <div class="row">
                    
                <div class="col-md-4">
                    <div class="card card-body">

                        <h1>Register</h1>

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
    
    
    <div class="col-md-8">

<!-- The “table-bordered” class in Bootstrap is used to add borders to all cells in a table -->
<table class="table table-bordered">

    <!-- Table header (thead) with column headers for a data table. Each column corresponds to a specific attribute of the elements in the table -->
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Password</th>            
        </tr>
    </thead>
    <tbody>

        <!-- Retrieves data from the “articles” table of a database and displays it in a table -->
        <?php 
        
        $query = "SELECT * FROM users";
        $result_users = mysqli_query($conn, $query);

        while($row = mysqli_fetch_array($result_users)) { ?>

                <tr>
                    <td><?php echo $row['id']  ?></td>
                    <td><?php echo $row['user']  ?></td>
                    <td><?php echo $row['password']  ?></td>
                    <td>

                        <!-- Links are generated to edit or delete each article, using the values ​​of the “id” field. -->
                        <div class="button-container">
                            <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">
                             <i class="fas fa-marker"></i> 
                            </a>
                            <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
                             <i class="far fa-trash-alt"></i>
                            </a>
                        </div>
                    </td>
                </tr>

                <!-- stilo de los botones -->
                <style>.button-container {
                         display: flex;
                        justify-content: space-between; /* Alinea los botones al principio y al final del contenedor */
                        }
                </style>
        <?php }   ?> 
    </tbody>
</table>
</div>





</body>
</html>

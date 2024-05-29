<?php
session_start();
// Include and execute the code of the db.php file that is the connection with our database 
include("../model/db.php");

if (!isset($_SESSION['usuario'])) {
    // Redirige al formulario de inicio de sesión o muestra un mensaje de error
    header('Location: ../index.php');
    exit;
}

    //check if the parameter “id” exists
    if(isset($_GET['id'])){
        $id = $_GET['id'];//the value of the parameter “id” is assigned to the variable $id
        //An SQL query is executed to select an article from the articles table where the “id” field matches the value of $id
        $query = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($conn, $query);
        //If the query returns exactly one row, the values ​​are extracted from the columns and assigned to the corresponding variables
        if (mysqli_num_rows($result) == 1){
            $rows = mysqli_fetch_array($result);
            $user = $rows['user'];
            $password = $rows['password'];
        }
    }

    if(isset($_POST['update'])){ //check if the form has been submitted with the refresh button
        $id = $_GET['id'];  //gets the value of the “id” parameter
        //assigns the values ​​to the corresponding variables
        $user = $_POST['user'];
        $password = $_POST['password'];

        //the query is executed using mysqli_query($conn, $query)
        $query = "UPDATE users
        SET user = '$user', password = SHA2('$password', 256)
        WHERE id = $id";
        mysqli_query($conn, $query);

       
        //system for recording user actions
        date_default_timezone_set('America/Mexico_City');
        $DateAndTime = date('m-d-Y H:i:s', time());
        $save_user_message = "Update user, id: $id";
        $query = "INSERT INTO events (username, action, date_time) VALUES ('{$_SESSION['usuario']}', '$save_user_message', '$DateAndTime')";
        $result = mysqli_query($conn, $query);

       $_SESSION['message'] = 'User Update Successfully';
       $_SESSION['message_type'] = 'primary';
       
        header("location: singIn.php");
    }

?> 

<?php include("../view/includes/header.php") ?>

    <!--the form is created to update data -->

<div class="container p-4">
    <div class="row">
        <div class="col-md 4 mx-auto">
            <div class="card card-body">
                <form action="edit_user.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="user" value=" <?php echo $user; ?> " class="form-control" placeholder="Update User">
                    </div>
                    <div class="form-group">
                        <input type="text" name="passsword" value=" <?php echo $password; ?> " class="form-control" placeholder="Update password">
                    </div>
                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("../view/includes/footer.php") ?>
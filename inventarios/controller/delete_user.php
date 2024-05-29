<!-- Handling the deletion of an item record in a database -->

<?php 
 session_start();

    include("../model/db.php");  //includes the file db.php

    if(isset($_GET['id'])){  //Checks if the “id” parameter is defined
        $id = $_GET['id'];  //Retrieves the value of the id parameter
        $query = "DELETE FROM users WHERE id = $id";  //SQL query to delete a record from the “articles” table where the ID matches the provided value
        $result = mysqli_query($conn, $query);  //The query is executed and the result is stored in the variable $result
        if(!$result){  //It checks if the execution of the query was successful
            die("Query Failed");  //If it was not, the script is terminated and an error message is displayed
        }

        $_SESSION['message'] = 'User Removed Succesfully';  //Session message to indicate that the item was successfully deleted
        $_SESSION['message_type'] = 'danger';  //Type of message

        header("Location: singIn.php");  //The user is redirected to the index.php page

         //system for recording user actions
         $user_id = $id;
         date_default_timezone_set('America/Mexico_City');
         $DateAndTime = date('m-d-Y H:i:s', time());
         $save_user_message = "Deleted the user: $id";
         $query = "INSERT INTO events (username, action, date_time) VALUES ('{$_SESSION['usuario']}', '$save_user_message', '$DateAndTime')";
         $result = mysqli_query($conn, $query);
 



    }

?> 
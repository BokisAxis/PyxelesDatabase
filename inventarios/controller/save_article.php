<?php
session_start();
// Include and execute the code of the db.php file that is the connection with our database 
include("../model/db.php");



//check if the form has been submitted
if (isset($_POST['save_article'])){
   
    //assigns the value of the input field to the variable $
    $name = $_POST['name'];
    $description = $_POST['description'];
    $maker = $_POST['maker'];
    $item_condition = $_POST['condition'];
    $stock = $_POST['stock'];
    $number = $_POST['number'];
    $sku = $_POST['sku'];
    $distributor = $_POST['distributor'];
    $price = $_POST['price'];
    $sale = $_POST['sale'];


    //check if any of the fields are empty, If at least one of these fields is empty, display a message
if($name == "" || $description == "" || $item_condition == "" || $stock == ""){
    $_SESSION['message'] = 'Enter important data* / name, description, condition, stock';
   $_SESSION['message_type'] = 'primary';
}

else{
            //logic to save data from an item to a database

 //a SQL query is executed to check if an item with the same number or sku already exists in the table, a message is displayed


    $check_query = "SELECT DISTINCT sku, number FROM articulos WHERE number = '$number' OR sku = '$sku'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        $_SESSION['message'] = 'that article already exists';
        $_SESSION['message_type'] = 'primary';
    }

        else{
            //the insertion of the article is executed in the articles table
    $query = "INSERT INTO articulos(name, description, maker, item_condition, stock, 
    number, sku, distributor, price, sale) VALUES ('$name', '$description', '$maker', '$item_condition', '$stock', 
    '$number', '$sku', '$distributor', '$price', '$sale')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Failed");
   }    else{
    $article_id = mysqli_insert_id($conn);   //get the id
    date_default_timezone_set('America/Mexico_City'); //configure time zone
    $DateAndTime = date('m-d-Y H:i:s', time());  //get the date and time
    $save_article_message = "Save the article id: $article_id";  //configure message
    //send query
    $query = "INSERT INTO events (username, action, date_time) VALUES ('{$_SESSION['usuario']}', '$save_article_message', '$DateAndTime')";
    $result = mysqli_query($conn, $query);
    
   }
   $_SESSION['message'] = 'Article saved succesfully';
   $_SESSION['message_type'] = 'success';

}
}
    //function that performs a redirect
    header("Location: ../view/form.php");
   die();

}

?>


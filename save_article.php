<?php

include("db.php");

if (isset($_POST['save_article'])){
   
    $name = $_POST['name'];
    $description = $_POST['description'];
    $maker = $_POST['maker'];
    $item_condition = $_POST['condition'];
    $stock = $_POST['stock'];
    $number = $_POST['number'];
    $sku = $_POST['sku'];
    $place = $_POST['place'];
    $price = $_POST['price'];
    $sale = $_POST['sale'];

    $count_val = 0;

if($name == ""  ){
    $count_val ++;
}

if($description == ""){
    $count_val ++;
}

if($item_condition == ""){
    $count_val ++;
}

if($stock == ""){
    $count_val ++;
}

if($count_val >= 1){
    $_SESSION['message'] = 'Enter important data* / name, description, condition, stock';
   $_SESSION['message_type'] = 'primary';
}


else{

    $check_query = "SELECT id FROM articulos WHERE number = '$number' OR sku = '$sku'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        $_SESSION['message'] = 'that article already exists';
        $_SESSION['message_type'] = 'primary';
    }

        else{
    $query = "INSERT INTO articulos(name, description, maker, item_condition, stock, 
    number, sku, place, price, sale) VALUES ('$name', '$description', '$maker', '$item_condition', '$stock', 
    '$number', '$sku', '$place', '$price', '$sale')";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed");
   }

   $_SESSION['message'] = 'Article saved succesfully';
   $_SESSION['message_type'] = 'success';
}
}
   header("Location: index.php");


}

?>


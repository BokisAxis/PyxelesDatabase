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
        $query = "SELECT * FROM articulos WHERE id = $id";
        $result = mysqli_query($conn, $query);
        //If the query returns exactly one row, the values ​​are extracted from the columns and assigned to the corresponding variables
        if (mysqli_num_rows($result) == 1){
            $rows = mysqli_fetch_array($result);
            $name = $rows['name'];
            $description = $rows['description'];
            $maker = $rows['maker'];
            $item_condition = $rows['item_condition'];
            $stock = $rows['stock'];
            $number = $rows['number'];
            $sku = $rows['sku'];
            $distributor = $rows['distributor'];
            $price = $rows['price'];
            $sale = $rows['sale'];
            
        }
    }

    if(isset($_POST['update'])){ //check if the form has been submitted with the refresh button
        $id = $_GET['id'];  //gets the value of the “id” parameter
        //assigns the values ​​to the corresponding variables
        $name = $_POST['name'];
        $description = $_POST['description'];
        $maker = $_POST['maker'];
        $item_condition = $_POST['item_condition'];
        $stock = $_POST['stock'];
        $number = $_POST['number'];
        $sku = $_POST['sku'];
        $distributor = $_POST['distributor'];
        $price = $_POST['price'];
        $sale = $_POST['sale'];

        //the query is executed using mysqli_query($conn, $query)
        $query = "UPDATE articulos set name = '$name', description = '$description', maker = '$maker', item_condition = '$item_condition', stock = '$stock', number = '$number',sku = '$sku', distributor = '$distributor', price = '$price', sale = '$sale' WHERE id = $id";
        mysqli_query($conn, $query);
       
        //system for recording user actions
        date_default_timezone_set('America/Mexico_City');
        $DateAndTime = date('m-d-Y H:i:s', time());
        $save_article_message = "Update the article id: $id";
        $query = "INSERT INTO events (username, action, date_time) VALUES ('{$_SESSION['usuario']}', '$save_article_message', '$DateAndTime')";
        $result = mysqli_query($conn, $query);

       $_SESSION['message'] = 'Article Update Successfully';
       $_SESSION['message_type'] = 'primary';
       
        header("location: ../view/form.php");
    }

?> 

<?php include("../view/includes/header.php") ?>

    <!--the form is created to update data -->

<div class="container p-4">
    <div class="row">
        <div class="col-md 4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" value=" <?php echo $name; ?> " class="form-control" placeholder="Update Name">
                    </div>
                    <div class="form-group">
                        <textarea name="description"  rows="2" class="form-control" placeholder="Update Description"> <?php echo $description; ?> </textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="maker" value=" <?php echo $maker; ?> " class="form-control" placeholder="Update Maker">
                    </div>
                    <div class="form-group">
                        <input type="text" name="item_condition" value=" <?php echo $item_condition; ?> " class="form-control" placeholder="Update Condition">
                    </div>
                    <div class="form-group">
                        <input type="text" name="stock" value=" <?php echo $stock; ?> " class="form-control" placeholder="Update Stock">
                    </div>
                    <div class="form-group">
                        <input type="text" name="number" value=" <?php echo $number; ?> " class="form-control" placeholder="Update number">
                    </div>
                    <div class="form-group">
                        <input type="text" name="sku" value=" <?php echo $sku; ?> " class="form-control" placeholder="Update SKU">
                    </div>
                    <div class="form-group">
                        <input type="text" name="distributor" value=" <?php echo $distributor; ?> " class="form-control" placeholder="Update Distributor">
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" value=" <?php echo $price; ?> " class="form-control" placeholder="Update Price">
                    </div>
                    <div class="form-group">
                        <input type="text" name="sale" value=" <?php echo $sale; ?> " class="form-control" placeholder="Update Sale">
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
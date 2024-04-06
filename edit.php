<?php 

    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM articulos WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1){
            $rows = mysqli_fetch_array($result);
            $name = $rows['name'];
            $description = $rows['description'];
            $maker = $rows['maker'];
            $item_condition = $rows['item_condition'];
            $stock = $rows['stock'];
            $number = $rows['number'];
            $sku = $rows['sku'];
            $place = $rows['place'];
            $price = $rows['price'];
            $sale = $rows['sale'];
            
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $maker = $_POST['maker'];
        $item_condition = $_POST['item_condition'];
        $stock = $_POST['stock'];
        $number = $_POST['number'];
        $sku = $_POST['sku'];
        $place = $_POST['place'];
        $price = $_POST['price'];
        $sale = $_POST['sale'];

        $query = "UPDATE articulos set name = '$name', description = '$description', maker = '$maker', item_condition = '$item_condition', stock = '$stock', number = '$number',sku = '$sku', place = '$place', price = '$price', sale = '$sale' WHERE id = $id";
        mysqli_query($conn, $query);
        
       $_SESSION['message'] = 'Article Update Successfully';
       $_SESSION['message_type'] = 'primary';
        
        header("location: index.php");
    }

?> 

<?php include("includes/header.php") ?>

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
                        <input type="text" name="place" value=" <?php echo $place; ?> " class="form-control" placeholder="Update Place">
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

<?php include("includes/footer.php") ?>
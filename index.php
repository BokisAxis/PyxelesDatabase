<?php include ("db.php") ?>

<?php include ("includes/header.php") ?>

    <div class="container p-4">

        <div class="row">

            <div class="col-md-4">

            <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?=$_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); }  ?>

                <div class="card card-body">

                    <form action ="save_article.php" method="POST">


                        <div class="form-group">
                            <input type="text" name="name" class="form-control" 
                            placeholder="NAME" autofocus>
                        </div>

                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control"
                            placeholder="DESCRIPTION"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="text" name="maker" class="form-control" 
                            placeholder="MAKER" autofocus>
                        </div>

                        <div class="form-group">
                            <input type="text" name="condition" class="form-control" 
                            placeholder="CONDITION" autofocus>
                        </div>

                        <div class="form-group">
                            <input type="text" name="stock" class="form-control" 
                            placeholder="STOCK" autofocus>
                        </div>

                        <div class="form-group">
                            <input type="text" name="number" class="form-control" 
                            placeholder="SERIAL NUMBER" autofocus>
                        </div>

                        <div class="form-group">
                            <input type="text" name="sku" class="form-control" 
                            placeholder="SKU" autofocus>
                        </div>

                        <div class="form-group">
                            <input type="text" name="place" class="form-control" 
                            placeholder="PURCHASE PLACE" autofocus>
                        </div>

                        <div class="form-group">
                            <input type="text" name="price" class="form-control" 
                            placeholder="PURCHASE PRICE" autofocus>
                        </div>

                        <div class="form-group">
                            <input type="text" name="sale" class="form-control" 
                            placeholder="PRICE SALE" autofocus>
                        </div>

                            <input type="submit" class="btn btn-success btn-block" 
                            name="save_article" value="Save Article">







                    </form>

                </div>
            

            </div>

            <div class="col-md-8">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Maker</th>
                            <th>item_Condition</th>
                            <th>Stock</th>
                            <th>Number</th>
                            <th>SKU</th>
                            <th>Place</th>
                            <th>Price</th>
                            <th>Sale</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        $query = "SELECT * FROM articulos";
                        $result_articulos = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_articulos)) { ?>

                                <tr>
                                    <td><?php echo $row['id']  ?></td>
                                    <td><?php echo $row['name']  ?></td>
                                    <td><?php echo $row['description']  ?></td>
                                    <td><?php echo $row['maker']  ?></td>
                                    <td><?php echo $row['item_condition']  ?></td>
                                    <td><?php echo $row['stock']  ?></td>
                                    <td><?php echo $row['number']  ?></td>
                                    <td><?php echo $row['sku']  ?></td>
                                    <td><?php echo $row['place']  ?></td>
                                    <td><?php echo $row['price']  ?></td>
                                    <td><?php echo $row['sale']  ?></td>
                                    <td>
                                        <a href="edit.php?id= <?php echo $row['id'] ?> " class="btn btn-secondary"> 
                                            <i class="fas fa-marker"></i>
                                        </a>
                                        <a href="delete_article.php?id= <?php echo $row['id'] ?> " class="btn btn-danger"> 
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                
                                    
                                

                        <?php }   ?> 

                             
                        
                       
                    </tbody>
                </table>

            </div>
        

        </div>

    </div>

<?php include ("includes/footer.php") ?>
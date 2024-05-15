<?php session_start(); ?>
<!-- Include and execute the code of the db.php file that is the connection with our database -->
<?php include ("../model/db.php") ?>  

<!-- Include and execute the code of the header.php file, which is the head of our html -->
<?php include ("includes/header.php") ?>  
        <a href="events.php" class="btn btn-primary">
            <i>Stock history</i>
        </a>

    <div class="container p-4">

        <div class="row">

            <div class="col-md-4">

            <!-- Shows alert message in web interface if session variable is defined -->
            <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?=$_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <!-- Function to remove all session variables -->
            <?php session_unset(); }  ?>

                <!-- Create a container of class card and inside another container of class card-body -->
                <div class="card card-body">

                    <!-- Create a form to send information through the post method to the specified file -->
                    <form action ="../controller/save_article.php" method="POST">


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

            <!-- Creates a container that suggests that it is a column with a specific width -->
            <div class="col-md-8">

                <!-- The “table-bordered” class in Bootstrap is used to add borders to all cells in a table -->
                <table class="table table-bordered">

                    <!-- Table header (thead) with column headers for a data table. Each column corresponds to a specific attribute of the elements in the table -->
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

                        <!-- Retrieves data from the “articles” table of a database and displays it in a table -->
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

                                        <!-- Links are generated to edit or delete each article, using the values ​​of the “id” field. -->
                                        <a href="../controller/edit.php?id= <?php echo $row['id'] ?> " class="btn btn-secondary"> 
                                            <i class="fas fa-marker"></i>
                                        </a>
                                        <a href="../controller/delete_article.php?id= <?php echo $row['id'] ?> " class="btn btn-danger"> 
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

    <a href="../controller/logout.php" class="btn btn-danger">Sign off</a>

    <!-- Include and execute the code of the footer.php file, which is the foot of our html -->
<?php include ("includes/footer.php") ?>
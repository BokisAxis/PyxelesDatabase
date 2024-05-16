<?php session_start();?>
<!-- Include and execute the code of the db.php file that is the connection with our database -->
<?php include ("../model/db.php") ?>  

<?php if (!isset($_SESSION['usuario'])) {
    // Redirige al formulario de inicio de sesión o muestra un mensaje de error
    header('Location: ../index.php');
    exit;
}
?>

<!-- Include and execute the code of the header.php file, which is the head of our html -->
<?php include ("includes/header.php") ?> 

        <a href="form.php" class="btn btn-primary">
            <i>Go Back</i>
        </a>

    <div class="container p-4">

        <div class="row">
            <!-- Creates a container that suggests that it is a column with a specific width -->
            <div class="col-md-12">
                <!-- The “table-bordered” class in Bootstrap is used to add borders to all cells in a table -->
                <table class="table table-bordered">
                    <!-- Table header (thead) with column headers for a data table. Each column corresponds to a specific attribute of the elements in the table -->
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Action</th>
                            <th>Date_Time</th>
                        </tr>
                    </thead>
                </div>
            </div>
        </div>
    </div>
    <style>
        th:nth-child(3), td:nth-child(3) {
        width: 20%;
        }
        th:nth-child(2), td:nth-child(2) {
        width: 65%;
        }
        th:nth-child(1), td:nth-child(1) {
        width: 20%;
        }
    </style>
<?php
$query = "SELECT * FROM events";
                        $result_events = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_events)) { ?>

                                <tr>
                                    <td><?php echo $row['username']  ?></td>
                                    <td><?php echo $row['action']  ?></td>
                                    <td><?php echo $row['date_time']  ?></td>
                                </tr>
                                <?php }   ?>
                        


</body>
</html>
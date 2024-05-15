<?php session_start();?>
<!-- Include and execute the code of the db.php file that is the connection with our database -->
<?php include ("../model/db.php") ?>  

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


</body>
</html>
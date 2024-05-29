<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PYXELES DATABASE</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="#" class="navbar-brand">PYXELES DATABASE</a>

        <!-- search module -->
        <form class="d-flex" method="post">
        
        <a href="form.php" class="btn btn-danger">
         <i>X</i>
        </a>
           
  <input class="form-control me-2" type="search" name="search" placeholder="Buscar" aria-label="Buscar">
  <button class="btn btn-outline-success" type="submit">Buscar</button>
</form>

        <!-- Dropdown menu -->
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-bars"></i> <!-- Icono de tres barras -->
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="../controller/singIn.php">Register new user</a></li>
                <li><a class="dropdown-item" href="events.php">Log history</a></li>
                <li><a class="dropdown-item" href="../controller/logout.php">Sign off</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Resto de tu contenido aquí -->

<!-- Scripts de Bootstrap y otros scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."></script>

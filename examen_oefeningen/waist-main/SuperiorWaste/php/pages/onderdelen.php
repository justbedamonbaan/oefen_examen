<?php

session_start();

if (empty($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}


require("../classes/data.class.php");


?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Superior Waste</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Inname</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Verwerking</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Uitgifte</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Rapportage</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Onderhoud
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="apparaten.php">Apparaten</a>
          <a class="dropdown-item" href="onderdelen.php">Onderdelen</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Innames</a>
          <a class="dropdown-item" href="#">Uitgiftes</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<a href="add_onderdeel.php"><button type="button" class="btn btn-primary" style="margin: 10px">Toevoegen</button></a>
<table>
    <thead>
        <tr>
            <th>Naam</th>
            <th>Omschrijving</th>
            <th>VoorraadKg</th>
            <th>PrijsPerKg</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        
        $onderdelen = new Data();
        $onderdelen->getOnderdelen();
        
        
        ?>
    </tbody>
</table>
    
</body>
</html>
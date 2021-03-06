<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rent A Car</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body style="background: linear-gradient(to top,white, grey) no-repeat fixed center;">


<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
  <a class="navbar-brand" href="#">RentACar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="routes.php?page=showvozilo">Unos vozila </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="routes.php?page=showvozac">Unos vozača</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="routes.php?page=showvozacvozilo">Dodela vozila vozaču </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="routes.php?page=alldrivers">Prikaz vozača </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="routes.php?page=allcars">Prikaz vozila </a>
      </li>
     <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Izlogujte se</button>
    </form>
  </div>
</nav>

<div class="container text-center col-4">

<?php
require_once '../model/DAO.php';

$dao = new DAO();

$allcars=$dao->getAllCars();
$alldrivers=$dao->getAllDrivers();
?>


<form action="routes.php">

<h3>Izaberite vozilo</h3>
<select name="idvzl" class="form-control">
<option value=""></option>
<?php
   foreach($allcars as $car){
       // u value od option taga moramo upisivati id vozila iz baze zato sto prilikom dodele treba da u bazu smesti id 
       echo "<option value='$car[idvzl]'> $car[imeproizvodjaca] $car[model] $car[godistevozila]</option>";
   }
?>
</select>
<br>

<h3>Izaberite vozača</h3>
<select name="idvoz" class="form-control">
<option value=""></option>
<?php
   foreach($alldrivers as $driver){
       // u value od option taga moramo upisivati id vozila iz baze zato sto prilikom dodele treba da u bazu smesti id 
       echo "<option value='$driver[idvoz]'>$driver[imevozaca] $driver[prezimevozaca]</option>";
   }
?>
</select>
<br>
<input type="submit" class="form-control btn btn-secondary"name="page" value="dodela">

</form>
<?php
$msg=isset($msg)?$msg:"";
echo "<span style=color:blue;>$msg</span><br>";
 ?> 

</div>
 
<footer class="fixed-bottom bg-dark">
<div class="container">
<p class="text-center text-white"> Copyright 2019, Novi Sad </p>
</div>
</footer>




   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
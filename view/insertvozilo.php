<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="background: linear-gradient(to top,white, grey) no-repeat fixed center;">
<?php
require_once '../model/DAO.php';
$dao=new DAO();

$allproducers=$dao->getAllProducers();

$allcategories=$dao->getAllCategories();

//kupljenje msg i errors niza sa kontrolera
$msg=isset($msg)?$msg:"";

$errors=isset($errors)?$errors:array();

?>

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

<h1>Unos vozila</h1>

<form action="routes.php">
<p>Izaberite proizvođača</p>
<select name="imeproizvodjaca" class="form-control">
<option value=""></option>
<?php
foreach($allproducers as $p){
    echo "<option value='$p[imeproizvodjaca]'>$p[imeproizvodjaca]</option>";
}

?>
</select>
<br>

<input type="text" class="form-control" name="model" placeholder="Unesite model vozila">
<br>

<input type="text" class="form-control" name="godistevozila" placeholder="Unesite godište vozila">
<br>

<input type="text" class="form-control" name="kubikaza" placeholder="Unesite kubikažu vozila">
<br>

<input type="number" class="form-control" name="cena" placeholder="Unesite cenu vozila">
<span style=color:orange;>*
<?php if (array_key_exists('cena', $errors)) {
   echo $errors['cena']; 
} 
?></span>
<br>

<p>Izaberite kategoriju</p>
<select name="kategorija" class="form-control">
<option value=""></option>
<?php
foreach($allcategories as $p){
    echo "<option value='$p[kategorija]'>$p[kategorija]</option>";
}

?>

</select>
<br>

<input type="submit" class=" form-control btn btn-secondary" name="page" value="Dodaj vozilo">

<br>
</form>

<?php
echo "<span style=color:red;>$msg</span><br>";

//var_dump($errors);

//foreach($errors as $err){

//    echo "<span style=color:orange;>$err</span><br>";
//}
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
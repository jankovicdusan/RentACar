<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body  style="background: linear-gradient(to top,white, grey) no-repeat fixed center;">

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

<div class="container text-center col-8">
<?php

$idizmenjenog=isset($driver['idvoz'])?$driver['idvoz']:"";

?>


    <table class="table table-striped table-sm table-dark mt-5">
     <tr>
        <th>Ime</th>
        <th>Prezime</th>
        <th>Godište</th>
        <th colspan="2">Akcija</th>
     </tr>

     <?php  foreach($drivers as $driver){  
        
        if($driver['idvoz']==$idizmenjenog){
        ?>
         <tr style=background-color:orange;>
         <td><?php echo $driver['imevozaca']  ?></td>
         <td><?php echo $driver['prezimevozaca']  ?></td>
         <td><?php echo $driver['godistevozaca'] ?></td>
         <td><a href="routes.php?page=showeditdriver&idvoz=<?php echo $driver['idvoz'] ?>" class="btn btn-warning">Edit</a></td>
         <td><a href="routes.php?page=deletedriver&idvoz=<?php echo $driver['idvoz'] ?>" class="btn btn-danger">Delete</a></td>
        </tr>

        <?php }else{ ?>
        <tr>
         <td><?php echo $driver['imevozaca']  ?></td>
         <td><?php echo $driver['prezimevozaca']  ?></td>
         <td><?php echo $driver['godistevozaca'] ?></td>
         <td><a href="routes.php?page=showeditdriver&idvoz=<?php echo $driver['idvoz'] ?>"class="btn btn-warning">Edit</a></td>
         <td><a href="routes.php?page=deletedriver&idvoz=<?php echo $driver['idvoz'] ?>" class="btn btn-danger">Delete</a></td>
        </tr>

     <?php 
     }
   } 
   ?>

    </table>

    <?php
      $msg=isset($msg)?$msg:"";
      echo "<span style=color:blue;>$msg</span>";

      //kupljenje msg i errors niza sa kontroler

       $errors=isset($errors)?$errors:array();
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
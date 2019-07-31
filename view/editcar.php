<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    
<?php
      $msg=isset($msg)?$msg:"";
      echo "<span style=color:blue;>$msg</span>";

      //kupljenje msg i errors niza sa kontroler

       $errors=isset($errors)?$errors:array();

     $imeproizvodjaca=isset($imeproizvodjaca)?$imeproizvodjaca:"";
     $model=isset($model)?$model:"";
     $godistevozila=isset($godistevozila)?$godistevozila:"";
     $kubikaza=isset($kubikaza)?$kubikaza:"";
     $cena=isset($cena)?$cena:"";
     $kategorija=isset($kategorija)?$kategorija:"";

     
    ?>

<form action="routes.php" method="get">

<input type="text" name="imeproizvodjaca" value="<?php if(isset($car['imeproizvodjaca'])) {echo $car['imeproizvodjaca'];}else{echo $imeproizvodjaca;} ?>">
<span><?php if(array_key_exists('imeproizvodjaca', $errors)) echo $errors['imeproizvodjaca'] ?></span>
<br><br>
<input type="text" name="model" value="<?php if(isset($car['model'])){ echo $car['model'];}else{echo $model;} ?>">
<span><?php if(array_key_exists('prezimevozaca', $errors)) echo $errors['prezimevozaca'] ?></span>
<br><br>
<input type="text" name="godistevozila" value="<?php if(isset($car['godistevozila'])) {echo $car['godistevozila'];}else{echo $godistevozila;} ?>">
<span><?php if(array_key_exists('godistevozila', $errors)) echo $errors['godistevozila'] ?></span>
<br><br>
<input type="text" name="kubikaza" value="<?php if(isset($car['kubikaza'])) {echo $car['kubikaza'];}else{echo $kubikaza;} ?>">
<span><?php if(array_key_exists('kubikaza', $errors)) echo $errors['kubikaza'] ?></span>
<br><br>
<input type="text" name="cena" value="<?php if(isset($car['cena'])) {echo $car['cena'];}else{echo $cena;} ?>">
<span><?php if(array_key_exists('cena', $errors)) echo $errors['cena'] ?></span>
<br><br>
<input type="text" name="kategorija" value="<?php if(isset($car['kategorija'])) {echo $car['kategorija'];}else{echo $kategorija;} ?>">
<span><?php if(array_key_exists('kategorija', $errors)) echo $errors['kategorija'] ?></span>
<br><br>

<!-- hidden nam omogucava da kao skriveni podatak prosledimo kontroleru i idvzl-->
<input type="hidden" name="idvzl" value="<?php if(isset($car['idvzl'])) echo $car['idvzl']; ?>"><br><br>

<input type="submit" name="page" value="Izmena vozila"><br><br>
</form>


</body>
</html>
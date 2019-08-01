<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rent A Car</title>
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

     $imevozaca=isset($imevozaca)?$imevozaca:"";
     $prezimevozaca=isset($prezimevozaca)?$prezimevozaca:"";
     $godistevozaca=isset($godistevozaca)?$godistevozaca:"";

     
    ?>

<form action="routes.php" method="get">

<input type="text" name="imevozaca" value="<?php if(isset($driver['imevozaca'])){echo $driver['imevozaca'];}else{ echo $imevozaca;} ?>">
<span><?php if(array_key_exists('imevozaca', $errors)) echo $errors['imevozaca'] ?></span>
<br><br>
<input type="text" name="prezimevozaca" value="<?php if(isset($driver['prezimevozaca'])){ echo $driver['prezimevozaca'];}else{echo $prezimevozaca;} ?>">
<span><?php if(array_key_exists('prezimevozaca', $errors)) echo $errors['prezimevozaca'] ?></span>
<br><br>
<input type="text" name="godistevozaca" value="<?php if(isset($driver['godistevozaca'])) {echo $driver['godistevozaca'];}else{echo $godistevozaca;} ?>">
<span><?php if(array_key_exists('godistevozaca', $errors)) echo $errors['godistevozaca'] ?></span>
<br><br>

<!-- hidden nam omogucava da kao skriveni podatak prosledimo kontroleru i idvoz-->
<input type="hidden" name="idvoz" value="<?php if(isset($driver['idvoz'])) echo $driver['idvoz']; ?>"><br><br>

<input type="submit" name="page" value="Izmena vozača"><br><br>
</form>


</body>
</html>
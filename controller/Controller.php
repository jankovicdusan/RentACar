<?php
require_once '../model/DAO.php';

class Controller{

public function showVozilo(){

    include 'insertvozilo.php';
}

public function insertVozilo(){

    $imeproizvodjaca=isset($_GET['imeproizvodjaca'])?$_GET['imeproizvodjaca']:"";
    $model=isset($_GET['model'])?$_GET['model']:"";
    $godistevozila=isset($_GET['godistevozila'])?$_GET['godistevozila']:"";
    $kubikaza=isset($_GET['kubikaza'])?$_GET['kubikaza']:"";
    $cena=isset($_GET['cena'])?$_GET['cena']:"";
    $kategorija=isset($_GET['kategorija'])?$_GET['kategorija']:"";

    //posto gresaka moze biti vise sve greske cemo pakovati u niz errors
  $errors=array();

  if(empty($imeproizvodjaca)){
      $errors['imeproizvodjaca']="Morate izabrati proizvođača";
  }
  
  if(empty($model)){
    $errors['model']="Morate uneti model vozila";
  }
  
  if(empty($godistevozila)){
   $errors['godistevozila']="Morate uneti godište vozila";
 }else{
  //ako je uneto neko godiste tj neki podatak
    if(is_numeric($godistevozila)){
    // pisemo uslov da godiste mora biti izmedju 1980 i 2019
   
       if($godistevozila<1980 || $godistevozila>2019){
           $errors['godistevozila']="Morate uneti godište izmedju 1980 i 2019";
       }

    }else{
       $errors['godistevozila']="Morate uneti numericku vrednost";
    }
 }

 if(empty($kubikaza)){
   $errors['kubikaza']="Morate uneti kubikazu vozila";
 }else{

    if(is_numeric($kubikaza)){

       if($kubikaza<49 || $kubikaza>6000){
           $errors['kubikaza']="Morate uneti kubikazu izmedju 49 i 6000 kubika";
       }

    }else{
       $errors['kubikaza']="Morate uneti numericku vrednost";
    }
 }

  if(empty($cena)){
    $errors['cena']="Morate uneti cenu vozila";
  }else{

     if(is_numeric($cena)){

        if($cena<=0){
            $errors['cena']="Cena mora biti veća od nula";
        }

     }else{
        $errors['cena']="Morate uneti numeričku vrednost";
     }
  }

  if(empty($kategorija)){
    $errors['kategorija']="Morate izabrati kategoriju vozila";
  }

  if(count($errors)==0){
// ako dodjemo u ovaj blok znaci da je forma popunjena pravilno tj da nema gresaka

$dao=new DAO();

  $dao->insertVozilo($imeproizvodjaca,$model,$godistevozila,$kubikaza,$cena,$kategorija);

  $msg="Uspešan unos";
  include 'insertvozilo.php';

  }else{

   $msg="Molimo Vas popunite sva polja ispravno.";
   include 'insertvozilo.php';
  }
}

// metoda za unos vozača
public function showVozac(){

   include 'insertvozac.php';
}

public function insertVozac(){

   $imevozaca=isset($_GET['imevozaca'])?$_GET['imevozaca']:"";
   $prezimevozaca=isset($_GET['prezimevozaca'])?$_GET['prezimevozaca']:"";
   $godistevozaca=isset($_GET['godistevozaca'])?$_GET['godistevozaca']:"";

   //posto gresaka moze biti vise sve greske cemo pakovati u niz errors
 $errors=array();

 if(empty($imevozaca)){
     $errors['imevozaca']="Morate uneti ime vozača";
 }
 
 if(empty($prezimevozaca)){
   $errors['prezimevozaca']="Morate uneti prezime vozača";
 }

 if(empty($godistevozaca)){
   $errors['godistevozaca']="Morate uneti godište vozača";
 }else{
  //ako je uneto neko godiste tj neki podatak
    if(is_numeric($godistevozaca)){
    
      // pisemo uslov da godiste mora biti izmedju 1980 i 2019
       if($godistevozaca<1980 || $godistevozaca>2019){
           $errors['godistevozaca']="Morate uneti godište izmedju 1980 i 2019";
       }

    }else{
       $errors['godistevozaca']="Morate uneti numeričku vrednost";
    }
 }

 if(count($errors)==0){
// ako dodjemo u ovaj blok znaci da je forma popunjena pravilno tj da nema gresaka

$dao=new DAO();

 $dao->insertVozac($imevozaca,$prezimevozaca,$godistevozaca); 

 $msg="Uspešan unos";
 include 'insertvozac.php';

 }else{

  $msg="Molimo Vas popunite sva polja ispravno.";
  include 'insertvozac.php';
 }
}

public function showVozacVozilo(){
   include 'vozacvozilo.php';
}

public function dodeli(){

$idvzl=isset($_GET['idvzl'])?$_GET['idvzl']:"";
$idvoz=isset($_GET['idvoz'])?$_GET['idvoz']:"";

if(!empty($idvzl) && !empty($idvoz)){

   $dao= new DAO();

   $dao->insertVozacVozilo($idvzl,$idvoz);
   $msg="Uspešna dodela, vozač je zadužio vozilo.";
   include 'vozacvozilo.php';

}else{
   $msg="Molimo Vas izaberite vozilo i vozača.";
   include 'vozacvozilo.php';
}

}

public function allDrivers(){

   $dao=new DAO();

   $drivers=$dao->getAllDrivers();

   include 'alldrivers.php';
}

public function allCars(){

   $dao=new DAO();

   $cars=$dao->getAllCars();

   include 'allcars.php';
}

public function deleteDriver(){

   $idvoz=isset($_GET['idvoz'])?$_GET['idvoz']:"";

   if(!empty($idvoz)){
      $dao = new DAO();

      $dao->deleteDriver($idvoz);
      // nakon brisanja izvlacimo iz baze listu vozaca ponovo
      $drivers=$dao->getAllDrivers();
      $msg="Podatak obrisan";
      
      include 'alldrivers.php';
   }

}

public function deleteCar(){

   $idvzl=isset($_GET['idvzl'])?$_GET['idvzl']:"";

   if(!empty($idvzl)){
      $dao = new DAO();

      $dao->deleteCar($idvzl);
      // nakon brisanja izvlacimo iz baze listu vozaca ponovo
      $cars=$dao->getAllCars();
      $msg="Podatak obrisan";
      
      include 'allcars.php';
   }

}

public function showEditDriver(){

   $idvoz=isset($_GET['idvoz'])?$_GET['idvoz']:"";

   if(!empty($idvoz)){
      $dao = new DAO();

     $driver= $dao->getDriverById($idvoz);
     include 'editdriver.php';
   }

}

public function editDriver(){


   $imevozaca=isset($_GET['imevozaca'])?$_GET['imevozaca']:"";
   $prezimevozaca=isset($_GET['prezimevozaca'])?$_GET['prezimevozaca']:"";
   $godistevozaca=isset($_GET['godistevozaca'])?$_GET['godistevozaca']:"";
   $idvoz=isset($_GET['idvoz'])?$_GET['idvoz']:"";

   $errors=array();

   if(empty($imevozaca)){
       $errors['imevozaca']="Morate uneti ime vozača";
   }

   if(empty($prezimevozaca)){
       $errors['prezimevozaca']="Morate uneti prezime vozača";
   }

   if(empty($godistevozaca)){
       $errors['godistevozaca']="Morate uneti godište vozača";
   }else{
       if(is_numeric($godistevozaca)){
           if($godistevozaca<1940 || $godistevozaca>1999){
               $errors['godistevozaca']="Morate uneti godište između 1940 i 1999.";
           }
       }else{
           $errors['godistevozaca']="Morate uneti numericku vrednost.";
       }
   }
   
   if(count($errors)==0){
       $dao=new DAO();
    
       $dao->updateDriver($imevozaca,$prezimevozaca,$godistevozaca,$idvoz);

       $msg="Podatak izmenjen";
       $drivers=$dao->getAllDrivers();
       $driver= $dao->getDriverById($idvoz);
       include 'alldrivers.php';

   }else{
       $msg="Molimo Vas da pravilno popunite formu.";
   
       include 'editdriver.php';
  }
}

  // Metoda za Edit vozila na strani prikaz vozila
  public function showEditCar(){

   $idvzl=isset($_GET['idvzl'])?$_GET['idvzl']:"";

   if(!empty($idvzl)){
      $dao = new DAO();

     $car= $dao->getCarById($idvzl);
     include 'editcar.php';
   }

}

public function editCar(){


   $imeproizvodjaca=isset($_GET['imeproizvodjaca'])?$_GET['imeproizvodjaca']:"";
   $model=isset($_GET['model'])?$_GET['model']:"";
   $godistevozila=isset($_GET['godistevozila'])?$_GET['godistevozila']:"";
   $kubikaza=isset($_GET['kubikaza'])?$_GET['kubikaza']:"";
   $cena=isset($_GET['cena'])?$_GET['cena']:"";
   $kategorija=isset($_GET['kategorija'])?$_GET['kategorija']:"";
   $idvzl=isset($_GET['idvzl'])?$_GET['idvzl']:"";

   $errors=array();

   if(empty($imeproizvodjaca)){
       $errors['imeproizvodjaca']="Morate uneti ime proizvođača";
   }

   if(empty($model)){
       $errors['model']="Morate uneti model vozila";
   }

   if(empty($godistevozila)){
       $errors['godistevozila']="Morate uneti godište vozila";
   }else{
       if(is_numeric($godistevozila)){
           if($godistevozila<1940 || $godistevozila>2019){
               $errors['godistevozila']="Morate uneti godište između 1940 i 2019.";
           }
       }else{
           $errors['godistevozila']="Morate uneti numeričku vrednost.";
       }
   }

   if(empty($kubikaza)){
      $errors['kubikaza']="Morate uneti kubikažu vozila";
  }

  if(empty($cena)){
   $errors['cena']="Morate uneti cenu vozila";
  }else{

   if(is_numeric($cena)){

      if($cena<=0){
          $errors['cena']="Cena mora biti veća od nula";
      }

   }else{
      $errors['cena']="Morate uneti numeričku vrednost";
   }
}

if(empty($kategorija)){
   $errors['kategorija']="Morate uneti kategoriju vozila";
}

   if(count($errors)==0){
       $dao=new DAO();
    
       $dao->updateCar($imeproizvodjaca,$model,$godistevozila,$kubikaza, $cena, $kategorija, $idvzl);

       $msg="Podatak izmenjen";
       $cars=$dao->getAllCars();
       $car= $dao->getCarById($idvzl);
       include 'allcars.php';

   }else{
       $msg="Molimo Vas da pravilno popunite formu.";
   
       include 'editcar.php';
  }




}

public function login(){

   $username=isset($_POST['username'])?$_POST['username']:"";
   $email=isset($_POST['email'])?$_POST['email']:"";
   $password=isset($_POST['password'])?$_POST['password']:"";

if(!empty($username)&&!empty($email)&&!empty($password)){

   $dao=new DAO();

   $ulogovan=$dao->Login($username,$email,$password);

   if($ulogovan){
// logovanje proslo
  session_start();
  $_SESSION['ulogovan']=serialize($ulogovan);
  include 'index.php';

   }else{
      $msg="Pogrešno uneti podaci";
      include 'login.php';
   }


}else{
   $msg="Morate popuniti sva polja";
   include 'login.php';
}

}

public function logout(){
session_start();
session_unset();
seesion_destroy();
header('Location:login.php');

}


}

?>
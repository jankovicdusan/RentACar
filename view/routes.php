<?php
require_once '../controller/Controller.php';

//rute moraju biti povezane sa kontrolerom

// Proveramo svaku rutu i upucujemo klijenta na odredjenu metodu u kontroleru

$controller = new Controller();

$page=isset($_GET['page'])?$_GET['page']:"";

switch($page){

  case 'showvozilo':
  $controller->showVozilo();
  break;

  case 'Dodaj vozilo':
  $controller->insertVozilo();
  break;

  //ruta za unos vozača
  case 'showvozac':
  $controller->showVozac();
  break;

  case 'Dodaj vozača':
  $controller->insertVozac();
  break;

  case 'showvozacvozilo':
  $controller->showVozacVozilo();
  break;

  case 'dodela':
  $controller->dodeli();
  break;

  case 'alldrivers':
  $controller->allDrivers();
  break;
  
  case 'allcars':
  $controller->allCars();
  break;

  case 'deletedriver':
  $controller->deleteDriver();
  break;

  case 'deletecar':
  $controller->deleteCar();
  break;

  case 'showeditdriver':
  $controller->showEditDriver();
  break;

  case 'Izmena vozača':
  $controller->editDriver();
  break;

  case 'showeditcar':
  $controller->showEditCar();
  break;

  case 'Izmena vozila':
  $controller->editCar();
  break;

  case 'logout':
  $controller->logout();
  break;

  case 'login':
  $controller->login();
  break;
}

if($_SERVER['REQUEST_METHOD']=='POST'){

  $page=isset($_POST['page'])?$_POST['page']:"";

  switch($page){

   case 'Ulogujte se':
   $controller->login();
   break;


  }

}

?>
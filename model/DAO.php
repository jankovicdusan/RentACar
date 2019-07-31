<?php
require_once '../config/db.php';


class DAO{
    
    private $db;

    private $GETALLPRODUCERS="SELECT * FROM proizvodjaci ORDER BY imeproizvodjaca ASC";
    private $GETALLCATEGORIES="SELECT * FROM kategorije";

    private $INSERTVOZILO="INSERT INTO vozila(imeproizvodjaca,model,godistevozila,kubikaza,cena,kategorija) VALUES (?,?,?,?,?,?)";

    private $INSERTVOZAC="INSERT INTO vozaci(imevozaca,prezimevozaca,godistevozaca) VALUES (?,?,?)";

    private $GETALLDRIVERS="SELECT * FROM vozaci ORDER BY imevozaca ASC";
    private $GETALLCARS="SELECT * FROM vozila ORDER BY imeproizvodjaca ASC";

    private $INSERTVOZACVOZILO ="INSERT INTO vozilavozaci (idvzl, idvoz,vremedodele) VALUES (?,?,CURRENT_TIMESTAMP)";

    private $DELETEDRIVER ="DELETE FROM vozaci WHERE idvoz = ?";

    private $DELETECAR ="DELETE FROM vozila WHERE idvzl = ?";

    private $GETDRIVERBYID="SELECT * FROM vozaci WHERE idvoz=?";

    private $GETCARBYID="SELECT * FROM vozila WHERE idvzl=?";

    private $UPDATEDRIVER="UPDATE vozaci SET imevozaca=?, prezimevozaca=?, godistevozaca=? WHERE idvoz=?";

    private $UPDATECAR="UPDATE vozila SET imeproizvodjaca=?, model=?, godistevozila=?, kubikaza=?, cena=?, kategorija=? WHERE idvzl=?";

    
    private $LOGIN="SELECT * FROM users WHERE username=?, email=? AND password=?";
    
    
    public function __construct(){
        $this->db= DB::createInstance();
    }


    public function getAllProducers(){
     $statement=$this->db->prepare($this->GETALLPRODUCERS);
     $statement->execute();

    $result=$statement->fetchAll();
    return $result;
    }

    public function getAllCategories(){
        $statement=$this->db->prepare($this->GETALLCATEGORIES);
        $statement->execute();
   
       $result=$statement->fetchAll();
       return $result;
       }

       public function insertVozilo($imeproizvodjaca,$model,$godistevozila,$kubikaza,$cena,$kategorija){
        $statement=$this->db->prepare($this->INSERTVOZILO);
        $statement->bindValue(1,$imeproizvodjaca);
        $statement->bindValue(2,$model);
        $statement->bindValue(3,$godistevozila);
        $statement->bindValue(4,$kubikaza);
        $statement->bindValue(5,$cena);
        $statement->bindValue(6,$kategorija);
        $statement->execute();
   
       }

       public function insertVozac($imevozaca,$prezimevozaca,$godistevozaca){
        $statement=$this->db->prepare($this->INSERTVOZAC);
        $statement->bindValue(1,$imevozaca);
        $statement->bindValue(2,$prezimevozaca);
        $statement->bindValue(3,$godistevozaca);
        $statement->execute();
   
       }
   

       public function getAllDrivers(){
        $statement=$this->db->prepare($this->GETALLDRIVERS);
        $statement->execute();
   
       $result=$statement->fetchAll();
       return $result;
       }

       public function getAllCars(){
        $statement=$this->db->prepare($this->GETALLCARS);
        $statement->execute();
   
       $result=$statement->fetchAll();
       return $result;
       }


       public function insertVozacVozilo($idvzl, $idvoz){
        $statement=$this->db->prepare($this->INSERTVOZACVOZILO);

        $statement->bindValue(1,$idvzl);
        $statement->bindValue(2,$idvoz);
       
        $statement->execute();
   
       }
   
public function deleteDriver($idvoz){
        $statement=$this->db->prepare($this->DELETEDRIVER);
        $statement->bindValue(1,$idvoz);
        $statement->execute();
       }

       public function deleteCar($idvzl){
        $statement=$this->db->prepare($this->DELETECAR);
        $statement->bindValue(1,$idvzl);
        $statement->execute();
       }


       public function getDriverById($idvoz){
        $statement=$this->db->prepare($this->GETDRIVERBYID);
        $statement->bindValue(1,$idvoz);
        $statement->execute();
   
        $result=$statement->fetch();
        return $result;
       }

       public function getCarById($idvzl){
        $statement=$this->db->prepare($this->GETCARBYID);
        $statement->bindValue(1,$idvzl);
        $statement->execute();
   
        $result=$statement->fetch();
        return $result;
       }

       public function updateDriver($imevozaca,$prezimevozaca,$godistevozaca,$idvoz){
        $statement=$this->db->prepare($this->UPDATEDRIVER);
        $statement->bindValue(1,$imevozaca);
        $statement->bindValue(2,$prezimevozaca);
        $statement->bindValue(3,$godistevozaca);
        $statement->bindValue(4,$idvoz);
        $statement->execute();
   
      
       }

       public function updateCar($imeproizvodjaca,$model,$godistevozila,$kubikaza, $cena, $kategorija, $idvzl){
        $statement=$this->db->prepare($this->UPDATECAR);
        $statement->bindValue(1,$imeproizvodjaca);
        $statement->bindValue(2,$model);
        $statement->bindValue(3,$godistevozila);
        $statement->bindValue(4,$kubikaza);
        $statement->bindValue(5,$cena);
        $statement->bindValue(6,$kategorija);
        $statement->bindValue(7,$idvzl);
        $statement->execute();
   
      
       }

       public function Login($username,$email,$password){
        $statement=$this->db->prepare($this->LOGIN);
        $statement->bindValue(1,$username);
        $statement->bindValue(2,$email);
        $statement->bindValue(3,$password);
        $statement->execute();
   
       $result=$statement->fetch();
       return $result;
       }






}




?>
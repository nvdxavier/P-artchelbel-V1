<?php
    

class ModelsProduct extends Model{
	//pour utiliser une fonction de Model il faut faire = $this->nomdelafonction();
      private $db;

        public function __construct($db) {
        $this->db = $db;
    }  

    
    public function getSpecial($cPage,$perPage){
     
    $query = $this->db->prepare("SELECT * FROM `products` ORDER BY date DESC LIMIT ".(($cPage-1) * $perPage).",$perPage");
    try{
        $query->execute();
    }catch(PDOException $e){
        die($e->getMessage());
    }
    return $query->fetchAll(PDO::FETCH_ASSOC);
    }//FIN PUBLIC FUNCTION GETSPECIAL	

    public function popup($id){
     
    $query = $this->db->prepare("SELECT * FROM `products` WHERE id_product = $id");
    try{
        $query->execute();
    }catch(PDOException $e){
        die($e->getMessage());
    }
    return $query->fetchAll(PDO::FETCH_ASSOC);
    }//FIN PUBLIC FUNCTION GETSPECIAL   



}

$modelsprod = new ModelsProduct($db);
?>
<?php
    

class Poprod extends Model{
	//pour utiliser une fonction de Model il faut faire = $this->nomdelafonction();
      private $db;

        public function __construct($db) {
        $this->db = $db;
    }

public function compte(){
  $query = $this->db->prepare("SELECT id_product1,id_product2,id_product3,id_product4,id_product5,id_product6,id_product7 FROM `order_history` ");
  try{
        $query->execute();
    }catch(PDOException $e){
        die($e->getMessage());
    }
    return $query->fetchAll(PDO::FETCH_ASSOC);

}

public function topprod($liste,$cPage,$perPage){
  $query = $this->db->prepare("SELECT * FROM `products` WHERE id_product IN(".$liste.") LIMIT ".(($cPage-1) * $perPage).",$perPage");
  try{
        $query->execute();
    }catch(PDOException $e){
        die($e->getMessage());
    }
    return $query->fetchAll(PDO::FETCH_ASSOC);

}


public function getMarking($k){
  $query = $this->db->prepare("SELECT * FROM `products` WHERE id_product = $k ");
  try{
        $query->execute();
    }catch(PDOException $e){
        die($e->getMessage());
    }
    return $query->fetch(PDO::FETCH_ASSOC);

}


/*public function getMarking(){


$query = $this->db->prepare("SELECT id_product_comment FROM comment WHERE marking >= 4");

try{
        $query->execute();
    }catch(PDOException $e){
        die($e->getMessage());
    }
    return $query->fetchAll(PDO::FETCH_ASSOC);

}//FIN PUBLIC FUNCTION GETMARKING


//public function getPoprod($cPage,$perPage){
public function getPoprod($id_product_list){
        
        $query = $this->db->prepare("SELECT title, id_product, marking, id_product_comment
FROM products
INNER JOIN COMMENT ON ( id_product = id_product_comment )
WHERE (
SELECT COUNT( id_product = id_product_comment )
FROM COMMENT ORDER BY id_product ASC
)");
//LIMIT ".(($cPage-1) * $perPage).",$perPage

$query = $this->db->prepare("SELECT * FROM products INNER JOIN order_history ON id_product IN(".$id_product_list.") ");
    try{
        $query->execute();
    }catch(PDOException $e){
        die($e->getMessage());
    }
    return $query->fetchAll(PDO::FETCH_OBJ);
//    return $query->fetchAll(PDO::FETCH_ARRAY);
}*///FIN PUBLIC FUNCTION GETSPECIAL


}

$poprod = new Poprod($db);

//$kk = selectionne moi tout les avis ayant un quota de marking >= 4 supérieur ou égal à 4
//si le nombre de $kk est supérieur à 5 alors affiche les $kk.
/*$kk = SELECT id_product_comment FROM comment WHERE marking >= 4';
if(COUNT($kk) > 5){
$gg = 'SELECT * FROM products INNER JOIN comment ON(id_product=id_product_comment)
ORDER BY marking';
}*/

?>
<?php
class Promoprod extends Model{
private $db;

        public function __construct($db) {
        $this->db = $db;
    }

    public function getpromo($a,$b,$c){
       	$query = $this->db->prepare("SELECT * FROM `products` WHERE special_price IS NOT NULL AND generated_string IN($a, $b, $c)");   
       	//$query = $this->db->prepare("SELECT * FROM `products` WHERE special_price IS NOT NULL AND generated_string IN($a, $b, $c) ORDER BY date DESC LIMIT ".(($cPage-1) * $perPage).",$perPage");   
		   	try{ 
		$query->execute();
		}catch(PDOException $e){
		die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}
    
public function promoprod($liste,$cPage,$perPage){
  $query = $this->db->prepare("SELECT * FROM `products` WHERE id_product IN(".$liste.") LIMIT ".(($cPage-1) * $perPage).",$perPage");
  try{
        $query->execute();
    }catch(PDOException $e){
        die($e->getMessage());
    }
    return $query->fetchAll(PDO::FETCH_ASSOC);

}


}
$promo = new Promoprod($db);
?>
<?php
class OrderHistory extends Model{
//pour utiliser une fonction de Model il faut faire = $this->nomdelafonction();	
private $db;

        public function __construct($db) {
        $this->db = $db;
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function gethistorder($id_users){
      $query = $this->db->prepare("SELECT * FROM `order_history` WHERE id_users = ".$id_users." ORDER BY order_date DESC");   

try{ 
$query->execute();
}catch(PDOException $e){
die($e->getMessage());
}
return $query->fetchAll(PDO::FETCH_ASSOC);
}


public function getproduct($id_product){
    if(!empty($id_product)){
$query = $this->db->prepare(" SELECT title,price FROM `products` WHERE id_product = $id_product ");   
            try{ 
            $query->execute();
            }catch(PDOException $e){
            die($e->getMessage());
            }
             return $query->fetchAll(PDO::FETCH_OBJ);     
    }
    else{
    return 'non';
    }
}

public function checkstate($check){
if($check == 1){
    return '<div style="color:#f19b14">Product session sent to Partchelbel\'s staff and waiting for payment endorsement</div>';
}
if($check == 2){
     return '<div style="color:#0000FF">payment accepted session product in preparation for</div>'; 
}
if($check == 3){
     return '<div style="color:#1e7415">session product sent to consummer</div>'; 
}
if($check == 4){
     return '<div style="color:#634a22">session product archive</div>'; 
}

}




}
$orderhistory = new OrderHistory($db);

?>
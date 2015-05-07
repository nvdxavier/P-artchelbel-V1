<?php
class Datadetails extends Model{

    private $db;

        public function __construct($db){
        $this->db = $db;
    }

    public function userdata($id){

        $query = $this->db->prepare("SELECT * FROM `users` WHERE `id_users`= ?");
        $query->bindValue(1, $id);

        try{
            $query->execute();
            return $query->fetch();
        }catch(PDOException $e){
        die($e->getMessage());
        }
    }
}
$datadetails = new Datadetails($db);
?>
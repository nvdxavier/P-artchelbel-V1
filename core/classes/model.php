<?php
/**
 * Objet Model
 * Permet les int�ractions avec la base de donn�e
 * */
class Model{
    //private $db;
    public $table;//d�signe les nom de la table se trouvant dans le dossier models.
    

    /**
     * Permet de r�cup�rer plusieurs ligne dans la BDD
     * @param $data conditions de r�cup�rations
     * */
    public function find($data=array()){
            $conditions = "1=1";
            $fields = "*";
            $limit = "";
            $order = "id_product DESC";
            extract($data);
            if(isset($data["limit"])){ $limit = "LIMIT ".$data["limit"]; }
            $sql = "SELECT $fields FROM ".$this->table." WHERE $conditions ORDER BY $order $limit";
            $req = mysql_query($sql) or die(mysql_error()."<br/> => ".$sql);
            $d = array();
            while($data = mysql_fetch_assoc($req)){
                $d[] = $data;
            }
            return $d;
    }
    
    /**
     * Permet de faire une requ�te complexe
     * @param $sql Requ�te a effectu�
     * */
        public function query($sql){
            $req = mysql_query($sql) or die(mysql_error()."<br/> => ".$sql);
            $d = array();
            while($data = mysql_fetch_assoc($req)){
                $d[] = $data;
            }
            return $d; 
        }
    
    /**
     * Permet de charger un model
     * @param $name Nom du model � charger
     * */
    static function load($name){
        require("$name.php");
        return new $name();
    }  

    /**
     * Permet de compter le nombre de r�sultats dans la BDD
     * @param $data conditions de r�cup�rations
     * */

        public function count(){ 
            global $db;

        $query = $db->prepare("SELECT COUNT(id_product) AS nbArt FROM products");
        try{
            $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }   
        return $query->fetch(PDO::FETCH_ASSOC);
        }//FIN PUBLIC FUNCTION COMPTE 



/////////////////////////////////////////////////////////////////////////
//////////////////////////   PHASE DE TEST   ////////////////////////////
/////////////////////////////////////////////////////////////////////////
    public function getSpecial($cPage,$perPage){
    global $db;  
    $query = $db->prepare("SELECT * FROM `products` ORDER BY date DESC LIMIT ".(($cPage-1) * $perPage).",$perPage");
    try{
        $query->execute();
    }catch(PDOException $e){
        die($e->getMessage());
    }
    return $query->fetchAll(PDO::FETCH_ASSOC);
    }//FIN PUBLIC FUNCTION COUNT   
//////////////////////////   FIN PHASE DE TEST   ////////////////////////
/////////////////////////////////////////////////////////////////////////


}//FIN DE LA CLASSE Model.
?>
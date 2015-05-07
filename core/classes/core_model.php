<?php
class Model{
    
    private $db;

        public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Permet de récupérer plusieurs ligne dans la BDD
     * @param $data conditions de récupérations
     * */
  /*  public function find($data=array()){
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
    }*/

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
    
    public function find($data=array()){
        
            $conditions = "1=1";
            $fields = "*";
            $limit = "";
            $order = "id_product DESC";    
            extract($data);
            if(isset($data["limit"])){ $limit = "LIMIT ".$data["limit"]; }       
        $query = $this->db->prepare("SELECT $fields FROM ".$this->table." WHERE $conditions ORDER BY $order $limit");
        try{
        $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Permet de faire une requête complexe
     * @param $sql Requête a effectué
     * */
       /* public function query($sql){
            $req = mysql_query($sql) or die(mysql_error()."<br/> => ".$sql);
            $d = array();
            while($data = mysql_fetch_assoc($req)){
                $d[] = $data;
            }
            return $d; 
        }*/
 
    /**
     * Permet de faire une requête complexe avec un array
     * @param $sql Requête a effectué
     * */

    public function query($sql, $data = array()){
        //global $db;
        $query = $this->db->prepare($sql);
        $query->execute($data);
    return $query->fetchAll(PDO::FETCH_OBJ);
        }//FIN PUBLIC FUNCTION query


  
    /**
     * Permet de charger un model
     * @param $name Nom du model à charger
     * */
    static function load($name){
        require("$name.php");
        return new $name();
    }  

    /**
     * Permet de compter le nombre de résultats dans la BDD
     * @param $data conditions de récupérations
     * */

        public static function count(){ 
            global $db;

       $query = $db->prepare("SELECT COUNT(id_product) AS nbArt FROM products");
        try{
            $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }   
        return $query->fetch(PDO::FETCH_ASSOC);
        }//FIN PUBLIC FUNCTION COMPTE 



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////   PHASE DE TEST   ////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      //------SHOW_ALL:

    public function showAll(){
         //global $db;
        $query = $this->db->prepare("SELECT * FROM `products`");
        try{
            $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }   
        return $query->fetchAll(PDO::FETCH_ASSOC);
        }//FIN PUBLIC FUNCTION SHOW_ALL

//----------------------------------------------------------------------------

    public function add($product_id){
        if(isset($_SESSION['cart'][$product_id])){//ajouté récement
        //$_SESSION['panier'][$product_id] = 1;
        $_SESSION['cart'][$product_id]++;
    }else{
        $_SESSION['cart'][$product_id] = 1;
    }
    }

    public function county(){
        return array_sum($_SESSION['cart']);
    }


    public function total(){

        $total = 0;
        $ids = array_keys($_SESSION['cart']);
    if(empty($ids)){
        $products = array();
    }else{
    $products = $this->db->query('SELECT * FROM products WHERE id_product IN ('.implode(',',$ids).')');
    //$products = $shopping->query('SELECT * FROM items WHERE id IN ('.implode(',',$ids).')');  
    }
    foreach($products as $product)
        {
        $total += $product['price'] * $_SESSION['cart'][$product['id_product']];
        }return $total;
        
    }

    public function menutotal(){
            $total = 0;
            $ids = array_keys($_SESSION['cart']);
        if(empty($ids)){
            $products = array();
        }else{
        $products = $this->db->query('SELECT * FROM products WHERE id_product IN ('.implode(',',$ids).')');
        //$products = $coremodel->query("SELECT * FROM products WHERE id_product IN (".implode(',',$ids).")");
        }
        foreach($products as $product)
            {
            $total += $product['price'] * $_SESSION['cart'][$product['id_product']];
            }return $total;           
        }
        
    static function menucount(){
        $ids = array_keys($_SESSION['cart']);
        if(count($ids)<=3){
        return array_sum($_SESSION['cart']);
    }else{
    echo count($ids);
    }
    }
       /* public function getSpecial($cPage,$perPage){
        global $db;  
        $query = $db->prepare("SELECT * FROM `products` ORDER BY date DESC LIMIT ".(($cPage-1) * $perPage).",$perPage");
        try{
            $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
        }*///FIN PUBLIC FUNCTION GETSPECIAL



//////////////////////////   FIN PHASE DE TEST   ////////////////////////////////////////////////////////////////////////////////////////////////
}
?>
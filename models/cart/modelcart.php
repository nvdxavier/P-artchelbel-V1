<?php
    
class ModelsCart extends Model{
	//pour utiliser une fonction de Model il faut faire = $this->nomdelafonction();
      private $db;

    /*public function __construct($db){
        $this->db = $db;
        }*/

    public function __construct($db){
        //if(!isset($_SESSION)){
        //    session_start();
       // }
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }
        $this->db = $db;
        if(isset($_GET['delcart'])){
            $this->del($_GET['delcart']);
        }
        if(isset($_POST['cart']['quantity'])){
            $this->recalc();
        }
    }
    public function recalc(){
        foreach($_SESSION['cart'] as $product_id =>$quantity){
            if(isset( $_POST['cart']['quantity'][$product_id])){
            $_SESSION['cart'][$product_id] = $_POST['cart']['quantity'][$product_id];
            }
        }
    }

    public function show_product(){
        $query = $this->db->prepare(" SELECT * FROM `products` ORDER BY `date` DESC");
        try{
        $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }   
        return $query->fetchAll(PDO::FETCH_OBJ);
        }//FIN PUBLIC FUNCTION SHOW_PRODUCT


    public function del($product_id){
        unset($_SESSION['cart'][$product_id]);
        /*if(isset($_SESSION['cart'][$product_id])){
        $_SESSION['cart'][$product_id]--;
        }
          if($_SESSION['cart'][$product_id] <= 0){
            unset($_SESSION['cart'][$product_id]);
          }*/       
        }

    public function queryOne($sql, $data = array()){
        //global $db;
        $query = $this->db->prepare($sql);
        $query->execute($data);
    return $query->fetchAll(PDO::FETCH_OBJ);
        }//FIN PUBLIC FUNCTION query


    public function searchinfo($table, $idtable, $id){
        $query = $this->db->prepare(" SELECT * FROM $table WHERE $idtable = $id");
        try{
        $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }   
        return $query->fetch(PDO::FETCH_OBJ);
        }//FIN PUBLIC FUNCTION querytoucour


    public function add($product_id){
        if(isset($_SESSION['cart'][$product_id])){

        $_SESSION['cart'][$product_id] = 1;

    /*NB: ne pas effacer $_SESSION['cart'][$product_id]++;*/ 

    /*NB: il est peut-etre possible d'appliquer une boucle for*/
        
    }else{
        $_SESSION['cart'][$product_id] = 1;
    }
    }

    public function total(){
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
        
    static function count(){
        $ids = array_keys($_SESSION['cart']);
        if(count($ids)<=3){
        return array_sum($_SESSION['cart']);
    }else{
    echo count($ids);
    }
    }
    //static function count(){
    //    return array_sum($_SESSION['cart']);
    //   }


    public function insertallinfo($idusers, $idds, $quantitys, $prices, $subtotals, $total_price, $adresse, $state){
        $idproduct = array('id_product1', 'id_product2', 'id_product3', 'id_product4', 'id_product5', 'id_product6', 'id_product7');
        $idquantite = array('amount1', 'amount2', 'amount3', 'amount4', 'amount5', 'amount6', 'amount7');
        $idprice = array('price1', 'price2', 'price3', 'price4', 'price5', 'price6', 'price7');
        $idsubtotalprice = array('subtotalprice1', 'subtotalprice2', 'subtotalprice3', 'subtotalprice4', 'subtotalprice5', 'subtotalprice6', 'subtotalprice7');

        $id_product = implode(",", $idproduct);
        $id_quantite = implode(",", $idquantite);
        $id_price = implode(",", $idprice);
        $id_subtotalprice = implode(",", $idsubtotalprice);
         

        $id = array_pad($idds, 7 , 0);
        $tabid= implode(" ,", $id);
        
        $quant = array_pad($quantitys, 7 , 0);
        $tabquantite= implode(" ,", $quant);   
        
        $price = array_pad($prices, 7 , 0);
        $tabprice= implode(" ,", $price);   

        $subtotalprice = array_pad($subtotals, 7 , 0);
        $tabsubtotalprice= implode(" ,", $subtotalprice);  

        $query = $this->db->prepare("INSERT INTO `order_history` (id_users,".$id_product .",".$id_quantite.",".$id_price.",".$id_subtotalprice.", total_price, billing_address, state)
         VALUES (".$idusers.",".$tabid.",".$tabquantite.",".$tabprice.",".$tabsubtotalprice.",".$total_price.",".$adresse.",".$state.") ");

        try{
            $query->execute();
        }catch(PDOException $e){
        die($e->getMessage());
        }
    }

    public function zerotonull(){

    $query = $this->db->prepare("UPDATE `order_history` SET id_product2 = NULL WHERE id_product2 = 0; UPDATE `order_history` SET id_product3 = NULL WHERE id_product3 = 0;
                             UPDATE `order_history` SET id_product4 = NULL WHERE id_product4 = 0; UPDATE `order_history` SET id_product5 = NULL WHERE id_product5 = 0;
                             UPDATE `order_history` SET id_product6 = NULL WHERE id_product6 = 0; UPDATE `order_history` SET id_product7 = NULL WHERE id_product7 = 0;
                             UPDATE `order_history` SET amount2 = NULL WHERE amount2 = 0; UPDATE `order_history` SET amount3 = NULL WHERE amount3 = 0;
                             UPDATE `order_history` SET amount4 = NULL WHERE amount4 = 0; UPDATE `order_history` SET amount5 = NULL WHERE amount5 = 0;
                             UPDATE `order_history` SET amount6 = NULL WHERE amount6 = 0; UPDATE `order_history` SET amount7 = NULL WHERE amount7 = 0;
                             UPDATE `order_history` SET price2 = NULL WHERE price2 = 0; UPDATE `order_history` SET price3 = NULL WHERE price3 = 0;
                             UPDATE `order_history` SET price4 = NULL WHERE price4 = 0; UPDATE `order_history` SET price5 = NULL WHERE price5 = 0;
                             UPDATE `order_history` SET price6 = NULL WHERE price6 = 0; UPDATE `order_history` SET price7 = NULL WHERE price7 = 0;
                             UPDATE `order_history` SET subtotalprice2 = NULL WHERE subtotalprice2 = 0; UPDATE `order_history` SET subtotalprice3 = NULL WHERE subtotalprice3 = 0;
                             UPDATE `order_history` SET subtotalprice4 = NULL WHERE subtotalprice4 = 0; UPDATE `order_history` SET subtotalprice5 = NULL WHERE subtotalprice5 = 0;
                             UPDATE `order_history` SET subtotalprice6 = NULL WHERE subtotalprice6 = 0; UPDATE `order_history` SET subtotalprice7 = NULL WHERE subtotalprice7 = 0;
                            ");
        try{
        $query->execute();
        }catch(PDOException $e){
        die($e->getMessage());
        }
    }
}
$modelscart = new ModelsCart($db);

?>
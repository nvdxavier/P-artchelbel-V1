 <?php 
require_once("core/init.php");
require 'core/connect/database.php';

if(isset($_SESSION['cart'])){
        $ids = array_keys($_SESSION['cart']);
        if(count($ids)<=3){
        $lecompte= array_sum($_SESSION['cart']);
	    }else{
	    $lecompte= count($ids);
	    }
}
		class Modelformenu{
			private $db;
		    public function __construct($db){
		    $this->db = $db;
		    }

		    public function menutotal(){
		        $total = 0;
		        if(isset($_SESSION['cart'])){
		        $ids = array_keys($_SESSION['cart']);
		        if(empty($ids)){
		        $products = array();
		        }else{
		        $products = $this->db->query('SELECT * FROM products WHERE id_product IN ('.implode(',',$ids).')');
		        }
		        foreach($products as $product) {
	            $total += $product['price'] * $_SESSION['cart'][$product['id_product']];
	            }return $total;           
		    }
		}

		}
		$modelformenu = new Modelformenu($db);

?>    
<?php
require_once("models/admin/model_insert_products.php");
require_once("core/init.php");


$general->logged_out_protect();
//$items  = $admin->get_items();

if (isset($_GET['success']) && empty($_GET['success'])) {
    echo '<h3>A new item are created!</h3>';
}else{


	if(empty($_POST) === false){

		if(empty($_POST['title'])){
		$errors[] = 'The "title" field is not filled';
		}
		if (isset($_POST['title']) && !empty ($_POST['title'])){
			if (strlen($_POST['title']) > 70){
			$errors[] = 'The title must be less than 70 caracteres !';
			}
		}

		if(empty($_POST['description'])){
		$errors[] ='<i style="color:red;">The "content" field is not filled</i>';
		} 

	if(empty($errors) === true){
		//$id_product = htmlentities(trim($_POST['id_product']));
		$title = htmlentities($_POST['title']);
		$description = htmlentities(trim($_POST['description']));
		$category = htmlentities(trim($_POST['category']));		
		$price = htmlentities(trim($_POST['price']));
		$amount = htmlentities(trim($_POST['amount']));		
		$date = htmlentities(trim($_POST['date']));
		$sprice = htmlentities(trim($_POST['sprice']));
		//$categorie = htmlentities(trim($_POST['categorie']));
	$insert_product->create_product($title, $description, $category, $price, $amount, $date, $sprice);

	/*$tmpfileun = $_FILES['myfile1']['tmp_name'];
	$tmpfiledeu = $_FILES['myfile2']['tmp_name'];
	$tmpfiletroi = $_FILES['myfile3']['tmp_name'];
	$tmpfileqat = $_FILES['myfile4']['tmp_name'];

	$myfilun    = $_FILES['myfile1']['name'];
	$myfildeu    = $_FILES['myfile2']['name'];
	$myfiltroi    = $_FILES['myfile3']['name'];
	$myfilqat    = $_FILES['myfile4']['name'];

$reseachttheid = $insert_product->researchid($title);


	//$id 		 = $item['id'];
	$a = 'a';
	$b = 'b';
	$c = 'c';
	$d = 'd';
	$general->upload_rename($tmpfileun, $myfilun, $id, $a);
	$general->upload_rename($tmpfiledeu, $myfildeu, $id, $b);
	$general->upload_rename($tmpfiletroi, $myfiltroi, $id, $c);
	$general->upload_rename($tmpfileqat, $myfilqat , $id, $d);*/


		header('Location: ?page=insert_products&success');
		exit();
		
	}
	}//fin du if(empty($_POST) === false)
affichageDuSite('views/admin/view_insert_products.php');
}
if (empty($errors) === false){
		echo '<p>' . implode('</p><p>', $errors) . '</p>';	
	}
?>
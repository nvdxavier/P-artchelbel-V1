<?php
require_once("core/init.php");
require_once("models/admin/model_manage_products.php");
require_once("models/cart/modelcart.php");

$general->logged_out_protect();

if(isset($_GET['id'])) {
$product = $modelscart->queryOne('SELECT * FROM products WHERE id_product =:id' , array('id' => $_GET['id']));
//$items  = $admin->get_items();

	foreach($product as $item) {
			$idd = $item->id_product;
				
	   $title = htmlentities('Title:'.'   '.$item->title);
	   $imagepng = '<img src="views/img/'.$idd.'a.png" height="30%" width="45%">
		            <img src="views/img/'.$idd.'b.png" height="30%" width="45%">
		            <img src="views/img/'.$idd.'c.png" height="30%" width="45%">
		            <img src="views/img/'.$idd.'d.png" height="30%" width="45%">';

	 	 $imagejpeg='<img src="views/img/'.$idd.'a.jpg" height="30%" width="45%">
		             <img src="views/img/'.$idd.'b.jpg" height="30%" width="45%">
		             <img src="views/img/'.$idd.'c.jpg" height="30%" width="45%">
		             <img src="views/img/'.$idd.'d.jpg" height="30%" width="45%">';
		  $id = 'ID:'.'  '.$item->id_product;
			  $ficheimage = '<h3 >update or add a picture product</h3> '.$imagejpeg.'<br />'.$title.'<br/>'.$id;  
			 echo $ficheimage;
				
	}//FOREACH

}//isset($_GET['id']

if (isset($_GET['success']) && empty($_GET['success'])) {
    echo '<h3>A new images are created!</h3>';

}else{

if(empty($_POST) === false){

	if (!empty($_FILE['myfile1']['name']) && !empty($_FILE['myfile1']['tmp_name']))
	{
	$errors[] = 'remplir toutes les images';
	}

		if(empty($errors) === true){
		$tmpfileun   = $_FILES['myfile1']['tmp_name'];
		$tmpfiledeu  = $_FILES['myfile2']['tmp_name'];
		$tmpfiletroi = $_FILES['myfile3']['tmp_name'];
		$tmpfileqat  = $_FILES['myfile4']['tmp_name'];

		$myfilun    = $_FILES['myfile1']['name'];
		$myfildeu   = $_FILES['myfile2']['name'];
		$myfiltroi  = $_FILES['myfile3']['name'];
		$myfilqat   = $_FILES['myfile4']['name'];

		$a = 'a';
		$b = 'b';
		$c = 'c';
		$d = 'd';
		$general->upload_rename($tmpfileun, $myfilun, $idd, $a);
		$general->upload_rename($tmpfiledeu, $myfildeu, $idd, $b);
		$general->upload_rename($tmpfiletroi, $myfiltroi, $idd, $c);
		$general->upload_rename($tmpfileqat, $myfilqat , $idd, $d);
			header('Location: ?page=update_image&success');

		}else if (empty($errors) === false){
				echo '<p>' . implode('</p><p>', $errors) . '</p>';	
			}

}//if(empty($_POST) === false){
	echo'<form action="" method="post" enctype="multipart/form-data">
	  <div id="photos">
		<ul>
		<li>      
	    Fichier1 : <td><input type="file" name="myfile1" /><br/>
	    Fichier2 : <td><input type="file" name="myfile2" /><br/>
	    Fichier3 : <td><input type="file" name="myfile3" /><br/>
	    Fichier4 : <td><input type="file" name="myfile4" /><br/>
		</li>
		</ul>
	    <td><input type="submit" name="update"/></td>
	    </div>
	    <br />
	    </form>';

}
?>

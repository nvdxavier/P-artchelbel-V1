<?php 
class General{


//Check if the user is logged in.
	public function logged_in(){
		return(isset($_SESSION['id_users'])) ? true : false;
	}
//if logged in then redirect to home.php
	public function logged_in_protect() {
		if ($this->logged_in() === true) {
			header('Location: home.php');
			exit();		
		}
	}
//if not logged in then redirect to index.php
	public function logged_out_protect() {
		if ($this->logged_in() === false) {
			header('Location: ?page=latestprod');
			exit();
		}	
	}
//file_newpath() (à définir)
	public function file_newpath($path, $filename){
		if ($pos = strrpos($filename, '.')) {
		   $name = substr($filename, 0, $pos);
		   $ext = substr($filename, $pos);
		} else {
		   $name = $filename;
		}
		//défini l'emplacement du dossier
		$newpath = $path.'/'.$filename;
		$newname = $filename;
		$counter = 0;
		
		//tant que "l'emplacement du fichier" existe
		while (file_exists($newpath)) {
		   $newname = $name .'_'. $counter . $ext;
		   $newpath = $path.'/'.$newname;
		   $counter++;
		}
		
		return $newpath;
	}

public function upload_rename($avatmp, $avatar, $id, $abcd)
{
	//$dossier = '../img/';
	$dossier = 'views/img/';
	$taille_maxi = 2097152;
	$taille = filesize($avatmp);
	$extensions = array('.png', '.jpg', '.jpeg');
	$extension = strrchr($avatar, '.'); 
	$fichier = basename($avatar);
	$fichier = $id.$abcd.$extension;

	if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
	{
	     //$erreur = 'Vous devez uploader un fichier de type png, jpg, jpeg, ';
	     return $erreur = 'file extension accepted png, jpg, jpeg, ';
	
	}
	if($taille>$taille_maxi)
	{
	     //return false;
	return $erreur = 'the file is too large...';
	}
	if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
	{
	     //On formate le nom du fichier ici...
	     $fichier = strtr($fichier, 
	          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
	          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
	     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

	     if(move_uploaded_file($avatmp, $dossier . $fichier))
	     {
	      //return true;
	      return 'Upload success !';
	     }
	     else //Sinon (la fonction renvoie FALSE).
	     {
	          
	     //return false;
	    return 'upload failed !';
	     }
	}
	else
	{
	
	//return false;
	return $erreur;
	}

}

/////////recement ajoutée
public function protect_page(){
	if($this->logged_in() === false){
		header('Location: protected.php');
		exit();
	}
}


}//fin class GENERAL
//$general = new General();
?>
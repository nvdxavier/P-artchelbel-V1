<?php
require_once("models/admin/model_contact_users.php");
affichageDuSite('views/admin/view_contact_users.php');

$general->logged_out_protect();
$sujet = isset($_POST['sujet']) ? $_POST['sujet']: '';
$content = isset($_POST['content']) ? $_POST['content']: '';
$checkbox = isset($_POST['checkbox']) ? $_POST['checkbox']: '';
$mail = $contact_users->get_email(0,' ');
$mailun = $contact_users->get_email(1,' ');
$allmail = $contact_users->get_email(0,1);



if(!empty($sujet) && !empty($content)){

	if (!empty($checkbox) == 0){				
		foreach($mail as $mal){
		mail($mal['email'],'P\'artchelbel'.' '.$sujet, $content);
		}
	echo 'e-mail send to all unsubscribed to newsletters';
	}


	if( !empty($_POST['checkbox']) == 1){
		
		foreach($mailun as $email){
		mail($email['email'],'newsletter'.' '.$sujet, $content);
		}
	echo '  , email send to all newsletter account';
	}

	if((!empty($_POST['checkbox'])==0) && (!empty($_POST['checkbox']))==1){

		foreach($allmail as $all){
		mail($all['email'],$sujet, $content);
		}
	echo '   , email send to ALL Loki-Salle users';		
	}

}else{
	//echo 'send email to Loki-Salle users';
}
if(empty($checkbox)==0 || empty($checkbox)==1 || (empty($content) || empty($sujet)))
{
echo '<br/>Please set all fields<br/>';
}

?>
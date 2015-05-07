<h4>contact user : </h4>
<form action="" method="post" enctype="multipart/form-data">

<h4>Title : </h4>
<input type="text" id="sujet" name="sujet" value="<?php if (isset($_POST['sujet']) ){echo htmlentities(strip_tags($_POST['sujet']));} //else { echo $user['username']; }?>">

Unsubscribed to newsletter:  <input type="checkbox" name="checkbox" value="0">
newsletters subscribed:  <input type="checkbox" name="checkbox" value="1"><br />

<h4>message : </h4>
<textarea name="content"><?php if (isset($_POST['content']) ){echo htmlentities(strip_tags($_POST['content']));} //else { echo $user['bio']; }?></textarea>
<br />
<span>send email:</span>
<input type="submit" value="envoyer">
</form>


 
		
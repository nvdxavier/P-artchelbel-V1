
	<h2>Add a new item</h2>
	<hr />
	<form action="" method="post" enctype="multipart/form-data">
	<div id="personal_info">
	<h3 >Create item Information </h3>
	<ul>
	<li>
	<input type="text" style="width:400px;" placeholder="Title" name="title" value="<?php if (isset($_POST['title']) ){echo htmlentities(strip_tags($_POST['title']));} //else { echo $user['username']; }?>">
	</li>
	<li><p>
	<input type="text" placeholder="category" name="category" value="<?php if (isset($_POST['category']) ){echo htmlentities(strip_tags($_POST['category']));} //else { echo $user['username']; }?>">
	<input type="text" placeholder="price" name="price" value="<?php if (isset($_POST['price']) ){echo htmlentities(strip_tags($_POST['price']));} //else { echo $user['username']; }?>">
	</li>
	<li><p>
	<input type="text" placeholder="amount" name="amount" value="<?php if (isset($_POST['amount']) ){echo htmlentities(strip_tags($_POST['amount']));} //else { echo $user['username']; }?>">
	<input type="date" placeholder="date" name="date" value="<?php if (isset($_POST['date']) ){echo htmlentities(strip_tags($_POST['date']));} //else { echo $user['username']; }?>">
	<input type="text" placeholder="sprice" name="sprice" value="<?php if (isset($_POST['sprice']) ){echo htmlentities(strip_tags($_POST['sprice']));} //else { echo $user['username']; }?>">	
	</li>
	<li><p>
	<TEXTAREA placeholder="description" name="description" cols="50" rows="20" value="<?php if (isset($_POST['description']) ){echo htmlentities(strip_tags($_POST['description']));} //else { echo $user['username']; }?>"></TEXTAREA>
	</li>
	
	<!--<li>
	<h4>image: </h4>
	Fichier1 : <input type="file" name="myfile1"><br/>
	Fichier2 : <input type="file" name="myfile2"><br/>
	Fichier3 : <input type="file" name="myfile3"><br/>
	Fichier4 : <input type="file" name="myfile4"><br/>
	</li>-->
	</ul>
	</div>
	<div class="clear"></div>
	<hr />
	<span>Create item description:</span>
	<input type="submit" value="envoyer">
	</form>
		<!--<div id="container"></div>-->
	</body>
	</html>
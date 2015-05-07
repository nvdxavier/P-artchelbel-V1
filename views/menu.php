<?php
require_once('views/module_count.php');
       
	if(isset($_SESSION['id_users'])){
	$logins = $_SESSION['id_users'];
	}
	$username ='';
	if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
	}
$total = $modelformenu->menutotal();
?>

<div>
	<div class="post">
		<form method="post" action="?page=search">
			<input type="text" id="keyword" name="keyword" class="keyword"  value="<?php $keyword ?>"/>
			<input type="submit" name="search" value="search" />&nbsp;&nbsp;&nbsp;<a href="?page=cart"><img src="views/img/icones/basket.PNG" alt="" /></a>
			<?php
			
			if(isset($lecompte)){
			echo '<b> '.$lecompte.'</b>';
			//echo '<li class="items"><span id="count"><b>'.$count.'</b></span></li>';
			}
			if(isset($total)){
			echo '&nbsp;&nbsp;&nbsp;'.number_format($total,2,',',' ').' €';
			}
			?>
		</form>
	</div>

	<div id="w">	
	    <div id="nav">
	     <ul class="clearfix">
	    	<?php if(isset($logins)){?>
	 		<li><a href="?page=logout">logout</a></li>
			<li><a href="?page=order_history&user=<?php echo $logins; ?>">order history</a></li>
			<li><a href="?page=profile&username=<?php echo $username;?>">profile</a></li>
			<?php }else{ ?>
	    	<li><a href="?page=registration">registration</a></li>
			<li><a href="?page=login">login</a></li>
			<?php } ?>

	     </ul>
	    </div>	
	</div>
</div>


<div id="w1">
	<div id="menu">
		<!--<ul class="menu-middle">-->
		<ul class="clearfix">
		<li><a href="?page=latestprod">THE&nbsp;LAST PRODUCTS</a></li>
		<li><a href="?page=promoprod">THE&nbsp;SPECIALS OFFERTS</a></li>
		<li><a href="?page=popprod">THE MOST&nbsp;POPULARS</a></li>
		</ul>
  	</div>
</div>

<script type="text/javascript">
var navigation = responsiveProfil("#nav");
var navigation = responsiveMenu("#menu");
</script>
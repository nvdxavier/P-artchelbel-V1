<?php 
require_once'core/init.php';
$general->logged_in_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>P'ART CHELBEL</title>
<link rel="stylesheet" href="css/partchelbel.css" type="text/css" />

	<div class="header clearfix">
  			<ul class="connect_menu">
			<li><a href="register.php"target=_blank>register</a></li>
			<li><a href="login.php"target=_blank>login</a></li>
  			</ul>

			<nav class="main-menu">					
			<ul class="menu">
			<li><a href="webdesignpao.html">CATALOGUE</a></li>
			<li><a href="illustrations.html">BLOG</a></li>
			</ul>				
		  	</nav>

			<div class="logo">
			<a href="index.html"><img src="img/logo.png" alt="" /></a>
			<input type="text" id="keyword" name="keyword" class="keyword" placeholder="keyword" value="<?php $keyword ?>"/>
			<button class="search-button" type="submit"><i class="fa fa-search"></i></button>

			</div>
	</div>
</head>

<div class="container clearfix">
			<nav class="main-menu">
				<ul class="menu-middle">
				<li><a href="webdesignpao.html">THE&nbsp;SPECIALS</a></li>
				<li><a href="newsmonth.php">LATEST&nbsp;NEWS</a></li>
				<li><a href="illustrations.html">THE MOST&nbsp;POPULARS</a></li>
				</ul>		
		  	</nav>
</div>

</html>

<footer>
	<ul class="menu-footer">
	<li><a href="webdesignpao.html">CONTACT</a></li>
	<li><a href="illustrations.html">CONDITIONS&nbsp;D'UTILISATION</a></li>
	<li><a href="webdesignpao.html">PROTECTION&nbsp;DES&nbsp;DONNEES</a></li>
	<li><a href="illustrations.html">MENTIONS&nbsp;LEGALES</a></li>
	</ul>

	<ul class="social-links">	
	<li><a href="http://www.facebook.com/pages/Nvdxavier/182423158506151"target=_blank><img src="img/facebook_32.png" alt="Facebook" width="32" height="32"></a></li>
	<li><a href="http://nvdxavier.wordpress.com/"target=_blank><img src="img/wordpress.png" width="32" height="32" alt="Twitter"></a></li>
	<li><a href="https://twitter.com/nvdxavier"target=_blank><img src="img/twitter_32.png" width="32" height="32" alt="Twitter"></a></li>
	</ul>
</footer>
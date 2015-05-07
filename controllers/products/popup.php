
	<link rel="stylesheet" href="views/js/superbox/doc/styles/demo.css" type="text/css" media="all" />
	<link rel="stylesheet" href="views/js/superbox/jquery.superbox.css" type="text/css" media="all" />
	<style type="text/css">
		/* Custom Theme */
		#superbox-overlay{background:#e0e4cc;}
		#superbox-container .loading{width:32px;height:32px;margin:0 auto;text-indent:-9999px;background:url(styles/loader.gif) no-repeat 0 0;}
		#superbox .close a{float:right;padding:0 5px;line-height:20px;background:#333;cursor:pointer;}
		#superbox .close a span{color:#fff;}
		#superbox .nextprev a{float:left;margin-right:5px;padding:0 5px;line-height:20px;background:#333;cursor:pointer;color:#fff;}
		#superbox .nextprev .disabled{background:#ccc;cursor:default;}
	</style>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="views/js/superbox/jquery.superbox.js"></script>
	<script type="text/javascript">
		$(function(){
			$.superbox.settings = {
				closeTxt: "Fermer",
				loadTxt: "Chargement...",
				nextTxt: "Suivant",
				prevTxt: "Précédent"
			};
			$.superbox();
		});
	</script>



		<div id="mode-iframe">
			<h2>Mode iframe</h2>
			<p>Générer une box contenant une iframe.</p>
			<h3>Démonstration</h3>
			<p><a href="http://fr.wikipedia.org/wiki/Special:Page_au_hasard" rel="superbox[iframe]">Iframe Superbox (dimensions par défaut)</a></p>
			<p><a href="http://fr.wikipedia.org/wiki/Special:Page_au_hasard" rel="superbox[iframe.wikipedia][750x500]">Iframe Superbox (dimensions définies)</a></p>
			<?php
			echo'<p><a href="?page=detailproduct&id=21" rel="superbox[iframe]">Carcass</a></p>';
			?>


			<h3>Utilisation</h3>
			<pre><code>&lt;a href="http://example.com/" rel="superbox[iframe][700x500]"&gt;SuperBox&lt;/a&gt;</code></pre>
		</div>


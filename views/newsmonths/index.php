
<head>INDEX/NEWSMONTHS</head>

<?php

foreach($newmonth as $g){

	echo '<br/>'.$g['title']; echo '<br/>';
	echo $g['description'];
	echo '<br/>'.$g['price'].htmlentities(' €');
	echo "<hr/>";
}

for($i=1;$i<=$lol;$i++){
	if($i==$mdr){
	echo " $i / ";
	}else{
	echo "<a href=\"newsmonths/index.php?p=$i\">$i</a> /";

/*
Les faits:

C'est à ce niveau là que l'affichage de la pagination s'effectue (1 / 2 / 3 / 4 / 5 / 6 / ...ect).
Donc le controller de newsmonth (controller/newsmonths) utilise un systeme de pagination.

-Il se sert des commandes SQL pour newsmonths(models/newsmonth) et du model principale(core/classes/model)
pour n'afficher que les infos voulus.

-Et se sert des fonctions du controller principal(core/classes/controller) pour envoyer le tout à sa vue
qui est (views/newsmonths/index).

-le 'rewriteengine' du HTACCESS est paramétré de façon qu'il suffit de faire:
 'http://localhost/partchelbel/newsmonths'
pour afficher l'index de la rubrique 'newsmonths'.



La problématique:

La boucle 'for' ci-dessus, affiche les numéros de pagination (1 / 2 / 3 / 4 / 5 / 6 / ...ect).
si 'newsmonths' ne dépendait que d'un seul fichier, alors: "<a href=\"newsmonths/index.php?p=$i\">$i</a> /"
serait valide.
Mais dans un systeme MVC à plusieurs niveaux dont la vue dépend des autres fichiers fout en l'air ce systeme.
on ne peut plus indiquer le fichier(index) + extension(.php) + ?p=$i .

- Comment adapter le chemin href par rapport au MCV ?
- Que faut-il modifier ou créer pour faire marcher la pagination ?

*/
}

}

 ?>


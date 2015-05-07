<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="views/js/superbox/jquery.superbox.js"></script>
<script type="text/javascript">
    $(function(){
      $.superbox.settings = {
        closeTxt: "Close",
        loadTxt: "Chargement...",
        nextTxt: "Suivant",
        prevTxt: "Précédent"
      };
      $.superbox();
    });
  </script>

<?php
if(isset($_SESSION['compta'])){
  $compta = $_SESSION['compta'];  

if(isset($_SESSION['cPage'])){
  $cPage = $_SESSION['cPage'];  
  }
if(isset($_SESSION['nbPage'])){
  $nbPage = $_SESSION['nbPage'];  
  }


  echo'<ul><li>';
  	foreach($compta as $t){
  		echo '<div class="searchprod">';
        $price = $t['price'].' €';
        $addcart= '<a class="addcart" href="?page=addcart&id='. $t['id_product'].'" onclick="reloadPage()" ><img src="views/img/icones/basket.PNG" /></a>';
  			$title= htmlentities($t['title']).'<br/>';
  			$image = '<img src="views/img/'.$t['id_product'].'a.jpg" height="230px;" width="230px;" />';echo '<br/>';
    $ficheprod = '<a href="views/product/detailproduct.php?id='.$t['id_product'].'" rel="superbox[iframe][]">'.'&nbsp;&nbsp;'.$title.$image.'</a>'.'<br/>'.$addcart.'&nbsp;&nbsp;'.$price;
  			echo $ficheprod; echo '<p>';

  		echo '</div>';
  	}//FIN FOREACH
    echo'</li></ul>';

  echo'<div class="clear"></div>';
   for($i=1;$i<=$nbPage;$i++){
       if($i==$cPage){
       echo "&nbsp;<b style='font-size: 150%;'>$i</b>  &nbsp;| ";
       }else{
      echo '&nbsp;<b>&nbsp;<a class="pagenum" href="?page=search&amp;d='.$i.'" ">'.$i.'</a></b>  &nbsp;|';
   	}
   }
echo '<div id="mode-iframe"></div>';
}
?>
<script type="text/javascript" src="views/js/app.js"></script>
<script type="text/javascript">
     function reloadPage(){
      alert('product added successfully !');
       window.location.reload(false);
       }       
</script>
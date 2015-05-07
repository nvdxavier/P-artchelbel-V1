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
if(isset($_SESSION['promop'])){
$promop = $_SESSION['promop'];

if(isset($_SESSION['cPage'])){
  $cPage = $_SESSION['cPage'];  
  }
if(isset($_SESSION['nbPage'])){
  $nbPage = $_SESSION['nbPage'];
  }
?>
<h2>Special promotion for the manga's day !!!</h2>
<?php
  echo'<ul><li>';
  	foreach($promop as $f){
      echo '<div class="searchprod">';
        $addcart= '<a class="addcart" href="?page=addcart&amp;id='. $f['id_product'].'" onclick="reloadPage()" ><img src="views/img/icones/basket.PNG" alt="basket" /></a><br/>';
        $title= htmlentities($f['title']).'<br/>';
        $image = '<img src="views/img/'.$f['id_product'].'a.jpg" alt="imgage" height="230px;" width="230px;" />';echo '<br/>';
        $ficheprod = '<a href="views/product/detailproduct.php?id='.$f['id_product'].'" rel="superbox[iframe][]">'.'&nbsp;&nbsp;'.$title.$image.'</a>'.'<br/>'.$addcart.
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'<del>'.$f['price'].'</del> €'.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$f['special_price'].'€';
        echo $ficheprod; echo '<p></p>';

      echo '</div>';
    }//FIN FOREACH
    echo'</li></ul>';

echo'<div class="clear"></div>';
   for($i=1;$i<=$nbPage;$i++){
       if($i==$cPage){
       echo "&nbsp;<b style='font-size: 150%;'>$i</b>  &nbsp;| ";
       }else{
      echo '&nbsp;<b>&nbsp;<a class="pagenum" href="?page=promoprod&amp;p='.$i.'" ">'.$i.'</a></b>  &nbsp;|';
   	}
   }
 echo '<div id="mode-iframe"></div>';
}
?>
<script type="text/javascript" src="views/js/app.js"></script>
<script type="text/javascript">
   function reloadPage(){
    alert('product added to your cart !');
   window.location.reload(false);
     }
</script>
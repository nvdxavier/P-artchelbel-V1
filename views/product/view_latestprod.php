
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
$compte = $_SESSION['compte'];
$cPage = $_SESSION['cPage'];
$nbPage = $_SESSION['nbPage'];
?>

<h1>The latest products</h1>

<?php
  echo'<ul><li>';
    foreach($compte as $f){
      echo '<div class="latestprod">';
        $price = htmlentities($f['price'].' €');
        $addcart= '<a class="addcart" href="?page=addcart&amp;id='. $f['id_product'].'"  onclick="reloadPage()" ><img src="views/img/icones/basket.PNG" alt="basket" /></a>';
        $title= htmlentities($f['title']).'<br/>';
        $image = '<img src="views/img/'.$f['id_product'].'a.jpg" height="200px;" alt="image" width="200px;" />';echo '<br/>';
        $fichu = '<a href="views/product/detailproduct.php?id='.$f['id_product'].'" rel="superbox[iframe][]">'.'&nbsp;&nbsp;'.$title.$image.'</a>'.'<br/>'.$addcart.'&nbsp;&nbsp;'.$price;
        echo $fichu; echo '<p></p>';

      echo '</div>';
  }//FIN FOREACH
  echo'</li></ul>';

  echo'<div class="clear"></div>';
    for($i=1;$i<=$nbPage;$i++){
       if($i==$cPage){
        echo "&nbsp;<b style='font-size: 150%;'>$i</b>  &nbsp;| ";
       }else{
     echo '&nbsp;<b>&nbsp;<a class="pagenum" href="?page=latestprod&amp;p='.$i.'">'.$i.'</a></b>  &nbsp;|';
    } 
  }
echo '<div id="mode-iframe"></div>';
  ?>
  <script type="text/javascript" src="views/js/app.js"></script>
  <script type="text/javascript">
             function reloadPage()
              {
                alert('product added to your cart !');
               window.location.reload(false);
               }

  </script>
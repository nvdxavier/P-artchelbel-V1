<?php
class newsmonths extends Controller{
   
    var $models = array('Newsmonth');

//function index d'origine
  function index(){

    $nbr = $this->Newsmonth->count();
    var_dump($nbr);
    $nbArt = $nbr['nbArt'];

    $perPage = 4;
    $nbPage = ceil($nbArt/$perPage);

    if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPage){
        $cPage = $_GET['p'];   
        }else{
            $cPage = 1;
        }
$d['newmonth'] = $this->Newsmonth->getSpecial($cPage,$perPage);

        $this->set($d);

$f['lol'] = $nbPage;
$h['mdr'] = $cPage;
 $o['i'] = $i=1; 

for($i=1;$i<=$nbPage;$i++){
     if($i==$cPage){
     echo "$i / ";
     }else{ 
  echo '<a href="'. WEBROOT .'newsmonths/index/'.$i.'">'. $i .'</a> /';
 } }
    $this->set($o);
    $this->set($f);
    $this->set($h);
    $this->render('index'); 
}/**/  



    function view($id){
        $d['tut'] = $this->Newsmonth->find(array(
            'conditions' => 'id='.$id
        ));
        $d['tut'] = $d['tut'][0];
        $this->set($d);
        $this->render('view'); 
    }


/////////////////////////////////////////////////////////////////////////
//////////////////////////   PHASE DE TEST   ////////////////////////////
/////////////////////////////////////////////////////////////////////////


//////////////////////////   FIN PHASE DE TEST   ////////////////////////
/////////////////////////////////////////////////////////////////////////
}
?>
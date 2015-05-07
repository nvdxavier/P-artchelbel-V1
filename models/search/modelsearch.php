<?php
class Search extends Model{
	//pour utiliser une fonction de Model il faut faire = $this->nomdelafonction();
      private $db;

        public function __construct($db) {
        $this->db = $db;
    } 

 //------GET_PRODUCT:

	public function getProduct($id_product, $cPage,$perPage){
		 
		//$query = $this->db->prepare("SELECT * FROM `products` ORDER BY date DESC LIMIT ".(($cPage-1) * $perPage).",$perPage");
		$query = $this->db->prepare("SELECT * FROM `products` WHERE id_product IN($id_product) ORDER BY date DESC LIMIT ".(($cPage-1) * $perPage).",$perPage");
		//SELECT * FROM `products` WHERE id_product IN(1,2,3)ORDER BY date DESC LIMIT 0, 5
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
		return $query->fetchAll(PDO::FETCH_ASSOC);
		}//FIN PUBLIC FUNCTION GET_PRODUCT
 
 //------SHOW_PRODUCT:

	public function showProduct($k){
		 //global $db;
		$query = $this->db->prepare("SELECT * FROM `products`");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
		return $query->fetchAll(PDO::FETCH_COLUMN, $k);
		}//FIN PUBLIC FUNCTION SHOW_PRODUCT
 


public function getinfo(){
    //global $db;
$query = $this->db->prepare("SELECT * FROM `products` ORDER BY id_product DESC limit 0, 10");
    try{
        $query->execute();
    }catch(PDOException $e){
        die($e->getMessage());
    }
    return $query->fetchAll(PDO::FETCH_OBJ);
    }



public function getinfoLastid(){
   //global $db; 
//$query = $db->prepare("SELECT * FROM `products` WHERE id_product < $i ORDER BY id_product DESC LIMIT 0, 10");
$query = $this->db->prepare("SELECT * FROM `products` WHERE id_product < ".$_GET['lastid']." ORDER BY id_product DESC LIMIT 0,10");

	try{
        $query->execute();
    }catch(PDOException $e){
        die($e->getMessage());
    }
    return $query->fetchAll(PDO::FETCH_OBJ);  
	}

	public function compareDate($chaine1, $chaine2){
		$choix = '';

		for ($i=0;$i<count($chaine2);$i++)
		{
			$choix .= $chaine2[$i].'|';
			$explore = explode('|',$choix);

			foreach($explore as $valeur)
				{
				if(!empty($valeur) && ($chaine1 == $valeur))
				{
				return (TRUE);
			  	}
			}//fin foreach $explore => $valeur
		}//FOR				
	}//FIN function compareDate


 //------COMPARECHAINES:

	public function compareChaines($chaine1, $chaine2){
	   // Changement d'encodage si besoin
	   $s1 = mb_convert_encoding($chaine1, "UTF-8", "UTF-8"); // Remplacer le premier UTF_8 par l'encodage à transformer
	   $s2 = mb_convert_encoding($chaine2, "UTF-8", "UTF-8"); // Remplacer le premier UTF_8 par l'encodage à transformer

	   // Normalisation avant comparaison (supprime maj, accents, etc.)
	   $ns1 = $this->normalizeUtf8String($s1);
	   $ns2 = $this->normalizeUtf8String($s2);

	   // Recherche de $ns2 dans $ns1
	   // Ne pas toucher, c'est volontairement fait en 2 step (cf aide officielle php sur strrpos)
	   $pos = strrpos($ns1, $ns2);
	   return (boolean) !($pos === false);
	}//FIN public function compareChaines



 //------normalizeUtf8String:

	public function normalizeUtf8String($s){
		$s = strtolower($s);

		// Normalizer-class missing!
		if (! class_exists("Normalizer", $autoload = false)) {
		return $s;

		}

		// maps German (umlauts) and other European characters onto two characters before just removing diacritics
		$s    = preg_replace( '@\x{00c4}@u'    , "AE",    $s );    // umlaut Ä => AE
		$s    = preg_replace( '@\x{00d6}@u'    , "OE",    $s );    // umlaut Ö => OE
		$s    = preg_replace( '@\x{00dc}@u'    , "UE",    $s );    // umlaut Ü => UE
		$s    = preg_replace( '@\x{00e4}@u'    , "ae",    $s );    // umlaut ä => ae
		$s    = preg_replace( '@\x{00f6}@u'    , "oe",    $s );    // umlaut ö => oe
		$s    = preg_replace( '@\x{00fc}@u'    , "ue",    $s );    // umlaut ü => ue
		$s    = preg_replace( '@\x{00f1}@u'    , "ny",    $s );    // ñ => ny
		$s    = preg_replace( '@\x{00ff}@u'    , "yu",    $s );    // ÿ => yu

		// maps special characters (characters with diacritics) on their base-character followed by the diacritical mark
		// exmaple:  Ú => U´,  á => a`
		$s    = Normalizer::normalize( $s, Normalizer::FORM_D );


		$s    = preg_replace( '@\pM@u'        , "",    $s );    // removes diacritics


		$s    = preg_replace( '@\x{00df}@u'    , "ss",    $s );    // maps German ß onto ss
		$s    = preg_replace( '@\x{00c6}@u'    , "AE",    $s );    // Æ => AE
		$s    = preg_replace( '@\x{00e6}@u'    , "ae",    $s );    // æ => ae
		$s    = preg_replace( '@\x{0132}@u'    , "IJ",    $s );    // ? => IJ
		$s    = preg_replace( '@\x{0133}@u'    , "ij",    $s );    // ? => ij
		$s    = preg_replace( '@\x{0152}@u'    , "OE",    $s );    // Œ => OE
		$s    = preg_replace( '@\x{0153}@u'    , "oe",    $s );    // œ => oe

		$s    = preg_replace( '@\x{00d0}@u'    , "D",    $s );    // Ð => D
		$s    = preg_replace( '@\x{0110}@u'    , "D",    $s );    // Ð => D
		$s    = preg_replace( '@\x{00f0}@u'    , "d",    $s );    // ð => d
		$s    = preg_replace( '@\x{0111}@u'    , "d",    $s );    // d => d
		$s    = preg_replace( '@\x{0126}@u'    , "H",    $s );    // H => H
		$s    = preg_replace( '@\x{0127}@u'    , "h",    $s );    // h => h
		$s    = preg_replace( '@\x{0131}@u'    , "i",    $s );    // i => i
		$s    = preg_replace( '@\x{0138}@u'    , "k",    $s );    // ? => k
		$s    = preg_replace( '@\x{013f}@u'    , "L",    $s );    // ? => L
		$s    = preg_replace( '@\x{0141}@u'    , "L",    $s );    // L => L
		$s    = preg_replace( '@\x{0140}@u'    , "l",    $s );    // ? => l
		$s    = preg_replace( '@\x{0142}@u'    , "l",    $s );    // l => l
		$s    = preg_replace( '@\x{014a}@u'    , "N",    $s );    // ? => N
		$s    = preg_replace( '@\x{0149}@u'    , "n",    $s );    // ? => n
		$s    = preg_replace( '@\x{014b}@u'    , "n",    $s );    // ? => n
		$s    = preg_replace( '@\x{00d8}@u'    , "O",    $s );    // Ø => O
		$s    = preg_replace( '@\x{00f8}@u'    , "o",    $s );    // ø => o
		$s    = preg_replace( '@\x{017f}@u'    , "s",    $s );    // ? => s
		$s    = preg_replace( '@\x{00de}@u'    , "T",    $s );    // Þ => T
		$s    = preg_replace( '@\x{0166}@u'    , "T",    $s );    // T => T
		$s    = preg_replace( '@\x{00fe}@u'    , "t",    $s );    // þ => t
		$s    = preg_replace( '@\x{0167}@u'    , "t",    $s );    // t => t

		// remove all non-ASCii characters
		$s    = preg_replace( '@[^\0-\x80]@u'    , "",    $s );

		// possible errors in UTF8-regular-expressions
		if (empty($s)){
		return $original_string;
		}else{
		return $s;
		}
	}//fin function normalizeUtf8String



}//FIN DE LA CLASSE "SEARCH"
$search = new Search($db);
?>
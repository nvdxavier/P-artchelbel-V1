<?php
function debug($arg , $mode = 1)
	{
		if($mode == 1)
		{
		echo "<pre>";print_r($arg);echo "</pre>";
		}
		else
		{
		var_dump($arg);
		}
		$trace = debug_backtrace();


	echo "Debug demandé: <br />Fichier:<i> " .  $trace[0]['file'] . "</i><br />Ligne:<b>". $trace[0]['line'] ."</b>";
	}
//::::::::::::::::::::::::::::::::::::::::::::::::::::
function execute_requete($req)
	{
		global $mysqli;
		$resultat = $mysqli->query($req);
		if(!$resultat)
			{
			die("Erreur de requete sql.<br />Message d'erreur: " . $mysqli-> error . "<br />Code: " . $req);
			}
		return $resultat;
	}
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
function utilisateur_est_connecte()
	{
		if(!isset($_SESSION['utilisateur']))
				{
				return false;
				}
				return true;
	}
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
function utilisateur_est_connecte_et_admin()
	{
	if(utilisateur_est_connecte() && $_SESSION['utilisateur']['statut'] == 1)
		{
		return true;
		}
	return false;
	}	

	
	
	
	
	
	
	
	
	
	
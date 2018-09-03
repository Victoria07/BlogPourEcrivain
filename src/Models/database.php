<?php

class database 
{  

	$host = "localhost";
	$user = "root";
	$password = ""; 
	$db = "blogecrivain";

	function init(){
		$bdd = new mysqli($host,$user,$password,$db); 
		return $bdd;
	}
	
}

?> 
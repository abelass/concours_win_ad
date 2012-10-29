<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

function concours_declarer_tables_principales($tables_principales){

	$spip_concours_reponses = array(
		"id_reponse"		=> "bigint(21) NOT NULL",
		"titre"			=> "VARCHAR(4) NOT NULL",
		"prenom" 		=> "varchar(255) NOT NULL",
		"nom" 			=> "varchar(255) NOT NULL",
		"date_naissance" 	=> "date DEFAULT '0000-00-00' NOT NULL",				
		"rue" 			=> "varchar(255) NOT NULL",
		"numero" 		=> "varchar(10) NOT NULL",
		"boite" 			=> "varchar(5) NOT NULL",		
		"pays" 			=> "varchar(2) NOT NULL",	
		"code_postal" 		=> "varchar(10) NOT NULL",					
		"localite" 		=> "varchar(255) NOT NULL",						
		"lang" 			=> "varchar(2) NOT NULL",	
		"email" 			=> "varchar(255) NOT NULL",
		"telephone" 		=> "varchar(255) NOT NULL",	
		"gsm" 			=> "varchar(255) NOT NULL",	
		"question_1" 		=> "varchar(3) NOT NULL",	
		"question_2" 		=> "varchar(8) NOT NULL",		
		"question_3" 		=> "varchar(255) NOT NULL",		
		"code" 			=> "varchar(10) NOT NULL",	
		"conditions_ok" 	=> "varchar(2) NOT NULL",				
		"opt_out" 		=> "varchar(2) NOT NULL",											
		);

	$spip_concours_reponses_key = array(
		"PRIMARY KEY"		=> "id_reponse",
		);	
		
	$spip_concours_reponses_join = array(
		"id_reponse"	=> "id_reponse",
		);	
		
	$tables_principales['spip_concours_reponses'] = array(
		'field' => &$spip_concours_reponses,
		'key' => &$spip_concours_reponses_key,
		'join' => &$spip_concours_reponses_join,		
	);	


	$spip_concours_codes = array(
		"id_code"			=> "bigint(21) NOT NULL",
		"code"		=> "VARCHAR(255) NOT NULL",
		"utilise"		=> "bool NOT NULL",		

		);

	$spip_concours_codes_key = array(
		"PRIMARY KEY"		=> "id_code",
		"KEY code"	=> "code",
		);	
		
	$spip_concours_codes_join = array(
		"id_code"	=> "id_code",
		"code"	=> "code",
		);	
		
	$tables_principales['spip_concours_codes'] = array(
		'field' => &$spip_concours_codes,
		'key' => &$spip_concours_codes_key,
		'join' => &$spip_concours_codes_join,		
	);	
		

return $tables_principales;
};
?>
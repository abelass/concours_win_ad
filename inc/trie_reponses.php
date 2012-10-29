<?php

function inc_trie_reponses_dist($unique=NULL,$limit=NULL) {

	// on trie par les deux première question
	
	$where=array(
		'question_1='.sql_quote(trim(lire_config('concours/question_1'))),
		'question_2='.sql_quote(trim(lire_config('concours/question_2'))),	
		);

	// on calcule le temps e la question 3
	$temps=array(
	 	'minutes'=>lire_config('concours/minutes')*60,
		'secondes'=>lire_config('concours/secondes'),
		'centieme_secondes'=>lire_config('concours/centieme_secondes')/100
		);
	$question_3= array_sum($temps);

	// on établit les champs
	$trouver_table = charger_fonction('trouver_table','base');
	$e=$trouver_table('spip_concours_reponses');
	$champs=array();
	foreach ($e['field'] as $key=>$value) {
		$champs[$key] = $key;
		}
		
	// on calcule l'ecart pour la troisième question
	$champs['ABS']='ABS(question_3 - '.$question_3.') AS ecart' ;
		
	$champs=implode(',',$champs);	
	
	// on prend les bonnes réponses trie par l'ecart de la question 3
	$sql=sql_select($champs,'spip_concours_reponses',$where,array('ecart'),'',$limit);
	
	
	$reponses=array();
	while($row =sql_fetch($sql)){
		if(!$unique)$reponses[]=$row;
		else $reponses['id_reponse'][]=$row['id_reponse'];
	}

return $reponses;
}
?>
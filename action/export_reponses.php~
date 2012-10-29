<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

function action_export_reponses_dist(){	
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();
	
	// on sélectionne les 100 meilleures
	$reponses_tries=charger_fonction('trie_reponses','inc');
	$reponses = $reponses_tries('',100);
	
	//On détermine les entetes
	$trouver_table = charger_fonction('trouver_table','base');
	$e=$trouver_table('spip_concours_reponses');
	$entetes=array();
	
	foreach ($e['field'] as $key=>$value) {
		$entetes[$key] = $key;
		}
	$entetes['ecart'] = 'ecart';
	$titre='concours_'.date('d-m-Y');
	//On appele la fonction de bonux
	$export=charger_fonction('exporter_csv','inc');
	$export($titre,$reponses,'',$entetes);
}

?>

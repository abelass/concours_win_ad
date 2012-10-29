<?php
if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/presentation');

function exec_concours_dist(){

	// si pas autorise : message d'erreur
	if (session_get('statut') != '0minirezo') {
		include_spip('inc/minipres');
		echo minipres();
		die();
	}

	// pipeline d'initialisation
	pipeline('concours', array('args'=>array('exec'=>'concours'),'data'=>''));

	// entetes
	$commencer_page = charger_fonction('commencer_page', 'inc');
	echo $commencer_page(_T('concours:concours'),_T('concours:concours'),_T('concours:concours'));
	
	// titre
	echo gros_titre(_T('concours:concours'),'', false);
	
	// colonne gauche
	echo debut_gauche('', true);
	
		
	echo pipeline('affiche_gauche', array('args'=>array('exec'=>'projets'),'data'=>''));	
	

	// colonne droite
	echo creer_colonne_droite('', true);
	$bloc = '<div>';
	$bloc .='<a href="'.generer_action_auteur('export_reponses',100).'">'._T('concours:telecharger_100').'</a>';
	$bloc .= '</div>';
	echo bloc_des_raccourcis($bloc);
	// centre
	echo debut_droite('', true);
	
	// contenu
	
	$reponses_tries=charger_fonction('trie_reponses','inc');
	$reponses = $reponses_tries('oui');

	echo recuperer_fond('prive/concours', array(
		'reponses' => $reponses['id_reponse'],
		));

	echo pipeline('affiche_milieu', array('args'=>array('exec'=>'iextras_edit'),'data'=>''));

	echo fin_gauche(), fin_page();
}
?>

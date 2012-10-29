<?php
if (!defined("_ECRIRE_INC_VERSION")) return;


function concours_upgrade($nom_meta_base_version,$version_cible){
        $current_version = 0.0;
        if ((!isset($GLOBALS['meta'][$nom_meta_base_version]))
        || (($current_version = $GLOBALS['meta'][$nom_meta_base_version])!=$version_cible)){
                include_spip('base/concours_tables_principales');
                // cas d'une installation
                if ($version_cible > $GLOBALS['meta'][$nom_meta_base_version]){
                	if($GLOBALS['meta'][$nom_meta_base_version]==''){
				include_spip('base/create');
				creer_base();	
				maj_tables('spip_concours_codes');	
				maj_tables('spip_concours_reponses');							
				}
			else{
				include_spip('base/create');
				creer_base();
				maj_tables('spip_concours_codes');
				maj_tables('spip_concours_reponses');							
				}
               }

        }
	ecrire_meta($nom_meta_base_version, $current_version=$version_cible);
	ecrire_metas();        
}

?>
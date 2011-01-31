<?php
	echo select_tag('fcotring[doctos]',
			options_for_select(
					Constantes::TipoDocumento(),
					$fcotring->getDoctos(),
					'include_custom=Seleccione'),
			array( ));
?>

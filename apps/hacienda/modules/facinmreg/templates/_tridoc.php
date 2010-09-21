<?php
	echo select_tag('fcreginm[tridoc]',
			options_for_select(
					Constantes::ListaTrimestre(),
					$fcreginm->getTridoc(),
					'include_custom=Seleccione'),
			array( ));
?>

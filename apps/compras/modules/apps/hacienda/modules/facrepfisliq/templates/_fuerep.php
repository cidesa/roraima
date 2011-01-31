<?php
	echo select_tag('fcrepfis[fuerep]',
			options_for_select(
					Fcrepfis::Fuentedeingresor(),
					$fcrepfis->getFuerep(),
					'include_custom=Seleccione'),
			array( ));
?>

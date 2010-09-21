<?php
	echo select_tag('fcrepfis[fuesan]',
			options_for_select(
					Fcrepfis::Fuentedeingresos(),
					$fcrepfis->getFuesan(),
					'include_custom=Seleccione'),
			array( ));
?>

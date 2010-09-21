<?php
	echo select_tag('fcotring[codfue]',
			options_for_select(
					Fcotring::ListFueIng(),
					$fcotring->getCodfue(),
					'include_custom=Seleccione'),
				array());

?>



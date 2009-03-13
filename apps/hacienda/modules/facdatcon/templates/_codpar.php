<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php
	echo  select_tag('fcconrep[codpar1]',
	options_for_select(Hacienda::Combo_parroquia_Facdatcon($fcconrep),$fcconrep->getCodpar1(),'include_custom=Seleccione'));
?>
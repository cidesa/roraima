<?php
	echo select_tag('fcsolvencia[codtip]', options_for_select(Fcsolvencia::ListaSolvencia(),$fcsolvencia->getCodtip()))

?>
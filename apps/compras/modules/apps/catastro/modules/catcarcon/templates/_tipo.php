<?php
	echo
	select_tag('catcarcon[tipo]', options_for_select(Constantes::ListaCaractConst(),$catcarcon->getTipo(),'include_custom=Seleccione Uno'))

?>
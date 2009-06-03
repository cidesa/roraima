<?php
  echo select_tag('catcarter[tertip]', options_for_select(Constantes::ListaCaractTierra(),$catcarter->getTertip(),'include_custom=Seleccione Uno'))

?>
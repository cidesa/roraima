<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php

echo select_tag('npcestatickets[tippag]', options_for_select(Constantes::ListaTipoPagoTicket(),$npcestatickets->getTippag(),'include_custom=Seleccione'),array(
'onchange' => "javascript: tippagoticket()",
)); ?>

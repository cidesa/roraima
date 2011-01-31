<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fctippro[frepar]', options_for_select(Constantes::Frepar_Facaputip(),$fctippro->getFrepar()),array(
)); ?>
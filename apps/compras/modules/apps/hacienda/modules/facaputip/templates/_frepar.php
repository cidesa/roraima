<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fctipapu[frepar]', options_for_select(Constantes::Frepar_Facaputip(),$fctipapu->getFrepar()),array(
)); ?>
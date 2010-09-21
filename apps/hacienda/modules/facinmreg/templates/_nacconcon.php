<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?
 if ($fcreginm->getNacconcon()=="V")    { ?>
<?php
      echo radiobutton_tag('fcreginm[nacconcon]', 'V', true,array('disabled' => true)).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[nacconcon]', 'E', false,array('disabled' => true)).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcreginm->getNacconcon()=="E")
{
      echo radiobutton_tag('fcreginm[nacconcon]', 'V', false,array('disabled' => true)).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[nacconcon]', 'E', true,array('disabled' => true)).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcreginm[nacconcon]', 'V', true,array('disabled' => true)).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[nacconcon]', 'E', false,array('disabled' => true)).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?
 if ($fcrepfis->getNaccon()=="V")    { ?>
<?php
      echo radiobutton_tag('fcrepfis[naccon]', 'V', true,array('disabled' => true)).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcrepfis[naccon]', 'E', false,array('disabled' => true)).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcrepfis->getNaccon()=="E")
{
      echo radiobutton_tag('fcrepfis[naccon]', 'V', false,array('disabled' => true)).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcrepfis[naccon]', 'E', true,array('disabled' => true)).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcrepfis[naccon]', 'V', true,array('disabled' => true)).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcrepfis[naccon]', 'E', false,array('disabled' => true)).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
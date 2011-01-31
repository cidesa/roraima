<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcdeclar->getModo()=="V")    { ?>
<?php
      echo radiobutton_tag('fcdeclar[modo]', 'E', true).'&nbsp;&nbsp;'."Estimada".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[modo]', 'D', false).'&nbsp;&nbsp;'."Definitiva".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcdeclar->getModo()=="E")
{
      echo radiobutton_tag('fcdeclar[modo]', 'E', false).'&nbsp;&nbsp;'."Estimada".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[modo]', 'D', true).'&nbsp;&nbsp;'."Definitiva".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcdeclar[modo]', 'E', false).'&nbsp;&nbsp;'."Estimada".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[modo]', 'D', true).'&nbsp;&nbsp;'."Definitiva".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
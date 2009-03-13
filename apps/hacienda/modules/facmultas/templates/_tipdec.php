<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<? if ($fcmultas->getTipdec()=="E")    { ?>
<?php
      echo radiobutton_tag('fcmultas[tipdec]', 'E', true).'&nbsp;&nbsp;'."Estimada".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcmultas[tipdec]', 'D', false).'&nbsp;&nbsp;'."Definitiva";
}
else
{
      echo radiobutton_tag('fcmultas[tipdec]', 'E', false).'&nbsp;&nbsp;'."Estimada".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcmultas[tipdec]', 'D', true).'&nbsp;&nbsp;'."Definitiva";
}?>


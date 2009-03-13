<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<? if ($fcmultas->getMonpro()=="P")    { ?>
<?php
      echo radiobutton_tag('fcmultas[monpro]', 'P', true).'&nbsp;&nbsp;'."Porcentaje".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcmultas[monpro]', 'M', false).'&nbsp;&nbsp;'."Monto";
}
else
{
      echo radiobutton_tag('fcmultas[monpro]', 'P', false).'&nbsp;&nbsp;'."Porcentaje".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcmultas[monpro]', 'M', true).'&nbsp;&nbsp;'."Monto";
}?>


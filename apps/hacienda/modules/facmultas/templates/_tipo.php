<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<? if ($fcmultas->getTipo()=="M")    { ?>
<?php
      echo radiobutton_tag('fcmultas[tipo]', 'M', true).'&nbsp;&nbsp;'."Manual".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcmultas[tipo]', 'A', false).'&nbsp;&nbsp;'."Automático";
}
else
{
      echo radiobutton_tag('fcmultas[tipo]', 'M', false).'&nbsp;&nbsp;'."Manual".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcmultas[tipo]', 'A', true).'&nbsp;&nbsp;'."Automático";
}?>


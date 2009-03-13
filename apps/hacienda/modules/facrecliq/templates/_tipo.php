<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<? if ($fcdefrecint->getTipo()=="R")    { ?>
<?php
      echo radiobutton_tag('fcdefrecint[tipo]', 'R', true).'&nbsp;&nbsp;'."Recargos".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdefrecint[tipo]', 'I', false).'&nbsp;&nbsp;'."Intereses Moratorios";
}
else
{
      echo radiobutton_tag('fcdefrecint[tipo]', 'R', false).'&nbsp;&nbsp;'."Recargos".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdefrecint[tipo]', 'I', true).'&nbsp;&nbsp;'."Intereses Moratorios";
}?>



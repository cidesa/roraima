<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcdefdesc->getTipo()=="P")    { ?>
<?php
      echo radiobutton_tag('fcdefdesc[tipo]', 'P', true).'&nbsp;&nbsp;'."Pronto Pago".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdefdesc[tipo]', 'R', false).'&nbsp;&nbsp;'."Eventuales".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdefdesc[tipo]', 'S', false).'&nbsp;&nbsp;'."Periódico";
}
elseif ($fcdefdesc->getTipo()=="R")
{
      echo radiobutton_tag('fcdefdesc[tipo]', 'P', false).'&nbsp;&nbsp;'."Pronto Pago".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdefdesc[tipo]', 'R', true).'&nbsp;&nbsp;'."Eventuales".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdefdesc[tipo]', 'S', false).'&nbsp;&nbsp;'."Periódico";
}
elseif ($fcdefdesc->getTipo()=="S")
{
      echo radiobutton_tag('fcdefdesc[tipo]', 'P', false).'&nbsp;&nbsp;'."Pronto Pago".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdefdesc[tipo]', 'R', false).'&nbsp;&nbsp;'."Eventuales".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdefdesc[tipo]', 'S', true).'&nbsp;&nbsp;'."Periódico";
}
else
{
      echo radiobutton_tag('fcdefdesc[tipo]', 'P', true).'&nbsp;&nbsp;'."Pronto Pago".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdefdesc[tipo]', 'R', false).'&nbsp;&nbsp;'."Eventuales".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdefdesc[tipo]', 'S', false).'&nbsp;&nbsp;'."Periódico";
}
?>
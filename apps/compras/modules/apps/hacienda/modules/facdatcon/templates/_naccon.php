<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<? if ($fcconrep->getNaccon()=="V")    { ?>
<?php
      echo radiobutton_tag('fcconrep[naccon]', 'V', true).'&nbsp;&nbsp;'."Venezolano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconrep[naccon]', 'E', false).'&nbsp;&nbsp;'."Extranjero(a)";
}
else
{
      echo radiobutton_tag('fcconrep[naccon]', 'V', false).'&nbsp;&nbsp;'."Venezolano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconrep[naccon]', 'E', true).'&nbsp;&nbsp;'."Extranjero(a)";
}?>
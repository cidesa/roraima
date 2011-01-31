<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<? if ($fcconrep->getRepcon()=="C")    { ?>
<?php
      echo radiobutton_tag('fcconrep[repcon]', 'C', true).'&nbsp;&nbsp;'."Constribuyente".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconrep[repcon]', 'R', false).'&nbsp;&nbsp;'." Representante";
}
else
{
      echo radiobutton_tag('fcconrep[repcon]', 'C', false).'&nbsp;&nbsp;'." Constribuyente".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconrep[repcon]', 'R', true).'&nbsp;&nbsp;'."  Representante";
}?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<? if ($fcconrep->getTipcon()=="N")    { ?>
<?php
      echo radiobutton_tag('fcconrep[tipcon]', 'N', true).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconrep[tipcon]', 'J', false).'&nbsp;&nbsp;'."Juridica";
}
else
{
      echo radiobutton_tag('fcconrep[tipcon]', 'N', false).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconrep[tipcon]', 'J', true).'&nbsp;&nbsp;'."Juridica";
}?>
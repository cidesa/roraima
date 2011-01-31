<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<? if ($fcdefrecint->getPeriodo()=="A")    { ?>
<?php
      echo radiobutton_tag('fcdefrecint[periodo]', 'A', true).'&nbsp;&nbsp;'."Periodo Actual".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdefrecint[periodo]', 'T', false).'&nbsp;&nbsp;'."Periodo Anterior";
}
else
{
      echo radiobutton_tag('fcdefrecint[periodo]', 'A', false).'&nbsp;&nbsp;'."Periodo Actual".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdefrecint[periodo]', 'T', true).'&nbsp;&nbsp;'."Periodo Anterior";
}?>

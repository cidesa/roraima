<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcreginm->getTipconrep()=="N")    { ?>
<?php
      echo radiobutton_tag('fcreginm[tipconrep]', 'N', true).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[tipconrep]', 'J', false).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcreginm->getTipconrep()=="J")
{
      echo radiobutton_tag('fcreginm[tipconrep]', 'N', false).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[tipconrep]', 'J', true).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcreginm[tipconrep]', 'N', true).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[tipconrep]', 'J', false).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
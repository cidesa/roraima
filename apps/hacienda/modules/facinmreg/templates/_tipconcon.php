<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcreginm->getTipconcon()=="N")    { ?>
<?php
      echo radiobutton_tag('fcreginm[tipconcon]', 'N', true).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[tipconcon]', 'J', false).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcreginm->getTipconcon()=="J")
{
      echo radiobutton_tag('fcreginm[tipconcon]', 'N', false).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[tipconcon]', 'J', true).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcreginm[tipconcon]', 'N', true).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[tipconcon]', 'J', false).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
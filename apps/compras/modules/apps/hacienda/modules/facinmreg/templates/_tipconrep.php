<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcreginm->getTipconrep()=="N")    { ?>
<?php
      echo radiobutton_tag('fcreginm[tipconrep]', 'N', true,array('disabled' => true)).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[tipconrep]', 'J', false,array('disabled' => true)).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcreginm->getTipconrep()=="J")
{
      echo radiobutton_tag('fcreginm[tipconrep]', 'N', false,array('disabled' => true)).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[tipconrep]', 'J', true,array('disabled' => true)).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcreginm[tipconrep]', 'N', true,array('disabled' => true)).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[tipconrep]', 'J', false,array('disabled' => true)).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
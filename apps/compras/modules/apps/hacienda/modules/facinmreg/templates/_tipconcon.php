<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcreginm->getTipconcon()=="N")    { ?>
<?php
      echo radiobutton_tag('fcreginm[tipconcon]', 'N', true,array('disabled' => true)).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[tipconcon]', 'J', false,array('disabled' => true)).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcreginm->getTipconcon()=="J")
{
      echo radiobutton_tag('fcreginm[tipconcon]', 'N', false,array('disabled' => true)).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[tipconcon]', 'J', true,array('disabled' => true)).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcreginm[tipconcon]', 'N', true,array('disabled' => true)).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[tipconcon]', 'J', false,array('disabled' => true)).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
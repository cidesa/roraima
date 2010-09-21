<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcrepfis->getTipconrep()=="N")    { ?>
<?php
      echo radiobutton_tag('fcrepfis[tipconrep]', 'N', true,array('disabled' => true)).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcrepfis[tipconrep]', 'J', false,array('disabled' => true)).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcrepfis->getTipconrep()=="J")
{
      echo radiobutton_tag('fcrepfis[tipconrep]', 'N', false,array('disabled' => true)).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcrepfis[tipconrep]', 'J', true,array('disabled' => true)).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcrepfis[tipconrep]', 'N', true,array('disabled' => true)).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcrepfis[tipconrep]', 'J', false,array('disabled' => true)).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
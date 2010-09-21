<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcreginm->getNacconrep()=="V")    { ?>
<?php
      echo radiobutton_tag('fcreginm[nacconrep]', 'V', true,array('disabled' => true)).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[nacconrep]', 'E', false,array('disabled' => true)).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcreginm->getNacconrep()=="E")
{
      echo radiobutton_tag('fcreginm[nacconrep]', 'V', false,array('disabled' => true)).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[nacconrep]', 'E', true,array('disabled' => true)).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcreginm[nacconrep]', 'V', true,array('disabled' => true)).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[nacconrep]', 'E', false,array('disabled' => true)).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
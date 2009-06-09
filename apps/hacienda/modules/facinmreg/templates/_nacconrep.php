<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcreginm->getNacconrep()=="V")    { ?>
<?php
      echo radiobutton_tag('fcreginm[nacconrep]', 'V', true).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[nacconrep]', 'E', false).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcreginm->getNacconrep()=="E")
{
      echo radiobutton_tag('fcreginm[nacconrep]', 'V', false).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[nacconrep]', 'E', true).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcreginm[nacconrep]', 'V', true).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcreginm[nacconrep]', 'E', false).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
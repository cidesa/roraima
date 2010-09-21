<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcapulic->getNacconrep()=="V")    { ?>
<?php
      echo radiobutton_tag('fcapulic[nacconrep]', 'V', true, 'readOnly=true').'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcapulic[nacconrep]', 'E', false, 'readOnly=true').'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcapulic->getNacconrep()=="E")
{
      echo radiobutton_tag('fcapulic[nacconrep]', 'V', false, 'readOnly=true').'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcapulic[nacconrep]', 'E', true, 'readOnly=true').'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcapulic[nacconrep]', 'V', true, 'readOnly=true').'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcapulic[nacconrep]', 'E', false, 'readOnly=true').'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
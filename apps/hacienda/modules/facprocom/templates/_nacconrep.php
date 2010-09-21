<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcprolic->getNacconrep()=="V")    { ?>
<?php
      echo radiobutton_tag('fcprolic[nacconrep]', 'V', true, 'readOnly=true').'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcprolic[nacconrep]', 'E', false, 'readOnly=true').'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcprolic->getNacconrep()=="E")
{
      echo radiobutton_tag('fcprolic[nacconrep]', 'V', false, 'readOnly=true').'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcprolic[nacconrep]', 'E', true, 'readOnly=true').'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcprolic[nacconrep]', 'V', true, 'readOnly=true').'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcprolic[nacconrep]', 'E', false, 'readOnly=true').'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
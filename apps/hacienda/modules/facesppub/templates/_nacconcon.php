<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcesplic->getNacconcon()=="V")    { ?>
<?php
      echo radiobutton_tag('fcesplic[nacconcon]', 'V', true, 'readOnly=true').'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcesplic[nacconcon]', 'E', false, 'readOnly=true').'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcesplic->getNacconcon()=="E")
{
      echo radiobutton_tag('fcesplic[nacconcon]', 'V', false, 'readOnly=true').'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcesplic[nacconcon]', 'E', true, 'readOnly=true').'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcesplic[nacconcon]', 'V', true, 'readOnly=true').'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcesplic[nacconcon]', 'E', false, 'readOnly=true').'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
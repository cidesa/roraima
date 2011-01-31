<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcdeclar->getNacconsol()=="V")    { ?>
<?php
      echo radiobutton_tag('fcdeclar[nacconsol]', 'V', true).'&nbsp;&nbsp;'."Venezolano".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[nacconsol]', 'E', false).'&nbsp;&nbsp;'."Extranjero".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcdeclar->getNacconsol()=="E")
{
      echo radiobutton_tag('fcdeclar[nacconsol]', 'V', false).'&nbsp;&nbsp;'."Venezolano".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[nacconsol]', 'E', true).'&nbsp;&nbsp;'."Extranjero".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcdeclar[nacconsol]', 'V', true).'&nbsp;&nbsp;'."Venezolano".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[nacconsol]', 'E', false).'&nbsp;&nbsp;'."Extranjero".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
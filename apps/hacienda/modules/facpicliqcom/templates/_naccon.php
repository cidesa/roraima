<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcdeclar->getNaccon()=="V")    { ?>
<?php
      echo radiobutton_tag('fcdeclar[naccon]', 'V', true).'&nbsp;&nbsp;'."Venezolano".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[naccon]', 'E', false).'&nbsp;&nbsp;'."Extranjero".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcdeclar->getNaccon()=="E")
{
      echo radiobutton_tag('fcdeclar[naccon]', 'V', false).'&nbsp;&nbsp;'."Venezolano".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[naccon]', 'E', true).'&nbsp;&nbsp;'."Extranjero".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcdeclar[naccon]', 'V', true).'&nbsp;&nbsp;'."Venezolano".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[naccon]', 'E', false).'&nbsp;&nbsp;'."Extranjero".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
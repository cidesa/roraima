<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<? if ($fcdeclar->getTipconsol()=="V")    { ?>
<?php
      echo radiobutton_tag('fcdeclar[tipconsol]', 'N', true).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[tipconsol]', 'J', false).'&nbsp;&nbsp;'."Jurico".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcdeclar->getTipconsol()=="E")
{
      echo radiobutton_tag('fcdeclar[tipconsol]', 'N', false).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[tipconsol]', 'J', true).'&nbsp;&nbsp;'."Juridico".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcdeclar[tipconsol]', 'N', true).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[tipconsol]', 'J', false).'&nbsp;&nbsp;'."Juridico".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
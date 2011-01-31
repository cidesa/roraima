<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcactcom->getExento()=="S")    { ?>
<?php
      echo radiobutton_tag('fcactcom[exento]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcactcom[exento]', 'N', false).'&nbsp;&nbsp;'."No";
}
elseif ($fcactcom->getExento()=="N")
{
      echo radiobutton_tag('fcactcom[exento]', 'S', false).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcactcom[exento]', 'N', true).'&nbsp;&nbsp;'."No";
}
else
{
      echo radiobutton_tag('fcactcom[exento]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcactcom[exento]', 'N', false).'&nbsp;&nbsp;'."No";
}
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fctipsol->getPrivdeu()=="S")    { ?>
<?php
      echo radiobutton_tag('fctipsol[privdeu]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fctipsol[privdeu]', 'N', false).'&nbsp;&nbsp;'."No".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fctipsol->getPrivdeu()=="N")
{
      echo radiobutton_tag('fctipsol[privdeu]', 'S', false).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fctipsol[privdeu]', 'N', true).'&nbsp;&nbsp;'."No".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fctipsol[privdeu]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fctipsol[privdeu]', 'N', false).'&nbsp;&nbsp;'."No".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
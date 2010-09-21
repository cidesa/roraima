<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcprolic->getProtip()=="F")    { ?>
<?php
      echo radiobutton_tag('fcprolic[protip]', 'F', true ).'&nbsp;&nbsp;'."Fija".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcprolic[protip]', 'E', false ).'&nbsp;&nbsp;'."Eventual".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcprolic->getProtip()=="J")
{
      echo radiobutton_tag('fcprolic[protip]', 'F', false ).'&nbsp;&nbsp;'."Fija".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcprolic[protip]', 'E', true ).'&nbsp;&nbsp;'."Eventual".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcprolic[protip]', 'F', true ).'&nbsp;&nbsp;'."Fija".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcprolic[protip]', 'E', false ).'&nbsp;&nbsp;'."Eventual".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
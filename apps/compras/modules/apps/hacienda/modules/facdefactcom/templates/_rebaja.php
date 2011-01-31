<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcactcom->getRebaja()=="S")    { ?>
<?php
      echo radiobutton_tag('fcactcom[rebaja]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcactcom[rebaja]', 'N', false).'&nbsp;&nbsp;'."No";
}
elseif ($fcactcom->getRebaja()=="N")
{
      echo radiobutton_tag('fcactcom[rebaja]', 'S', false).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcactcom[rebaja]', 'N', true).'&nbsp;&nbsp;'."No";
}
else
{
      echo radiobutton_tag('fcactcom[rebaja]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcactcom[rebaja]', 'N', false).'&nbsp;&nbsp;'."No";
}
?>
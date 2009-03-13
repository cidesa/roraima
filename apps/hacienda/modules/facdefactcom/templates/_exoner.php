<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcactcom->getExoner()=="S")    { ?>
<?php
      echo radiobutton_tag('fcactcom[exoner]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcactcom[exoner]', 'N', false).'&nbsp;&nbsp;'."No";
}
elseif ($fcactcom->getExoner()=="N")
{
      echo radiobutton_tag('fcactcom[exoner]', 'S', false).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcactcom[exoner]', 'N', true).'&nbsp;&nbsp;'."No";
}
else
{
      echo radiobutton_tag('fcactcom[exoner]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcactcom[exoner]', 'N', false).'&nbsp;&nbsp;'."No";
}
?>
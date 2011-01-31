<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<? if ($fcfuepre->getTipmul()=="S")    { ?>
<?php
      echo radiobutton_tag('fcfuepre[tipmul]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcfuepre[tipmul]', 'N', false).'&nbsp;&nbsp;'."No";
}
else
{
      echo radiobutton_tag('fcfuepre[tipmul]', 'S', false).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcfuepre[tipmul]', 'N', true).'&nbsp;&nbsp;'."No";
}?>

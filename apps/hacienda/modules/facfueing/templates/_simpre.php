<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<? if ($fcfuepre->getSimpre()=="S")    { ?>
<?php
      echo radiobutton_tag('fcfuepre[simpre]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcfuepre[simpre]', 'N', false).'&nbsp;&nbsp;'."No";
}
else
{
      echo radiobutton_tag('fcfuepre[simpre]', 'S', false).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcfuepre[simpre]', 'N', true).'&nbsp;&nbsp;'."No";
}?>

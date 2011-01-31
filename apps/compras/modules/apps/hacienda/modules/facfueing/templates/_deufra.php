<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<? if ($fcfuepre->getAutliq()=="S")    { ?>
<?php
      echo radiobutton_tag('fcfuepre[autliq]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcfuepre[autliq]', 'N', false).'&nbsp;&nbsp;'."No";
}
else
{
      echo radiobutton_tag('fcfuepre[autliq]', 'S', false).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcfuepre[autliq]', 'N', true).'&nbsp;&nbsp;'."No";
}?>

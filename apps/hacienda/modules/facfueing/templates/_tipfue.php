<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<? if ($fcfuepre->getDeufra()=="S")    { ?>
<?php
      echo radiobutton_tag('fcfuepre[tipfue]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcfuepre[tipfue]', 'N', false).'&nbsp;&nbsp;'."No";
}
else
{
      echo radiobutton_tag('fcfuepre[tipfue]', 'S', false).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcfuepre[tipfue]', 'N', true).'&nbsp;&nbsp;'."No";
}?>

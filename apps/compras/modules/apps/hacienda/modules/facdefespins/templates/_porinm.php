<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcdefins->getPorinm()=="S")    { ?>
<?php
      echo radiobutton_tag('fcdefins[porinm]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdefins[porinm]', 'N', false).'&nbsp;&nbsp;'."No".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcdefins->getPorinm()=="N")
{
      echo radiobutton_tag('fcdefins[porinm]', 'S', false).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdefins[porinm]', 'N', true).'&nbsp;&nbsp;'."No".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcdefins[porinm]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdefins[porinm]', 'N', false).'&nbsp;&nbsp;'."No".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
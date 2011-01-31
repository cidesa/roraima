<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcsitjurinm->getStasitinm()=="S")    { ?>
<?php
      echo radiobutton_tag('fcsitjurinm[stasitinm]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcsitjurinm[stasitinm]', 'N', false).'&nbsp;&nbsp;'."No".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcsitjurinm->getStasitinm()=="N")
{
      echo radiobutton_tag('fcsitjurinm[stasitinm]', 'S', false).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcsitjurinm[stasitinm]', 'N', true).'&nbsp;&nbsp;'."No".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcsitjurinm[stasitinm]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcsitjurinm[stasitinm]', 'N', false).'&nbsp;&nbsp;'."No".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
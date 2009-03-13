<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fccominm->getAfeinm()=="C")    { ?>
<?php
      echo radiobutton_tag('fccominm[afeinm]', 'C', true).'&nbsp;&nbsp;'."Construcción".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccominm[afeinm]', 'T', false).'&nbsp;&nbsp;'."Terreno".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fccominm->getAfeinm()=="T")
{
      echo radiobutton_tag('fccominm[afeinm]', 'C', false).'&nbsp;&nbsp;'."Construcción".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccominm[afeinm]', 'T', true).'&nbsp;&nbsp;'."Terreno".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fccominm[afeinm]', 'C', true).'&nbsp;&nbsp;'."Construcción".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccominm[afeinm]', 'T', false).'&nbsp;&nbsp;'."Terreno".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
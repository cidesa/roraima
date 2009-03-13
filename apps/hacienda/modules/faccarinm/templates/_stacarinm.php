<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fccarinm->getStacarinm()=="T")    { ?>
<?php
      echo radiobutton_tag('fccarinm[stacarinm]', 'T', true).'&nbsp;&nbsp;'."Terreno".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccarinm[stacarinm]', 'C', false).'&nbsp;&nbsp;'."Construcción".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccarinm[stacarinm]', 'A', false).'&nbsp;&nbsp;'."Ambos";
}
elseif ($fccarinm->getStacarinm()=="C")
{
      echo radiobutton_tag('fccarinm[stacarinm]', 'T', false).'&nbsp;&nbsp;'."Terreno".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccarinm[stacarinm]', 'C', true).'&nbsp;&nbsp;'."Construcción".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccarinm[stacarinm]', 'A', false).'&nbsp;&nbsp;'."Ambos";
}
elseif ($fccarinm->getStacarinm()=="A")
{
      echo radiobutton_tag('fccarinm[stacarinm]', 'T', false).'&nbsp;&nbsp;'."Terreno".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccarinm[stacarinm]', 'C', false).'&nbsp;&nbsp;'."Construcción".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccarinm[stacarinm]', 'A', true).'&nbsp;&nbsp;'."Ambos";
}
else
{
      echo radiobutton_tag('fccarinm[stacarinm]', 'T', true).'&nbsp;&nbsp;'."Terreno".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccarinm[stacarinm]', 'C', false).'&nbsp;&nbsp;'."Construcción".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccarinm[stacarinm]', 'A', false).'&nbsp;&nbsp;'."Ambos";
}
?>
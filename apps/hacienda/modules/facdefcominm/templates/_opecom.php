<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fccominm->getOpecom()=="S")    { ?>
<?php
      echo radiobutton_tag('fccominm[opecom]', 'S', true).'&nbsp;&nbsp;'."Suma".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccominm[opecom]', 'R', false).'&nbsp;&nbsp;'."Resta".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccominm[opecom]', 'N', false).'&nbsp;&nbsp;'."No Afecta";
}
elseif ($fccominm->getOpecom()=="R")
{
      echo radiobutton_tag('fccominm[opecom]', 'S', false).'&nbsp;&nbsp;'."Suma".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccominm[opecom]', 'R', true).'&nbsp;&nbsp;'."Resta".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccominm[opecom]', 'N', false).'&nbsp;&nbsp;'."No Afecta";
}
elseif ($fccominm->getOpecom()=="N")
{
      echo radiobutton_tag('fccominm[opecom]', 'S', false).'&nbsp;&nbsp;'."Suma".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccominm[opecom]', 'R', false).'&nbsp;&nbsp;'."Resta".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccominm[opecom]', 'N', true).'&nbsp;&nbsp;'."No Afecta";
}
else
{
      echo radiobutton_tag('fccominm[opecom]', 'S', true).'&nbsp;&nbsp;'."Suma".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccominm[opecom]', 'R', false).'&nbsp;&nbsp;'."Resta".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fccominm[opecom]', 'N', false).'&nbsp;&nbsp;'."No Afecta";
}
?>
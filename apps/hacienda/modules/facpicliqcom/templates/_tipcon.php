<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<? if ($fcdeclar->getTipcon()=="V")    { ?>
<?php
      echo radiobutton_tag('fcdeclar[tipcon]', 'N', true).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[tipcon]', 'J', false).'&nbsp;&nbsp;'."Jurico".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcdeclar->getTipcon()=="E")
{
      echo radiobutton_tag('fcdeclar[tipcon]', 'N', false).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[tipcon]', 'J', true).'&nbsp;&nbsp;'."Juridico".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcdeclar[tipcon]', 'N', true).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[tipcon]', 'J', false).'&nbsp;&nbsp;'."Juridico".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
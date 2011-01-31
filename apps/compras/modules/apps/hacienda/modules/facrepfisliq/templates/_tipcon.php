<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcrepfis->getTipcon()=="N")    { ?>
<?php
      echo radiobutton_tag('fcrepfis[tipcon]', 'N', true,array('disabled' => true)).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcrepfis[tipcon]', 'J', false,array('disabled' => true)).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcrepfis->getTipcon()=="J")
{
      echo radiobutton_tag('fcrepfis[tipcon]', 'N', false,array('disabled' => true)).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcrepfis[tipcon]', 'J', true,array('disabled' => true)).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcrepfis[tipcon]', 'N', true,array('disabled' => true)).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcrepfis[tipcon]', 'J', false,array('disabled' => true)).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
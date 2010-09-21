<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcregveh->getTipconrep()=="N")    { ?>
<?php
      echo radiobutton_tag('fcregveh[tipconrep]', 'N', true, 'readOnly=true').'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcregveh[tipconrep]', 'J', false, 'readOnly=true').'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcregveh->getTipconrep()=="J")
{
      echo radiobutton_tag('fcregveh[tipconrep]', 'N', false, 'readOnly=true').'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcregveh[tipconrep]', 'J', true, 'readOnly=true').'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcregveh[tipconrep]', 'N', true, 'readOnly=true').'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcregveh[tipconrep]', 'J', false, 'readOnly=true').'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcapulic->getTipconrep()=="N")    { ?>
<?php
      echo radiobutton_tag('fcapulic[tipconrep]', 'N', true, 'readOnly=true').'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcapulic[tipconrep]', 'J', false, 'readOnly=true').'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcapulic->getTipconrep()=="J")
{
      echo radiobutton_tag('fcapulic[tipconrep]', 'N', false, 'readOnly=true').'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcapulic[tipconrep]', 'J', true, 'readOnly=true').'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcapulic[tipconrep]', 'N', true, 'readOnly=true').'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcapulic[tipconrep]', 'J', false, 'readOnly=true').'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
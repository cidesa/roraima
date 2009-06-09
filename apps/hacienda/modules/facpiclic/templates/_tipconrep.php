<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcsollic->getTipconrep()=="N")    { ?>
<?php
      echo radiobutton_tag('fcsollic[tipconrep]', 'N', true).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcsollic[tipconrep]', 'J', false).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcsollic->getTipconrep()=="J")
{
      echo radiobutton_tag('fcsollic[tipconrep]', 'N', false).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcsollic[tipconrep]', 'J', true).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcsollic[tipconrep]', 'N', true).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcsollic[tipconrep]', 'J', false).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
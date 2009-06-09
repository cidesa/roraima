<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcsollic->getTipconcon()=="N")    { ?>
<?php
      echo radiobutton_tag('fcsollic[tipconcon]', 'N', true).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcsollic[tipconcon]', 'J', false).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcsollic->getTipconcon()=="J")
{
      echo radiobutton_tag('fcsollic[tipconcon]', 'N', false).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcsollic[tipconcon]', 'J', true).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcsollic[tipconcon]', 'N', true).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcsollic[tipconcon]', 'J', false).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
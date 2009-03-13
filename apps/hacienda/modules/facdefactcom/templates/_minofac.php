<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcactcom->getMinofac()=="F")    { ?>
<?php
      echo radiobutton_tag('fcactcom[minofac]', 'F', true).'&nbsp;&nbsp;'."Bs. por Unidad".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcactcom[minofac]', 'M', false).'&nbsp;&nbsp;'."Porcentaje";
}
elseif ($fcactcom->getminofac()=="M")
{
      echo radiobutton_tag('fcactcom[minofac]', 'F', false).'&nbsp;&nbsp;'."Bs. por Unidad".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcactcom[minofac]', 'M', true).'&nbsp;&nbsp;'."Porcentaje";
}
else
{
      echo radiobutton_tag('fcactcom[minofac]', 'F', true).'&nbsp;&nbsp;'."Bs. por Unidad".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcactcom[minofac]', 'M', false).'&nbsp;&nbsp;'."Porcentaje";
}
?>
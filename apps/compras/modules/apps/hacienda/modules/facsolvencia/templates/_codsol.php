<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
if ($fcsolvencia->getId()=='')
{?>
  <?php $value = object_input_tag($fcsolvencia, 'getCodsol', array (
  'size' => 10,
  'control_name' => 'fcsolvencia[codsol]',
  'maxlength' => 10,
  'onBlur'  => "rellenar()",
)); echo $value ? $value : '&nbsp;' ?>
<?php
}
else
{
?>
  <?php $value = object_input_tag($fcsolvencia, 'getCodsol', array (
  'size' => 10,
  'readonly' => 'readonly',
  'control_name' => 'fcsolvencia[codsol]',
  'maxlength' => 10,
)); echo $value ? $value : '&nbsp;' ?>
<?php
}
?>

<script>
function rellenar()
{
    if ($('fcsolvencia_codsol').value == ''){
        $('fcsolvencia_codsol').value = $('fcsolvencia_codsol').value.pad(10,'#',0);
    }else if ($('fcsolvencia_codsol').value.length != 10)
    {
        $('fcsolvencia_codsol').value = $('fcsolvencia_codsol').value.pad(10,'0',0);
    }
}

</script>
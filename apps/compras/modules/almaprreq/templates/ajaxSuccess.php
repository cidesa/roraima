<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<form name="form1" id="form1">
<?
  $x=0;
  $formu='';
  while ($x<count($formulario))
  {
    $formu=$formu.$formulario[$x].'*';
    $x++;
  }
 ?>
<script type="text/javascript">
 var j=0;
 i='<? print $i; ?>';
 i=parseInt(i);
 var formu='<? print $formu; ?>';
 var formulario=formu.split('*');
 while (j<=i)
 {
   detalle(formulario[j]);
   j++;
 }
</script>
</form>

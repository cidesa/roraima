<?php
/*
 * Created on 22/06/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<?

$x=0;
$formu='';
while ($x<count($formulario))
{
  $formu=$formu.$formulario[$x].'*';
  $x++;
}
?>
<form name="form1" id="form1">
    <script type="text/javascript">
        j=0;
        i='<? print $i; ?>';
        i=parseInt(i);
        formu='<? print $formu; ?>';
        formulario=formu.split('*');
        while (j<=i)
        {
          comprobante(formulario[j]);
          j++;
        }
    </script>
</form>
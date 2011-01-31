<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<? echo grid_tag($obj);?>
<?php echo input_hidden_tag('fila', $numreg) ?>
<script language="JavaScript" type="text/javascript">

saldos();
 function saldos()
 {
 str3= document.getElementById('cacotiza_monrec').value.toString();
 str3= str3.replace('.','') ;
 str3= str3.replace('.','') ;
 str3= str3.replace('.','') ;
 str3= str3.replace('.','') ;
 str3= str3.replace('.','') ;
 str3= str3.replace('.','') ;
 str3= str3.replace(',','.');
 var num4=parseFloat(str3);

 str4= document.getElementById('totales').value.toString();
 str4= str4.replace('.','') ;
 str4= str4.replace('.','') ;
 str4= str4.replace('.','') ;
 str4= str4.replace('.','') ;
 str4= str4.replace('.','') ;
 str4= str4.replace('.','') ;
 str4= str4.replace(',','.');
 var num5=parseFloat(str4);

 var montot=num5+num4;

 $('cacotiza_moncot').value=format(montot.toFixed(2),'.',',','.');


 }
</script>

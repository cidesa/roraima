<?php use_helper('Javascript') ?>
<?php use_helper('tabs') ?>
<?php echo javascript_include_tag('dFilter','Linktoapp','formulacion/forpoa_uae') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php use_helper('Grid'); ?>
<?php use_helper('PopUp') ?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'SubmitClick', 'Javascript') ?>

<div id="divGrid">
<form name="form1" id="form1">
<?
//echo '111';
//print_r($arreg);
	if ($distmont=='V'){
		$arreglo=split("_",$arreg);

	}elseif ($distmont=='P'){

		$arreglo= array();
		//echo $asig_pre." 111111<br>";
		$monto=($asig_pre/12);
		for ($i=0;$i<=12;$i++)
		{
			$arreglo[$i]=$monto;
		}

	}else{ $arreglo= array(); }
?>
<table width="200" border="0" class="sf_admin_list">
  <tr>
    <td colspan="2">
	    <table border="1" width="100%" cellpadding="0" cellspacing="0">
		    <tr>
			    <td align="center"><strong>Asignacion Presupuestaria</strong></td>
		    </tr>
	    </table>
    </td>
  </tr>
  <tr>
    <td class="grid_titulo">Periodo</td>
    <td class="grid_titulo">Monto</td>
  </tr>
  <?
  $cont=0;
  $total=0;
  while ($cont<(count($arreglo))-1){ ?>
  <tr>
    <td class="grid_fila" align="center"><? echo $cont+1; ?></td>
    <td class="grid_fila"><input  class="grid_txtright" type="text" name="x<? echo $cont; ?>" id="x<? echo $cont; ?>" value="<? echo number_format($arreglo[$cont],2,',','.'); ?>" style="border: medium none ;" onKeypress="entermontootro(event,this.id), actualizarsaldos(event,this.id)"/></td>
  </tr>
  <?
    $total=$arreglo[$cont]+$total;
    $cont++;
     }
  ?>
  <tr>
    <td class="grid_titulo">Total</td>
    <td class="grid_fila"><input  class="grid_txtright" readonly="true" type="text" name="x<? echo $cont; ?>" id="x<? echo $cont; ?>" value="<? echo number_format($total,2,',','.'); ?>" style="border: medium none ;"/>
    </td>
  </tr>

</table>
</form>
</div>


<input type="button" name="Submit" value="Actualizar" onclick="javascript:actualizar('<? echo $id; ?>');">
<?php //echo button_to('Actualizar', 'forpoa_uae/grabardismonper?obj='.$obj.'&id='.$id.'&datos=+document.getElementById("totalcantidad").value') ?>


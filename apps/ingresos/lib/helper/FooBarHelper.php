<?php
function grid_tag($filas,$eliminar,$titulos,$anchos,$alignf,$alignt,$campos,$montos,$totales,$html,$js,$datos)
{

	$cuantos2=count($montos);
	
	
 $tagsrc='<script language="JavaScript"  src="/js/tools.js"></script>';
 $tag = ' <fieldset>
			<legend>Estimacion Periodica</legend>
			
			
			<table border="0" cellpad="0" cellspace="0" class="sf_admin_list">
			     <tr valign="bottom" bgcolor="#ECEBE6"> 
			         <td height="1"> 
			             <div class="grid01" id="grid01"> 
			             <table cellpad="0" cellspace="0" border="0" class="sf_admin_list">
			             <thead><tr>';
 				if ($eliminar)
 				{
 					$tag=$tag.'<th width="3%" align="center"></th>';
 				}
 				$i=0;
 				$tagciclo1='';
				while ($i<count($titulos))
 				{
	$tagfila =		            '<th width="'.$anchos[$i].'" align="center" class="grid_titulo">'.$titulos[$i].'</th>';

	$tagciclo1=$tagciclo1.$tagfila;
				$i++;
 				}

 	$tagb =		             '</tr></thead>';
 	
	////////////////////////
	//DATOS
	$i=0;
	$contdatos=count($datos);
	$tagciclo2='';
	 while ($i<$contdatos)
	 {
	 	$tagf=				'<tr height="15">';
	 	if ($eliminar)
 				{
 					$tagf=$tagf.'<td class="grid_fila" align="center" height="15"><input style="border:none" class="imagenborrar" name="x'.$i.'0" id="x'.$i.'0" size="1" onClick="eliminar('.$i.','.count($campos).')"></td>';
 				}
	 	
			$j=0;
			$acumtagw='';
	 		while ($j<count($campos))
	 		{
	 			$jmasuno=$j+1;
	 			$campo=$campos[$j];
	 			//eval('$get = '.'$datos['.$i.']->get'.$campo.'();'.';');
				if (trim($campo)!="")
				{
					eval('$get = '.'$datos['.$i.']->get'.$campo.'();');
				}
				else
				{
					$get="";		
				}
	 			
	 				$tagw ='     <td class="grid_fila" align="'.$alignf[$j].'" height="15"><input style="border:none" class="grid_txt'.$alignt[$j].'" name="x'.$i.$jmasuno.'" id="x'.$i.$jmasuno.'" '.$html[$j].' '.$js[$j].'	 
								  value="'.$get.'" ></td>';
	 			$acumtagw = $acumtagw.$tagw;
	 		$j++;
	 		}
	 		
	 	$tagf2=				'</tr>';
	 		
	 $tagciclo2=$tagciclo2.$tagf.$acumtagw.$tagf2;
	 $i++;
	 }
	 
	 //RESTO
	 //////////////
	 $tagciclo3='';
	 while ($i<$filas)
	 {
	 	$tagf=				'<tr height="15">';

	 	if ($eliminar)
		{
			$tagf=$tagf.'<td class="grid_fila" align="center" height="15"><input style="border:none" class="imagenborrar" name="x'.$i.'0" id="x'.$i.'0" size="1" onClick="eliminar('.$i.','.count($campos).')"></td>';
		}
	 	
			$j=0;
			$acumtagw='';
	 		while ($j<count($campos))
	 		{
	 			$jmasuno=$j+1;
	 			$campo=$campos[$j];
	 			
	 				$tagw ='     <td class="grid_fila" align="'.$alignf[$j].'" height="15"><input style="border:none" class="grid_txt'.$alignt[$j].'" name="x'.$i.$jmasuno.'" id="x'.$i.$jmasuno.'" '.$html[$j].' '.$js[$j].'	 
								  value="" ></td>';
	 			$acumtagw = $acumtagw.$tagw;
	 		$j++;
	 		}
	 		
	 	$tagf2=				'</tr>';
	 		
	 $tagciclo3=$tagciclo3.$tagf.$acumtagw.$tagf2;
	 $i++;
	 }
	////////////////////////				
	
	
	$tag2='		             </table>
			             </div>
			         </td>
			      </tr>
			      <tr>
			      	<td width="80%" align="right">
			      		<input class="grid_txtright" type="text" id="total" name="total">
			      	</td>
			      	<td width="20%">
			      	</td>
			      </tr>
			</table>	
			
			</fieldset>

			<script type="text/javascript">
				actualizarsaldos();
			</script>';
	
	$tagentermonto='<script type="text/javascript">

				function entermonto(e,id)
				{
					//alert(e.keyCode);
					if (e.keyCode==13)		
					{
						if (validarnumero(id)==true)
						{
				
							actualizarsaldos();
						}
						else
						{
							document.getElementById(id).value=?0.00?;
							document.getElementById(id).focus();
							document.getElementById(id).select();
				
						}
					}
				
				}
				</script>';
	
	$tagactsal1 = '<script type="text/javascript">

					function actualizarsaldos()
					{
						i=0;
						var acum2=0;
						var cuantos=parseFloat("'.$filas.'");
						
						while (i<cuantos)
						{
							';
							$tagactsalciclo="";
							$j=0;
							while ($j<$cuantos2)
							{
			///////////////////								
			$tagactw='			var x'.$montos[$j].'="x"+i+'.$montos[$j].';

								if ( (document.getElementById(x'.$montos[$j].').value==" ") || (document.getElementById(x'.$montos[$j].').value=="") || (document.getElementById(x'.$montos[$j].').value=="NaN"))
								{
									document.getElementById(x'.$montos[$j].').value="0.00";
								}
								str'.$montos[$j].'= document.getElementById(x'.$montos[$j].').value.toString();
								str'.$montos[$j].'= str'.$montos[$j].'.replace(?,?,??);
								str'.$montos[$j].'= str'.$montos[$j].'.replace(?,?,??);
								str'.$montos[$j].'= str'.$montos[$j].'.replace(?,?,??);
								str'.$montos[$j].'= str'.$montos[$j].'.replace(?,?,??);
								str'.$montos[$j].'= str'.$montos[$j].'.replace(?,?,??);
			
								var num'.$montos[$j].'=parseFloat(str'.$montos[$j].');
								
								acum'.$montos[$j].'=acum'.$montos[$j].'+num'.$montos[$j].';
								document.getElementById(x'.$montos[$j].').value=format(num'.$montos[$j].'.toFixed(2),?.?,?.?,?,?);
								document.getElementById('."'".$totales[$j]."'".').value="";
								document.getElementById('."'".$totales[$j]."'".').value=format(acum'.$montos[$j].'.toFixed(2),?.?,?.?,?,?);';
			/////////////////////
							$j=$j+1;
			$tagactsalciclo=$tagactsalciclo.$tagactw;
							}
							
			$tagactsal2='		i=i+1;
						}
				   }
			
			</script>';
			
			
	$tagactsal = $tagactsal1.$tagactsalciclo.$tagactsal2;
	
	
	$tageliminar='	  
		
		<script type="text/javascript">

		function eliminar(i,c)
	    {
	   		f=document.form1;
			var fila;
			for (fila=i;fila<'.$filas.'-1;fila++)
			{				
				for (col=1;col<=c;col++)
				{							
					var x="x"+fila+col;
					fila2=parseInt(fila)+1;
					var y="x"+fila2+col;
					document.getElementById(x).value=document.getElementById(y).value;
					document.getElementById(y).value="";
				}
					
			}
			//ultima fila
			if (i=='.$filas.'-1)
			{
				for (col=1;col<=c;col++)
				{										
					var x="x"+i+col;
					document.getElementById(y).value="";
				}
						
			}			
	   actualizarsaldos();
	   }

		</script>';
	
	
	

			
	$tagactsal = str_replace("?","'",$tagactsal); 
	$tagentermonto = str_replace("?","'",$tagentermonto); 
	$tagciclo2 = str_replace("?","'",$tagciclo2);
	$tagciclo3 = str_replace("?","'",$tagciclo3);
	 
   $tagt=$tagsrc.$tagactsal.$tag.$tagciclo1.$tagb.$tagciclo2.$tagciclo3.$tag2.$tagentermonto.$tageliminar;
	 
   return $tagt;
}

?>


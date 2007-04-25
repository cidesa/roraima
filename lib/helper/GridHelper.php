<?php
function grid_tag($obj)
{
	$filas=$obj["filas"];
	$cabeza=$obj["cabeza"];	
	$eliminar=$obj["eliminar"];
	$titulos=$obj["titulos"];
	$anchos=$obj["anchos"];
	$alignf=$obj["alignf"];
	$alignt=$obj["alignt"];
	$campos=$obj["campos"];
	$catalogos=$obj["catalogos"];
	$ajax=$obj["ajax"];
	$montos=$obj["montos"];
	$filatotal=$obj["filatotal"];
	$totales=$obj["totales"];
	$html=$obj["html"];
	$js=$obj["js"];
	$datos=$obj["datos"];
	
	$cuantos2=count($montos);
	
 use_helper('PopUp');	
 $tagsrc='<script language="JavaScript"  src="/js/tools.js"></script>';
 $tag = ' <fieldset>
			<legend>'.$cabeza.'</legend>
			
			<table border="0" cellpad="0" cellspace="0" class="sf_admin_list" width="100%">
			     <tr valign="bottom" bgcolor="#ECEBE6"> 
			         <td height="1"> 
			             <div class="grid01" id="grid01"> 
			             <table cellpad="0" cellspace="0" border="0" class="sf_admin_list" width="100%">
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
	$filas=$contdatos+$filas;
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
	 			////ajax
	 			if ($ajax[$j]!="")
				{
	 				$aj=split("-",$ajax[$j]);
	 				$mos=substr($aj[1],0,1).$i.substr($aj[1],1,strlen($aj[1]));
	 				$com=substr($aj[2],0,1).$i.substr($aj[2],1,strlen($aj[2]));
					$blur="onBlur=".chr(34).
						  remote_function(array(
						  "url"      => "almregart/ajax",  			   
						  "complete" => "AjaxJSON(request, json)",
			  			  "with" => "'ajax=$aj[0]&cajtexmos=$mos&cajtexcom=$com&codigo='+this.value")).chr(34);
				}
				else
				{
					$blur='';		
				}
	 			//////////

	 			//catalogo
				if ($catalogos[$j]!="")
				{
					$cat=split("-",$catalogos[$j]);
					if (count($cat)==3) // devuelve 1 solo valor
					{
						$caj1=substr($cat[2],0,1).$i.substr($cat[2],1,strlen($cat[2]));
						$catobj=button_to_popup('...','generales/catalogo?clase='.$cat[0].'&frame='.$cat[1].'&obj1='.$caj1);
					}
					else // devuelve 2 valores
					{
						$caj1=substr($cat[2],0,1).$i.substr($cat[2],1,strlen($cat[2]));
						$caj2=substr($cat[3],0,1).$i.substr($cat[3],1,strlen($cat[3]));
						$catobj=button_to_popup('...','generales/catalogo?clase='.$cat[0].'&frame='.$cat[1].'&obj1='.$caj1.'&obj2='.$caj2);
					}
				}
				else
				{
					$catobj='';
				}
	 			
	 			///////////

				if (trim($campo)!="")
				{
					eval('$get = '.'$datos['.$i.']->get'.$campo.'();');
				}
				else
				{
					$get="";		
				}

				if ($j==1)
				{
	 				$tagw ='     <td class="grid_fila" align="'.$alignf[$j].'" height="15"><input style="border:none" class="grid_txt'.$alignt[$j].'" name="x'.$i.$jmasuno.'" id="x'.$i.$jmasuno.'" '.$html[$j].' '.$js[$j].'	 
								  value="'.$get.'" ><input type="hidden" id="x'.$i.'id" name="x'.$i.'id" value="'.$datos[$i]->getId().'" '.$blur.'>'.$catobj.'</td>';
				}
				else
				{
					$tagw ='     <td class="grid_fila" align="'.$alignf[$j].'" height="15"><input style="border:none" class="grid_txt'.$alignt[$j].'" name="x'.$i.$jmasuno.'" id="x'.$i.$jmasuno.'" '.$html[$j].' '.$js[$j].'	 
								  value="'.$get.'" '.$blur.'>'.$catobj.'</td>';
				}
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
	 			
	 			//catalogo
				if ($catalogos[$j]!="")
				{
					$cat=split("-",$catalogos[$j]);
					if (count($cat)==3) // devuelve 1 solo valor
					{
						$caj1=substr($cat[2],0,1).$i.substr($cat[2],1,strlen($cat[2]));
						$catobj=button_to_popup('...','generales/catalogo?clase='.$cat[0].'&frame='.$cat[1].'&obj1='.$caj1);
					}
					else // devuelve 2 valores
					{
						$caj1=substr($cat[2],0,1).$i.substr($cat[2],1,strlen($cat[2]));
						$caj2=substr($cat[3],0,1).$i.substr($cat[3],1,strlen($cat[3]));
						$catobj=button_to_popup('...','generales/catalogo?clase='.$cat[0].'&frame='.$cat[1].'&obj1='.$caj1.'&obj2='.$caj2);
					}
				}
				else
				{
					$catobj='';
				}
	 			
	 			///////////
	 			
	 			
	 			if ($j==1)
	 			{
	 				$tagw ='     <td class="grid_fila" align="'.$alignf[$j].'" height="15"><input style="border:none" class="grid_txt'.$alignt[$j].'" name="x'.$i.$jmasuno.'" id="x'.$i.$jmasuno.'" '.$html[$j].' '.$js[$j].'	 
								  value="" ><input type="hidden" id="x'.$i.'id" name="x'.$i.'id" value="">'.$catobj.'</td>';
	 			}
	 			else
	 			{
	 				$tagw ='     <td class="grid_fila" align="'.$alignf[$j].'" height="15"><input style="border:none" class="grid_txt'.$alignt[$j].'" name="x'.$i.$jmasuno.'" id="x'.$i.$jmasuno.'" '.$html[$j].' '.$js[$j].'	 
								  value="" >'.$catobj.'</td>';
	 			}
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
			      	'.$filatotal.'
			      </tr>
			</table>	
			<input type="hidden" id="txtidborrar" name="txtidborrar" value="">
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
						var acum1=0;
						var acum2=0;
						var acum3=0;
						var acum4=0;
						var acum5=0;
						var acum6=0;
						var acum7=0;
						var acum8=0;
						var acum9=0;
						var acum11=0;
						var acum12=0;
						var acum13=0;
						var acum14=0;
						var acum15=0;

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
								document.getElementById(x'.$montos[$j].').value=format(num'.$montos[$j].'.toFixed(2),?.?,?.?,?,?);';
			if ($totales[$j]!="")
			{
					$tagactw2='
								document.getElementById('."'".$totales[$j]."'".').value="";
								document.getElementById('."'".$totales[$j]."'".').value=format(acum'.$montos[$j].'.toFixed(2),?.?,?.?,?,?);';
			}		
			else
			{
					$tagactw2='';
			}
			/////////////////////
							$j=$j+1;
			$tagactsalciclo=$tagactsalciclo.$tagactw.$tagactw2;
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
			
			// guardamos el id a borrar
			var id = "x"+i+"id";
			var aux = "txtidborrar";
			if (document.getElementById(id).value!="") //chekeamos q sea no sea una fila nueva
			{
				if (document.getElementById(aux).value=="") //PARA Q NO LE PONGA RAYITA
				{
					document.getElementById(aux).value=document.getElementById(id).value;
				}
				else
				{
					document.getElementById(aux).value=document.getElementById(aux).value + "-" + document.getElementById(id).value;
				}

				document.getElementById(id).value="";
			}
			////////////////////////////

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
	$tagciclo2 = str_replace("*","?",$tagciclo2);
	$tagciclo3 = str_replace("?","'",$tagciclo3);
	$tagciclo3 = str_replace("*","?",$tagciclo3);
	 
   $tagt=$tagsrc.$tagactsal.$tag.$tagciclo1.$tagb.$tagciclo2.$tagciclo3.$tag2.$tagentermonto.$tageliminar;
	 
   return $tagt;
}

?>


<?php use_helper('Javascript') ?>

<?php 
	$i=1;
	$cod='';
	while ($sf_request->hasParameter('obj'.$i))
	{
		$cod=$cod."f.".$sf_request->getParameter('frame','formid').".".$sf_request->getParameter('obj'.$i,'obj'.$i).".value=val[".($i-1)."];
";	
		$i++;
	}
 ?>

<?php $js = "  
   function aceptar(val)
   {     
     f=opener.document;".
	 "".$cod."
     self.close();
   }
"; ?>
<?php echo javascript_tag($js); ?>

<table style="text-align: left; width: 100%;" border="0"
 cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td style="width: 135px;"></td>
      <td style="width: 945px;"></td>
      <td style="width: 121px;"></td>
    </tr>
    <tr>
      <td style="width: 135px;"></td>
      <td
 style="width: 80%; text-align: left; vertical-align: middle;">
      <table
 style="width: 849px; height: 31px; text-align: left; margin-left: auto; margin-right: auto;"
 border="0" cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
            <td style="width: 182px; text-align: right;">Filtro</td>
            <td><?php echo input_tag('filtro', '') ?><?php echo submit_tag('Buscar') ?></td>
            <td></td>
          </tr>
        </tbody>
      </table>
      </td>
      <td style="width: 121px;"></td>
    </tr>
    <tr>
      <td style="width: 135px;"></td>
      <td style="width: 945px;">
      <table
 style="width: 100%; text-align: left; margin-left: auto; margin-right: auto;"
 border="1" cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
          <?php 		$tam = count($columnas);												?>
          <?php 		foreach($columnas as $c)		
          				{	
          					if($c !='Id') echo '<td>'.$c.'</td>';												
		  				}																			?>
		  <?php			$val='';																?>
          </tr>
          <?php if(count($registros)>0) 																	
          		{ 																						
          	 	foreach($registros as $fila){															
		  	 		$i=0;
		  	 		echo '<tr>';
          	 		foreach($campos as $c)														
          				{
         					$dat='$par="var a=new Array(';
         					$k=1;
							while ($sf_request->hasParameter('obj'.$k))
							{
								if($k!=1) $dat = $dat.",";
								$info = '$infoget = $fila->get'.$campos[$k-1].'();';
								eval($info);
								$dat = $dat."'".$infoget."'";
								$k++;
							}
							$dat = $dat.');";';
							//print $dat; 
							
							
          					
          					
          					$cod= '$val=$fila->get'.$c.'();';	
          					//print $cod;						 
          					if($c!='Id') eval($cod);									
																		
		  					if($i==0) {
		  						eval($dat);
		  						//print $par;
		  						echo '<td>'; echo link_to_function($val, $par.'javascript:aceptar(a)'); echo '</td>';
		  								};
		  					if($i!=0 && $c!='Id') echo '<td>'.$val.'</td>';										
											
		  					$i++;																
		  				}
		  			echo '</tr>';		  																									
	      		 } 
          		}																							?>
        </tbody>
      </table>
      </td>
      <td style="width: 121px;"></td>
    </tr>
  </tbody>
</table>

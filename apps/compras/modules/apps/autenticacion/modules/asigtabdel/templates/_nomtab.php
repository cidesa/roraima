<?php
/*
 * Created on 11/11/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>

<div id="nomtabla">
<table width="50%" border="0">
    <tr>
        <td width="25%">
       <?php echo select_tag('apernueper[nomtab]', options_for_select(ApernueperPeer::cargarSelect($apernueper->getModulo()), $apernueper->getNomtab()),array (
		  'control_name' => 'apernueper_nomtab',
		  'size' => '10',
		  'multiple' => true,
		  'style' => 'width:250px',
		)); ?>

		</td>
                <td width="3%">
	  	<?php echo link_to_function(image_tag('/sf/sf_admin/images/next.png'), "seleccionarlista()") ?>
	  	<?php echo link_to_function(image_tag('/sf/sf_admin/images/previous.png'), "seleccionarlistareversa()") ?>
	  </td>
          <td width="25%">
	  <?php echo select_tag('apernueper[nomtab_r]', options_for_select(ApernueperPeer::cargarSelect2($apernueper->getModulo()), $apernueper->getNomtab()),array (
		  'control_name' => 'apernueper_nomtab_r',
		  'size' => 10,
		  'multiple' => true,
		  'style' => 'width:250px',
		)); ?>
	  </td>
    </tr>
  </table>

</div>

<script language="JavaScript" type="text/javascript">
   function seleccionarlista()
	{
      f=document.sf_admin_edit_form;
      var arreglo='';
      var arreglo2='';
      for (var i=0;i < f.apernueper_nomtab.options.length;i++)
        {
          if(f.apernueper_nomtab.options[i].selected==true)
          {
            var opcion=new Option(f.apernueper_nomtab.options[i].text, f.apernueper_nomtab.options[i].value)
            f.apernueper_nomtab_r.options[f.apernueper_nomtab_r.options.length]=opcion;
            arreglo=arreglo+"_"+f.apernueper_nomtab.options[i].text;
            arreglo2=arreglo2+";"+f.apernueper_nomtab.options[i].text;
          }
        }
      $('apernueper_concatenado').value = $('apernueper_concatenado').value+arreglo2;
      var aux = arreglo.split("_");
      for (var i=0;i < (aux.length);i++)
        {
      		for (var r=0;r < f.apernueper_nomtab.options.length;r++)
	        {
				if(f.apernueper_nomtab.options[r].text==aux[i])
				{
					f.apernueper_nomtab.options[r]=null;
				}
	        }
        }
	}

	function seleccionarlistareversa()
	{
          f=document.sf_admin_edit_form;
          var arreglo='';
          var arreglo2='';
          for (var i=0;i < f.apernueper_nomtab_r.options.length;i++)
            {
              if(f.apernueper_nomtab_r.options[i].selected==true)
              {
                var opcion=new Option(f.apernueper_nomtab_r.options[i].text, f.apernueper_nomtab_r.options[i].value)
                f.apernueper_nomtab.options[f.apernueper_nomtab.options.length]=opcion;
                arreglo=arreglo+"_"+f.apernueper_nomtab_r.options[i].text;
              }else{
                arreglo2=arreglo2+";"+f.apernueper_nomtab_r.options[i].text;
              }
            }
            $('apernueper_concatenado').value='';
            $('apernueper_concatenado').value = $('apernueper_concatenado').value+arreglo2;
          var aux = arreglo.split("_");
          for (var i=0;i < (aux.length);i++)
            {
                    for (var r=0;r < f.apernueper_nomtab_r.options.length;r++)
                    {
                                    if(f.apernueper_nomtab_r.options[r].text==aux[i])
                                    {
                                            f.apernueper_nomtab_r.options[r]=null;
                                    }
                    }
            }
	}
</script>


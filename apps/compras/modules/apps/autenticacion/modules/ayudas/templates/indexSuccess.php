
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'SubmitClick', 'tabs', 'Javascript', 'PopUp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>


<table aling="center">
<tr>
<table border="0" align="center" cellpadding="0" cellspacing="0">

<tr>
<div id="sf_admin_container" >


<h1><div aling="center"><?php echo __('Menú de Ayuda') ?></div></h1>

</div>

</tr>

<?php
  if(array_key_exists($menu,$m)){
	  foreach ($m[$menu] as $val) {

	    //<input type="button" onclick="var w=window.open('/compras_dev.php/generales/catalogo/clase/Caramart/frame/sf_admin_edit_form/obj1/caregart_ramart/obj2/caregart_nomram','true','menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80');w.focus();return false;" value="..." class=""/>

	    $laurl= '/'.$ayuda.'/'.$menu.'/'.$val['URL'];
	    $elname = $val['Name'];

	    $link = '<a href="javascript: var w = window.open('.chr(39).$laurl.chr(39).')">'.$elname.'</a>';

	  	echo '
			    <tr>
			      <td>'.$link.'</td>
			      <td></td>
			    </tr>
	         ';

	  	foreach ($val as $subval) {


	  	    if(strlen($subval['URL'])>2){

	  	        $laurl= '/'.$ayuda.'/'.$menu.'/'.$subval['URL'];
			    $elname = $subval['Name'];

			    $link = '<a href="javascript: var w = window.open('.chr(39).$laurl.chr(39).')">'.$elname.'</a>';

		  	    echo '
				      <tr>
				        <td></td>
				        <td>'.$link.'</td>
				      </tr>
		             ';
	  	    }
	  	}

	  }
  }else{
    echo 'No existe ayuda sobre este módulo';
  }


  ?>

</tr>
</table>
</table>




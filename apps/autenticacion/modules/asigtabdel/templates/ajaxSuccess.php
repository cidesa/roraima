<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

   <?php /* echo select_tag('apernueper[nomtab]', options_for_select(ApernueperPeer::cargarSelect($apernueper->getModulo(),$apernueper->getConcatenado()), $apernueper->getNomtab()),array (
              'control_name' => 'apernueper_nomtab',
              'size' => '10',
              'multiple' => true,
              'style' => 'width:400px',
            ));
            */
            ?>

<table width="50%" border="0">
    <tr>
        <td width="25%">
       <?php echo select_tag('apernueper[nomtab]', options_for_select(ApernueperPeer::cargarSelect($apernueper->getModulo(),$apernueper->getConcatenado()), $apernueper->getNomtab()),array (
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
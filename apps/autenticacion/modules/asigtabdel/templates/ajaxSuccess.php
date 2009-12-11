<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

   <?php echo select_tag('apernueper[nomtab]', options_for_select(ApernueperPeer::cargarSelect($apernueper->getModulo(),$apernueper->getConcatenado()), $apernueper->getNomtab()),array (
              'control_name' => 'apernueper_nomtab',
              'size' => '10',
              'multiple' => true,
              'style' => 'width:400px',
            )); ?>
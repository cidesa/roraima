<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _gridper.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<div id="gridperiodos">
<?

	echo grid_tag_v2($foringdefniv->getGridper());
?>
<div align="center">
<?php echo link_to_function(image_tag('/images/salir.gif'), "$('gridperiodos').hide()") ?>
</div>
</div>
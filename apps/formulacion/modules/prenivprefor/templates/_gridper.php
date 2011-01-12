<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _gridper.php 36328 2010-02-04 21:35:58Z dmartinez $
 */

?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'tabs', 'Javascript', 'PopUp', 'Grid') ?>
<div id="gridperiodos">
<?
	echo grid_tag_v2($fordefniv->getGridper());
?>
</div>


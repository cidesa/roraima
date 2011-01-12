<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _gridper.php 36423 2010-02-09 21:11:15Z dmartinez $
 */

?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'tabs', 'Javascript', 'PopUp', 'Grid') ?>
<div id="gridperiodos">
<?
	echo grid_tag_v2($cpdefniv->getGridper());
?>
</div>


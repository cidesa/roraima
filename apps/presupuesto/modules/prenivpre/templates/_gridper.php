<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:glagea $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_gridper.php 33667 2009-10-01 16:44:01Z glagea $
 */

?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'tabs', 'Javascript', 'PopUp', 'Grid') ?>
<div id="gridperiodos">
<?
	echo grid_tag_v2($cpdefniv->getGridper());
?>
</div>
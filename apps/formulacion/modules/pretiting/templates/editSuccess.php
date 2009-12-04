<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/18 15:41:44
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Clasificador Presupuestario (Recursos)', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('pretiting/edit_header', array('fordefparing' => $fordefparing)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('pretiting/edit_messages', array('fordefparing' => $fordefparing, 'labels' => $labels)) ?>
<?php include_partial('pretiting/edit_form', array('fordefparing' => $fordefparing, 'labels' => $labels, 'mascarapartida' => $mascarapartida, 'etiquetamascarapartida' => $etiquetamascarapartida, 'lonmaspar' => $lonmaspar)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('pretiting/edit_footer', array('fordefparing' => $fordefparing)) ?>
</div>

</div>

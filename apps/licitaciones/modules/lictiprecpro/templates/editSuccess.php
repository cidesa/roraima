<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/01 16:28:14
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'SubmitClick', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Personalidad Jurídica',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('lictiprecpro/edit_header', array('catiprec' => $catiprec)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('lictiprecpro/edit_messages', array('catiprec' => $catiprec, 'labels' => $labels)) ?>
<?php include_partial('lictiprecpro/edit_form', array('catiprec' => $catiprec, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('lictiprecpro/edit_footer', array('catiprec' => $catiprec)) ?>
</div>

</div>

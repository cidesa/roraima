<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/16 16:51:27
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'SubmitClick', 'Javascript','Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Emisión de Pagos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('tesmovemiche/edit_header', array('tscheemi' => $tscheemi)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('tesmovemiche/edit_messages', array('tscheemi' => $tscheemi, 'labels' => $labels)) ?>
<?php include_partial('tesmovemiche/edit_form', array('tscheemi' => $tscheemi, 'impche'=> $impche, 'numcomegr' => $numcomegr, 'numches'=> $numches, 'gridOrdPag' => $gridOrdPag, 'gridCompro' => $gridCompro, 'gridPrecom' => $gridPrecom, 'gridPagdir' => $gridPagdir, 'mensajeBen' => $mensajeBen, 'bloqueaopc' => $bloqueaopc, 'valoropc' => $valoropc, 'labels' => $labels, 'comprobaut' => $comprobaut)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('tesmovemiche/edit_footer', array('tscheemi' => $tscheemi)) ?>
</div>

</div>

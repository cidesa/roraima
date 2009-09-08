<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/09 16:18:38
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'Javascript', 'tabs', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de la Orden de Pago',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('pagemiord/edit_header', array('opordpag' => $opordpag)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('pagemiord/edit_messages', array('opordpag' => $opordpag, 'labels' => $labels)) ?>
<?php include_partial('pagemiord/edit_form', array('opordpag' => $opordpag, 'mascara' => $mascara, 'loncta' => $loncta, 'mascaraubi' => $mascaraubi, 'lonubi' => $lonubi, 'obj' => $obj,'obj4' => 'obj4', 'obj3' => $obj3, 'obj2' => $obj2, 'afectarec' => $afectarec, 'formatpar' => $formatpar, 'iniciopar' => $iniciopar, 'unidad' => $unidad, 'esta' => $esta, 'numconsul' => $numconsul, 'numretencion' => $numretencion, 'ordpagnom' => $ordpagnom, 'ordpagapo' => $ordpagapo, 'ordpagliq' => $ordpagliq, 'ordpagfid' => $ordpagfid, 'ordpagval' => $ordpagval,'genctaord' => $genctaord, 'compadic' => $compadic, 'color' => $color, 'eti' => $eti, 'labels' => $labels, 'obj5' => $obj5, 'obj6' => $obj6, 'grabo' => $grabo, 'genordret' => $genordret)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('pagemiord/edit_footer', array('opordpag' => $opordpag)) ?>
</div>

</div>

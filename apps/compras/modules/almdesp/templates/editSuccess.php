<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/16 11:39:26
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'SubmitClick', 'tabs', 'Javascript', 'PopUp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php
$eti=H::getConfApp2('etidesp', 'compras', 'almdesp');
if ($eti!="")
{
echo __('Edición de '.$eti,
array());
}else {
echo __('Edición de Despachos',
array());
}?></h1>

<div id="sf_admin_header">
<?php include_partial('almdesp/edit_header', array('cadphart' => $cadphart)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almdesp/edit_messages', array('cadphart' => $cadphart, 'labels' => $labels)) ?>
<?php include_partial('almdesp/edit_form', array('cadphart' => $cadphart, 'obj' => $obj, 'mascarapartida' => $mascarapartida, 'forubi' => $forubi, 'lonubi'=>$lonubi, 'mascaraubicacionalm'=>$mascaraubicacionalm, 'lonubialm'=>$lonubialm, 'dphdesh' => $dphdesh, 'labels' => $labels, 'mansolocor' => $mansolocor, 'bloqfec' => $bloqfec, 'oculeli' => $oculeli)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almdesp/edit_footer', array('cadphart' => $cadphart)) ?>
</div>

</div>

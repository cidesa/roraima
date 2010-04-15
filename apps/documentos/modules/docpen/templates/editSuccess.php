<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/29 10:53:13
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Atención de Documentos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('docpen/edit_header', array('dfatendoc' => $dfatendoc)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('docpen/edit_messages', array('dfatendoc' => $dfatendoc, 'labels' => $labels)) ?>
<?php include_partial('docpen/edit_form', array('dfatendoc' => $dfatendoc, 'dfatendocdet' => $dfatendocdet, 'labels' => $labels)) ?>
</div>

<br></br>
<br></br>
<br></br>
<div id="detalle"></div>
<?php echo javascript_tag(
  remote_function(array(
    'update'  => 'detalle',
    'url'     => 'docpendet/list?dfatendoc='.$dfatendoc->getId(),
  ))
) ?>
<br></br>
<br></br>
<br></br>
<div id="observaciones"></div>
<?php echo javascript_tag(
  remote_function(array(
    'update'  => 'observaciones',
    'url'     => 'docobs/list?dfatendoc='.$dfatendoc->getId(),
  ))
) ?>

<div id="sf_admin_footer">
<?php include_partial('docpen/edit_footer', array('dfatendoc' => $dfatendoc)) ?>
</div>

</div>

<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/31 10:20:58
?>
<ul class="sf_admin_actions">
  <li><?php echo button_to(__('list'), 'tesmovseglib/list?id='.$tsmovlib->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
<? if ($tsmovlib->getId()=='') { ?>
  <li><?php echo submit_tag_click(__('save'), array (
  'name' => 'save',
  'form' => 'sf_admin_edit_form',
  'class' => 'sf_admin_action_save',
)) ?></li>
<? } ?>
    <li><?php echo button_to(__('create'), 'tesmovseglib/create', array (
  'class' => 'sf_admin_action_create',
  'confirm' => '¿Desea crear un nuevo registro?. Perderá cualquier cambio en la ventana actual',
)) ?></li>
</ul>

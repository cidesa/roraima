<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/17 10:55:56
?>
<ul class="sf_admin_actions">
    <li><?php echo button_to(__('list'), 'almregpro/list?id='.$caprovee->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
    <li><?php echo submit_tag_click(__('save'), array (
  'name' => 'save',
  'form' => 'sf_admin_edit_form',
  'class' => 'sf_admin_action_save',
)) ?></li>
<li><?php echo button_to(__('create'), 'almregpro/create', array (
  'class' => 'sf_admin_action_create',
  'confirm' => '¿Desea crear un nuevo registro?. Perderá cualquier cambio en la ventana actual',
)) ?></li>

  </ul>

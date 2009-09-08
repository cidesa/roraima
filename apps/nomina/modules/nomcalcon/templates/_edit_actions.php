<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/23 14:28:48
?>
<ul class="sf_admin_actions">
    <li><?php echo button_to(__('list'), 'nomcalcon/list?id='.$npcalcon->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
    <li><?php echo submit_tag_click(__('save'), array (
  'name' => 'save',
  'form' => 'sf_admin_edit_form',
  'class' => 'sf_admin_action_save',
)) ?></li>
   <li><?php echo button_to(__('create'), 'nomcalcon/create', array (
  'class' => 'sf_admin_action_create',
)) ?></li>
  </ul>

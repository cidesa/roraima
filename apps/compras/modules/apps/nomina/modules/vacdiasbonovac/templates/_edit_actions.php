<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/09/04 10:27:38
?>
<ul class="sf_admin_actions">
    <li><?php echo submit_tag_click(__('save'), array (
  'name' => 'save',
  'form' => 'sf_admin_edit_form',
  'class' => 'sf_admin_action_save',
)) ?></li>
    <li><?php echo button_to(__('create'), 'vacdiasbonovac/create', array (
  'class' => 'sf_admin_action_create',
)) ?></li>
    <li><?php echo button_to(__('list'), 'vacdiasbonovac/list?id='.$npvacjorlab->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
</ul>

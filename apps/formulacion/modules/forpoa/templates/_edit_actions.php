<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_actions.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/12/11 15:19:24
?>
<ul class="sf_admin_actions">
    <li><?php echo button_to(__('list'), 'forpoa/list?id='.$forencpryaccespmet->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
    <li><?php echo submit_tag_click(__('save'), array (
  'name' => 'save',
  'form' => 'sf_admin_edit_form',
  'class' => 'sf_admin_action_save',
)) ?></li>
      <li><?php echo button_to(__('create'), 'forpoa/create', array (
  'class' => 'sf_admin_action_create',
)) ?></li>
</ul>

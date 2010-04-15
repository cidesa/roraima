<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/05/09 11:00:06
?>
<ul class="sf_admin_actions">
    <li><?php echo button_to(__('list'), 'nomcomocp/list?id='.$npcomocp->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
    <li><?php echo submit_tag_click(__('save'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
  'form' => 'sf_admin_edit_form',
)) ?></li>
</ul>

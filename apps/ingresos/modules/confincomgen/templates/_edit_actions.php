<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_actions.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/10/10 18:20:05
?>
<ul class="sf_admin_actions">
    <li><?php echo submit_tag_click(__('save'), array (
  'name' => 'save',
  'form' => 'sf_admin_edit_form',
  'class' => 'sf_admin_action_save',
)) ?></li>
  </ul>

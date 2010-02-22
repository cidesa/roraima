<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/27 14:43:57
?>
<ul class="sf_admin_actions">
    <li><?php echo button_to(__('list'), 'tesdesubi/list?id='.$bnubica->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
    <li><?php echo submit_tag_click(__('save'), array (
  'name' => 'save',
  'form' => 'sf_admin_edit_form',
  'class' => 'sf_admin_action_save',
)) ?></li>
    <li><?php echo button_to(__('create'), 'tesdesubi/create', array (
  'class' => 'sf_admin_action_create',
)) ?></li>
  </ul>
  <script language="JavaScript" type="text/javascript">
 var tieregrel='<?php echo $bnubica->getTiedatrel(); ?>';
  if (tieregrel=='S') $('save').hide();
</script>
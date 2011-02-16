<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_actions.php 36475 2010-02-11 21:15:00Z dmartinez $
 */
// date: 2007/10/02 17:09:54
?>
<ul class="sf_admin_actions">
    <li><?php echo button_to(__('list'), 'licprebas/list?id='.$liprebas->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
<?if ($liprebas->getStareq()!='N')
{?>
    <li><?php echo submit_tag_click(__('save'), array (
  'name' => 'save',
  'form' => 'sf_admin_edit_form',
  'class' => 'sf_admin_action_save',
  //'onClick' => 'generar();',
)) ?></li>
<? }?>
      <li><?php echo button_to(__('create'), 'licprebas/create', array (
  'class' => 'sf_admin_action_create',
  'confirm' => '¿Desea crear un nuevo registro?. Perderá cualquier cambio en la ventana actual',
)) ?></li>

  </ul>

<script language="JavaScript" type="text/javascript">

</script>

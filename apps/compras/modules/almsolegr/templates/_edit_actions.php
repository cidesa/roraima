<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/02 17:09:54
?>
<ul class="sf_admin_actions">
    <li><?php echo button_to(__('list'), 'almsolegr/list?id='.$casolart->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
<?if ($casolart->getStareq()!='N')
{?>
    <li><?php echo submit_tag_click(__('save'), array (
  'name' => 'save',
  'form' => 'sf_admin_edit_form',
  'class' => 'sf_admin_action_save',
  //'onClick' => 'generar();',
)) ?></li>
<? }?>
      <li><?php echo button_to(__('create'), 'almsolegr/create', array (
  'class' => 'sf_admin_action_create',
  'confirm' => '¿Desea crear un nuevo registro?. Perderá cualquier cambio en la ventana actual',
)) ?></li>

  </ul>

<script language="JavaScript" type="text/javascript">
  function generar()
  {
    if ($(id).value=="")
    {
      if(confirm("¿Desea Generar Precompromiso?"))
      {
        $('generapre').value='S';
      }
     f=document.sf_admin_edit_form;
     f.action=location.pathname;
     f.submit();
    }
  }
</script>

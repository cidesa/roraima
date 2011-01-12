<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_list_td_actions.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/11/22 14:54:37
?>
<td>
<ul class="sf_admin_td_actions">
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('edit'))), 'forsegpoa/edit?id='.$fordismetperpryaccmet->getId().'&codpro='.$fordismetperpryaccmet->getCodpro().'&accion='.$fordismetperpryaccmet->getCodaccesp().'&meta='.$fordismetperpryaccmet->getCodmet()) ?></li>
</ul>
</td>

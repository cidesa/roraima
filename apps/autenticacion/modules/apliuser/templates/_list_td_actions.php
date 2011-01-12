<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_list_td_actions.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2008/04/24 17:40:19
?>
<td>
<ul class="sf_admin_td_actions">
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('edit'))), 'apliuser/edit?id='.$apli_user->getId().'&login='.$apli_user->getLoguse()) ?></li>
</ul>
</td>

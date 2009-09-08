<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/26 11:40:01
?>

<ul class="sf_admin_actions">
<table align="right">
  <tr>
    <th>  <li><?php echo button_to(__('list'), 'teschecus/list?id='.$tscheemi->getId(), array (
			 'class' => 'sf_admin_action_list',
			)) ?></li>
  		  <li>
	</th>
    <th>  <li>
			<div id="divx" name="divx" style="display : none">
			  <?php echo submit_tag_click(__('save'), array (
			  'name' => 'save',
			  'id' => 'save',
			  'form' => 'sf_admin_edit_form',
			  'class' => 'sf_admin_action_save',
			)) ?>
			</div>
			</li>
	</th>
  </tr>
</table>
</ul>
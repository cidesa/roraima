<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/02/15 11:47:04
?>
<ul class="sf_admin_actions">
    <li><?php echo button_to(__('list'), 'presnomreghisantpre/list?id='.$npantpre->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
<li><?php echo button_to(__('create'), 'presnomreghisantpre/create', array (
  'class' => 'sf_admin_action_create',
)) ?></li>
</ul>

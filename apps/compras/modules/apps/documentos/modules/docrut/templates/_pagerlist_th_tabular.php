<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/16 14:35:05
?>
  <th id="sf_admin_list_th_tipdoc">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/dfrutadoc/sort') == 'tipdoc'): ?>
      <?php echo link_to(__('Tipo de Documento'), 'docrut/edit?sort=tipdoc&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/dfrutadoc/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/dfrutadoc/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Tipo de Documento'), 'docrut/edit?sort=tipdoc&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_nomuni">
        <?php echo __('Unidad') ?>
          </th>
  <th id="sf_admin_list_th_desuni">
        <?php echo __('Sub Unidad') ?>
          </th>
  <th id="sf_admin_list_th_desrut">
        <?php echo __('Descripción') ?>
          </th>
  <th id="sf_admin_list_th_diadoc">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/dfrutadoc/sort') == 'diadoc'): ?>
      <?php echo link_to(__('Días'), 'docrut/edit?sort=diadoc&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/dfrutadoc/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/dfrutadoc/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Días'), 'docrut/edit?sort=diadoc&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_rutdoc">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/dfrutadoc/sort') == 'rutdoc'): ?>
      <?php echo link_to(__('Orden'), 'docrut/edit?sort=rutdoc&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/dfrutadoc/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/dfrutadoc/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Orden'), 'docrut/edit?sort=rutdoc&type=asc') ?>
      <?php endif; ?>
          </th>

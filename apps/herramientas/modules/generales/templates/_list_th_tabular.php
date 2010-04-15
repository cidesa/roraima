<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/30 18:33:23
?>

<?php foreach ($columnas as $c => $nomcol) : ?>
  <th id="sf_admin_list_th_dphart">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/'.$clase.'/sort') == $c): ?>
      <?php echo link_to(__($nomcol), 'generales/catalogo?sort='.$c.'&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/'.$clase.'/sort') == 'asc' ? 'desc' : 'asc').$param) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/'.$clase.'/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__($nomcol), 'generales/catalogo?sort='.$c.'&type=asc'.$param) ?>
      <?php endif; ?>
          </th>
<?php endforeach; ?>


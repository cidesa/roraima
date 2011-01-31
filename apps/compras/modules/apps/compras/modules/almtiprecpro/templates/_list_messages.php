<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/09/07 09:56:29
?>
<?php if ($sf_request->getError('delete')): ?>
<div class="form-errors">
  <h2><?php echo __('No puede eliminar el registro seleccionado')?></h2>
  <ul>
    &nbsp;&nbsp;&nbsp; <?php echo $sf_request->getError('delete') ?>
  </ul>
</div>
<?php endif; ?>

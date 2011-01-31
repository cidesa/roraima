<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/16 11:05:56
?>
<?php if ($sf_request->getError('edit')): ?>
<div class="form-errors">
  <h2><?php echo __('Análisis de Cotizaciones No realizado') ?></h2>
  <br>
  <ul>
  &nbsp;&nbsp; <?php echo $sf_request->getError('edit') ?>
  </ul>
</div>
<?php endif; ?>

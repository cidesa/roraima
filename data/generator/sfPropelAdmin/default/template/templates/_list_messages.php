[?php

/**
 *
 * @package    Roraima
 * @subpackage <?php echo $this->getGeneratedModuleName() ?>
 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _list_messages.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?]

[?php if ($sf_request->getError('delete')): ?]
<div class="form-errors">
  <h2>[?php echo __('Errores al eliminar...', array('%name%' => '<?php echo sfInflector::humanize($this->getSingularName()) ?>')) ?]</h2>
  <ul>
    <li>[?php echo $sf_request->getError('delete') ?]</li>
  </ul>
</div>
[?php endif; ?]
[?php if ($sf_request->getError('valida')): ?]
<div class="form-errors">
  <h2>[?php echo __('Validaciones...', array('%name%' => '<?php echo sfInflector::humanize($this->getSingularName()) ?>')) ?]</h2>
  <ul>
    <li>[?php echo $sf_request->getError('valida') ?]</li>
  </ul>
</div>
[?php endif; ?]
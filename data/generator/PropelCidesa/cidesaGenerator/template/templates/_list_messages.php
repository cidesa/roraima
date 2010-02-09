[?php

/**
 *
 * @package    Roraima
 * @subpackage vistas
 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _list_messages.php 32815 2009-09-08 16:52:04Z lhernandez $
 * @copyright  Copyright 2007, Cide S.A.
 *
 */
 ?]

[?php if ($sf_request->getError('delete')): ?]
<div class="form-errors">
  <h2>[?php echo __('No se puede eliminar', array('%name%' => '<?php echo sfInflector::humanize($this->getSingularName()) ?>')) ?]</h2>
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
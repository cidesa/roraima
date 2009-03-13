[?php if ($sf_request->getError('delete')): ?]
<div class="form-errors">
  <h2>[?php echo __('No se puede eliminar', array('%name%' => '<?php echo sfInflector::humanize($this->getSingularName()) ?>')) ?]</h2>
  <ul>
    <li>[?php echo $sf_request->getError('delete') ?]</li>
  </ul>
</div>
[?php endif; ?]

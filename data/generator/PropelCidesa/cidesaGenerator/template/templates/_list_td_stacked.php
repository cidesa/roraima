[?php

/**
 *
 * @package    Roraima
 * @subpackage vistas
 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _list_td_stacked.php 32815 2009-09-08 16:52:04Z lhernandez $
 * @copyright  Copyright 2007, Cide S.A.
 *
 */
 ?]

<td colspan="<?php echo count($this->getColumns('list.display'))  ?>">
<?php if ($this->getParameterValue('list.params')): ?>
  <?php echo $this->getI18NString('list.params') ?>
<?php else: ?>
<?php $hides = $this->getParameterValue('list.hide', array()) ?>
<?php foreach ($this->getColumns('list.display') as $column): ?>
<?php if (in_array($column->getName(), $hides)) continue ?>
  <?php if ($column->isLink()): ?>
  [?php echo link_to(<?php echo $this->getColumnListTag($column) ?> ? <?php echo $this->getColumnListTag($column) ?> : __('-'), '<?php echo $this->getModuleName() ?>/edit?<?php echo $this->getPrimaryKeyUrlParams() ?>) ?]
  <?php else: ?>
  [?php echo <?php echo $this->getColumnListTag($column) ?> ?]
  <?php endif; ?>
   - 
<?php endforeach; ?>
<?php endif; ?>
</td>
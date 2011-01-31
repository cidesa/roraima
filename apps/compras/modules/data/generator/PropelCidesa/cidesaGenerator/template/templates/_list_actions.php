[?php

/**
 *
 * @package    Roraima
 * @subpackage vistas
 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _list_actions.php 32815 2009-09-08 16:52:04Z lhernandez $
 * @copyright  Copyright 2007, Cide S.A.
 *
 */
 ?]

<ul class="sf_admin_actions">
<?php $listActions = $this->getParameterValue('list.actions') ?>
<?php if (null !== $listActions): ?>
  <?php foreach ((array) $listActions as $actionName => $params): ?>
    <?php echo $this->addCredentialCondition($this->getButtonToAction($actionName, $params, false), $params) ?>
  <?php endforeach; ?>
<?php else: ?>
  <?php echo $this->getButtonToAction('_create', array(), false) ?>
<?php endif; ?>
</ul>

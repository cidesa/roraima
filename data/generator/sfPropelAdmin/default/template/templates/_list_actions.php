[?php

/**
 *
 * @package    Roraima
 * @subpackage <?php echo $this->getGeneratedModuleName() ?>
 
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 * @copyright  Copyright 2007, Cidesa C.A.
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

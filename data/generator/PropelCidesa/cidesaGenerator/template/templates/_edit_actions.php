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
<?php $editActions = $this->getParameterValue('edit.actions') ?>
<?php if (null !== $editActions): ?>
<?php foreach ((array) $editActions as $actionName => $params): ?>
  <?php if ($actionName == '_delete') continue ?>
  <?php if ($actionName[0] != '_') continue ?>
  <?php echo $this->addCredentialCondition($this->getButtonToAction($actionName, $params, true), $params) ?>
<?php endforeach; ?>
<?php else: ?>
  <?php echo $this->getButtonToAction('_list', array(), true) ?>
  <?php echo $this->getButtonToAction('_save', array(), true) ?>
  <?php echo $this->getButtonToAction('_save_and_add', array(), true) ?>
<?php endif; ?>
</ul>
<?php $editActions = $this->getParameterValue('edit.actions') ?>
<?php if (null !== $editActions){ ?>
<?php foreach ((array) $editActions as $actionName => $params): ?>
  <?php if ($actionName == '_delete') continue ?>
  <?php if ($actionName[0] == '_') continue ?>
<ul class="sf_admin_actions">
  <?php echo $this->addCredentialCondition($this->getButtonToAction($actionName, $params, true), $params) ?>
</ul>
<?php endforeach; }?>

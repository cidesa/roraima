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

<?php if ($this->getParameterValue('list.object_actions')): ?>
<td>
<ul class="sf_admin_td_actions">
<?php foreach ($this->getParameterValue('list.object_actions') as $actionName => $params): ?>
  <?php echo $this->addCredentialCondition($this->getLinkToAction($actionName, $params, true), $params) ?>
<?php endforeach; ?>
</ul>
</td>
<?php endif; ?>

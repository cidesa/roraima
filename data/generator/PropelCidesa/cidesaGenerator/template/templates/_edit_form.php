[?php

/**
 *
 * @package    Roraima
 * @subpackage vistas
 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 32815 2009-09-08 16:52:04Z lhernandez $
 * @copyright  Copyright 2007, Cide S.A.
 *
 */
 ?]

[?php echo form_tag('<?php echo $this->getModuleName() ?>/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
<?php foreach ($this->getColumnCategories('edit.display') as $category): ?>
<?php foreach ($this->getColumns('edit.display', $category) as $name => $column): ?>
<?php if (false !== strpos($this->getParameterValue('edit.fields.'.$column->getName().'.type'), 'admin_double_list')): ?>
  'onsubmit'  => 'double_list_submit(); return true;'
<?php break 2; ?>
<?php endif; ?>
<?php endforeach; ?>
<?php endforeach; ?>
)) ?]

<?php foreach ($this->getPrimaryKey() as $pk): ?>
[?php echo object_input_hidden_tag($<?php echo $this->getSingularName() ?>, 'get<?php echo $pk->getPhpName() ?>') ?]
<?php endforeach; ?>

<?php $hides = $this->getParameterValue('edit.hide', array());?>
<?php if (count($hides)!=0) {?>
<?php foreach ($this->getColumnCategories('edit.hide') as $category): ?>
<?php foreach ($this->getColumns('edit.hide', $category) as $name => $hd) : ?>
[?php echo object_input_hidden_tag($<?php echo $this->getSingularName() ?>, 'get<?php echo $hd->getPhpName() ?>', array('id' => '<?php echo $this->getSingularName()."_".$hd->getName()?>', 'name' => '<?php echo $this->getSingularName()."[".$hd->getName()."]" ?>')) ?]
<?php endforeach; ?>
<?php endforeach; }?>


<?php
$first = true ?>
<?php foreach ($this->getColumnCategories('edit.display') as $category): ?>
<?php
  if ($category[0] == '-')
  {
    $category_name = substr($category, 1);
    $collapse = true;

    if ($first)
    {
      $first = false;
      echo "[?php use_javascript(sfConfig::get('sf_prototype_web_dir').'/js/prototype') ?]\n";
      echo "[?php use_javascript(sfConfig::get('sf_admin_web_dir').'/js/collapse') ?]\n";
    }
  }
  else
  {
    $category_name = $category;
    $collapse = false;
  }
?>
<?php if ($category != 'NONE'): ?><h2 class="h2" onclick="javascript: return $('<?php echo "div".$category ?>').toggle();">[?php echo __('<?php echo $category_name ?>') ?]</h2>
<?php endif; ?>
<fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($category_name)) ?>" class="<?php if ($collapse): ?> collapse<?php endif; ?>">

<div class="form-row" id="<?php echo "div".$category ?>">
<?php foreach ($this->getColumns('edit.display', $category) as $name => $column): ?>
<?php if (in_array($column->getName(), $hides)) continue ?>
<?php if ($column->isPrimaryKey()) continue ?>
<?php $credentials = $this->getParameterValue('edit.fields.'.$column->getName().'.credentials') ?>
<?php if ($credentials): $credentials = str_replace("\n", ' ', var_export($credentials, true)) ?>
    [?php if ($sf_user->hasCredential(<?php echo $credentials ?>)): ?]
<?php endif; ?>
<div id="<?php echo 'div'.$column->getName() ?>">
  [?php if($labels['<?php echo $this->getSingularName() ?>{<?php echo $column->getName() ?>}']!='.:') { ?]
  [?php echo label_for('<?php echo $this->getParameterValue("edit.fields.".$column->getName().".label_for", $this->getSingularName()."[".$column->getName()."]") ?>', __($labels['<?php echo $this->getSingularName() ?>{<?php echo $column->getName() ?>}' ]), 'class="required" Style="text-align:left; width:150px"') ?]
  <div class="content[?php if ($sf_request->hasError('<?php echo $this->getSingularName() ?>{<?php echo $column->getName() ?>}')): ?] form-error[?php endif; ?]">
  [?php if ($sf_request->hasError('<?php echo $this->getSingularName() ?>{<?php echo $column->getName() ?>}')): ?]
    [?php echo form_error('<?php echo $this->getSingularName() ?>{<?php echo $column->getName() ?>}', array('class' => 'form-error-msg')) ?]
  [?php endif; }?]  
  
  <?php if(is_array($this->getUrlCatalogo($column))) {?>
  
  [?php echo <?php echo $this->getColumnCatalogo($column); ?>;?]

  <?php }else{ ?> 
  
  [?php $value = <?php echo $this->getColumnEditTag($column); ?>; echo $value ? $value : '&nbsp;' ?]
  <?php echo $this->getHelpAsIcon($column, 'edit') ?>    
	<?php }?>
	
  [?php if($labels['<?php echo $this->getSingularName() ?>{<?php echo $column->getName() ?>}']!='.:') { ?]  
  

   
  </div>
  [?php  } ?] 

</div>
<?php if ($credentials): ?>
    [?php endif; ?]
<?php endif; ?>
<br/>
<?php endforeach; ?>
</div>
</fieldset>
<?php endforeach; ?>

[?php include_partial('edit_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]

</form>

<ul class="sf_admin_actions">
<?php
/*
 * WARNING: delete is a form, it must be outside the main form
 */
 $editActions = $this->getParameterValue('edit.actions');
?>
  <?php if (null === $editActions || (null !== $editActions && array_key_exists('_delete', $editActions))): ?>
    <?php echo $this->addCredentialCondition($this->getButtonToAction('_delete', $editActions['_delete'], true), $editActions['_delete']) ?>
  <?php endif; ?>
</ul>


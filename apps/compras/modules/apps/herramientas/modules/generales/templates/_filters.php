<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/30 18:33:23
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('generales/catalogo?p=1'.$param, array('method' => 'get')) ?>

  <fieldset>
  <h2><?php echo __('filters') ?></h2>
  <?php

    foreach($columnas as $key => $col){
      $tipocol = $ctlg->getColumCreoleType($key);

      if($tipocol==5 || $tipocol==14){?>
        <div class="form-row">
          <label for="<?php echo $key ?>"><?php echo __($col.':') ?></label>
          <div class="content">
          <?php echo input_tag('filters['.$key.']', isset($filters[$key]) ? $filters[$key] : null, array (
            'size' => 8,
            )) ?>
          </div>
        </div>
      <?php }
      elseif($tipocol==10) { ?>
        <div class="form-row">
          <label for="<?php echo $key ?>"><?php echo __($col.':') ?></label>
          <div class="content">
          <?php echo input_date_range_tag('filters['.$key.']', isset($filters[$key]) ? $filters[$key] : null, array (
            'rich' => true,
            'calendar_button_img' => '/sf/sf_admin/images/date.png',
            'date_format' => 'dd/MM/yyyy',
          )) ?>
          </div>
        </div>
      <?php }
      else { ?>
        <div class="form-row">
          <label for="<?php echo $key ?>"><?php echo __($col.':') ?></label>
          <div class="content">
          <?php echo input_tag('filters['.$key.']', isset($filters[$key]) ? $filters[$key] : null, array (
            'size' => 15,
            )) ?>
          </div>
        </div>
      <?php }
    }
  ?>
  </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'generales/catalogo?filter=Limpiar'.$param, 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>

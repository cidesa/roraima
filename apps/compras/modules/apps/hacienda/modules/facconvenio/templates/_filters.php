<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/11 13:21:00
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('facconvenio/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="refcon" style="width: 100px"><?php echo __('Número de Control:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[refcon]', isset($filters['refcon']) ? $filters['refcon'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="feccon" style="width: 100px"><?php echo __('Fecha del Registro:') ?></label>
    <div class="content">
    <?php echo input_date_range_tag('filters[feccon]', isset($filters['feccon']) ? $filters['feccon'] : null, array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'date_format' => 'dd/MM/yy',
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'facconvenio/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>

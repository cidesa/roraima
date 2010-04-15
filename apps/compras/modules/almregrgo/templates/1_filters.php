<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/04 11:06:01
?>
<?php use_helper('Object', 'Javascript') ?>

<?php echo javascript_include_tag('tools') ?>

<div class="sf_admin_filters">
<?php echo form_tag('almregrgo/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codrgo"><?php echo __('Código') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codrgo]', isset($filters['codrgo']) ? $filters['codrgo'] : null, array (
  'size' => 4,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('filters_codrgo').value=valor;",
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="nomrgo"><?php echo __('Descripción') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nomrgo]', isset($filters['nomrgo']) ? $filters['nomrgo'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'almregrgo/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>

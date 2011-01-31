<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/21 16:40:24
?>
<?php echo form_tag('nomjorlablot/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npdefjorlab, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('npdefjorlab[codnom]', __($labels['npdefjorlab{codnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefjorlab{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefjorlab{codnom}')): ?>
    <?php echo form_error('npdefjorlab{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefjorlab, 'getCodnom', array (
  'size' => 5,
  'control_name' => 'npdefjorlab[codnom]',
)); echo $value ? $value : '&nbsp;' ?>

  <?php echo button_to('...','#'); ?>
  <?php $value = object_input_tag($npdefjorlab, 'getNomnom', array (
  'size' => 50,
  'control_name' => 'npdefjorlab[codnom]',
  'disabled' => 'true',
)); echo $value ? $value : '&nbsp;' ?>


    </div>
</div>

<div class="form-row">
  <?php echo label_for('npdefjorlab[idejor]', __($labels['npdefjorlab{idejor}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefjorlab{idejor}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefjorlab{idejor}')): ?>
    <?php echo form_error('npdefjorlab{idejor}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefjorlab, 'getIdejor', array (
  'size' => 5,
  'control_name' => 'npdefjorlab[idejor]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npdefjorlab[lunes]', __($labels['npdefjorlab{lunes}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npdefjorlab{lunes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefjorlab{lunes}')): ?>
    <?php echo form_error('npdefjorlab{lunes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if($npdefjorlab->getLunes() == '2') $val = true; else $val = false; ?> 
  <?php echo checkbox_tag('npdefjorlab[lunes]','2', $val); ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npdefjorlab[martes]', __($labels['npdefjorlab{martes}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npdefjorlab{martes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefjorlab{martes}')): ?>
    <?php echo form_error('npdefjorlab{martes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if($npdefjorlab->getMartes() == '3') $val = true; else $val = false; ?> 
  <?php echo checkbox_tag('npdefjorlab[martes]','3', $val); ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npdefjorlab[miercoles]', __($labels['npdefjorlab{miercoles}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npdefjorlab{miercoles}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefjorlab{miercoles}')): ?>
    <?php echo form_error('npdefjorlab{miercoles}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if($npdefjorlab->getMiercoles() == '4') $val = true; else $val = false; ?> 
  <?php echo checkbox_tag('npdefjorlab[miercoles]','4', $val); ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npdefjorlab[jueves]', __($labels['npdefjorlab{jueves}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npdefjorlab{jueves}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefjorlab{jueves}')): ?>
    <?php echo form_error('npdefjorlab{jueves}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if($npdefjorlab->getJueves() == '5') $val = true; else $val = false; ?> 
  <?php echo checkbox_tag('npdefjorlab[jueves]','5', $val); ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npdefjorlab[viernes]', __($labels['npdefjorlab{viernes}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npdefjorlab{viernes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefjorlab{viernes}')): ?>
    <?php echo form_error('npdefjorlab{viernes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if($npdefjorlab->getViernes() == '6') $val = true; else $val = false; ?> 
  <?php echo checkbox_tag('npdefjorlab[viernes]','6', $val); ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npdefjorlab[sabado]', __($labels['npdefjorlab{sabado}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npdefjorlab{sabado}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefjorlab{sabado}')): ?>
    <?php echo form_error('npdefjorlab{sabado}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if($npdefjorlab->getSabado() == '7') $val = true; else $val = false; ?> 
  <?php echo checkbox_tag('npdefjorlab[sabado]','7', $val); ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npdefjorlab[domingo]', __($labels['npdefjorlab{domingo}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('npdefjorlab{domingo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefjorlab{domingo}')): ?>
    <?php echo form_error('npdefjorlab{domingo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php if($npdefjorlab->getDomingo() == '1') $val = true; else $val = false; ?> 
  <?php echo checkbox_tag('npdefjorlab[domingo]','1', $val); ?>
    </div>
</div>

</fieldset>

<div>
<fieldset>
<legend>Empleados Asignados a la Jornada</legend>
<table border="0" class="sf_admin_list">
<thead>
	<tr>
	    <th><?php echo 'Estado' ?></th>	
	    <th><?php echo NphojintPeer::getColumName(NphojintPeer::CEDEMP) ?></th>
	    <th><?php echo NphojintPeer::getColumName(NphojintPeer::NOMEMP)  ?></th>
	</tr>
</thead>
<tbody>
	<?php $i = 1; foreach ($pagerNphojint->getResults() as $Nphojint): $odd = fmod(++$i, 2) ?>
	<tr class="sf_admin_row_<?php echo $odd ?>">
	    <td><?php echo checkbox_tag($Nphojint->getId(),'1',false) ?></td>
	    <td><?php echo $Nphojint->getCedemp()  ?></td>
	    <td><?php echo $Nphojint->getNomemp() ?></td>
	</tr>
	<?php endforeach; ?>	
</tbody>

<tfoot>
<tr><th colspan="5">
<div class="float-right">
<?php if ($pagerNphojint->haveToPaginate()): ?>
  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/first.png', array('align' => 'absmiddle', 'alt' => __('First'), 'title' => __('First'))), 'nomjorlablot/list?page=1') ?>
  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/previous.png', array('align' => 'absmiddle', 'alt' => __('Previous'), 'title' => __('Previous'))), 'nomjorlablot/list?page='.$pagerNphojint->getPreviousPage()) ?>

  <?php foreach ($pagerNphojint->getLinks() as $page): ?>
    <?php echo link_to_unless($page == $pagerNphojint->getPage(), $page, 'nomjorlablot/list?page='.$page) ?>
  <?php endforeach; ?>

	<?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/next.png', array('align' => 'absmiddle', 'alt' => __('Next'), 'title' => __('Next'))), 'nomjorlablot/edit?page='.$pagerNphojint->getNextPage()) ?>
	<?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/last.png', array('align' => 'absmiddle', 'alt' => __('Last'), 'title' => __('Last'))), 'nomjorlablot/edit?page='.$pagerNphojint->getLastPage()) ?>
<?php endif; ?>
</div>
<?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pagerNphojint->getNbResults()), $pagerNphojint->getNbResults()) ?>
</th></tr>
</tfoot>

</table>
</fieldset>
</div>


<?php include_partial('edit_actions', array('npdefjorlab' => $npdefjorlab)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($npdefjorlab->getId()): ?>
<?php echo button_to(__('delete'), 'nomjorlablot/delete?id='.$npdefjorlab->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

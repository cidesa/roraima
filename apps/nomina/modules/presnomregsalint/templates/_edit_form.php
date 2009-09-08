<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/07/17 17:21:16
?>
<?php echo form_tag('presnomregsalint/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'nomina/presnomregsalint', 'tools') ?>
<?php echo object_input_hidden_tag($npsalint, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('npsalint[codcon]', __($labels['npsalint{codcon}']), 'class=required') ?>
  <?php if ($sf_request->hasError('npsalint{codcon}')): ?> form-error<?php endif; ?>
  <?php if ($sf_request->hasError('npsalint{codcon}')): ?>
    <?php echo form_error('npsalint{codcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>



<?php echo input_tag('npsalint[codcon]', $npsalint->getCodcon(),
    	array('maxlength' => 3,
			  'onBlur'=> remote_function(array(
			  'url'      => 'presnomregsalint/ajax',
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=1&cajtexmos=npsalint_destipcon&codigo='+this.value",

			  )))
  )
?>

   <?php  echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Nptipcon_Presnomregsalint/clase/Nptipcon/frame/sf_admin_edit_form/obj1/npsalint_codcon/obj2/npsalint_destipcon/campo1/codtipcon/campo2/destipcon/param1/")?>

  <?php $value = object_input_tag($npsalint, 'getDestipcon', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'npsalint[destipcon]',
)); echo $value ? $value : '&nbsp;' ?>

<br><br>

  <?php echo label_for('npsalint[codnomasi]', __($labels['npsalint{codnomasi}']), 'class=required') ?>
  <?php if ($sf_request->hasError('npsalint{codnomasi}')): ?> form-error<?php endif; ?>
  <?php if ($sf_request->hasError('npsalint{codnomasi}')): ?>
    <?php echo form_error('npsalint{codnomasi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_tag('npsalint[codnomasi]', $npsalint->getCodnomasi(),
    	array('maxlength' => 3,
			  'onBlur'=> remote_function(array(
			  'url'      => 'presnomregsalint/ajax',
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=2&cajtexmos1=npsalint_nomnom&codnom='+this.value"
			  )))
  )
?>

   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npnomina_Presnomregsalint/clase/Npnomina/frame/sf_admin_edit_form/obj1/npsalint_codnomasi/obj2/npsalint_nomnom/campo1/codnom/campo2/nomnom/param1/'+$('npsalint_codcon').value+' ",'','','buttoncat')?>

 <?php $value = object_input_tag($npsalint, 'getNomnom', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'npsalint[nomnom]',
)); echo $value ? $value : '&nbsp;' ?>

</div>

<br><br>
<?php echo label_for('npsalint[periodo]', __($labels['npsalint{periodo}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('npsalint{periodo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('npsalint{periodo}')): ?> <?php echo form_error('npsalint{periodo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
 <?php $value = input_tag('npsalint[periodo]', '', array (
  'size' => 15,
  'control_name' => 'npsalint[periodo]',
  'onBlur'=> remote_function(array(
  			  'update'=> 'grid',
			  'url'      => 'presnomregsalint/ajax',
              'condition' => "$('npsalint_periodo').value != ''",
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=3&fecha='+this.value+'&contrato='+document.getElementById('npsalint_codcon').value+'&nomina='+document.getElementById('npsalint_codnomasi').value"
  			  //'with' => "'ajax=3&cajtexmos=forencpryaccespmet_desmet&cajtexcom=forencpryaccespmet_codmet&codigo='+this.value+'&codigo2='+document.getElementById('forencpryaccespmet_codpro').value+'&codigo3='+document.getElementById('forencpryaccespmet_codaccesp').value"
			  )))


); echo $value ? $value : '&nbsp;' ?>

<? $sql="select b.pereje||'/'||a.ano as fecha from npanos a, cppereje b where to_date(b.pereje||'/'||a.ano,'mm/yyyy')<=to_date('".date('m/Y')."','mm/yyyy')
order  by a.ano, b.pereje;";
   $url=cross_app_link_to('herramientas','catalogobuscar').'/space/catalogo1/objs/npsalint_periodo/campos/fecha'; ?>
<?php echo button_to_popup('...',$url,$sql,'catalogo1')?>
<br><br>
<div id=grid>
<?php
 echo grid_tag($obj);
?>
</div>
</fieldset>

<?php include_partial('edit_actions', array('npsalint' => $npsalint)) ?>

</form>

<ul class="sf_admin_actions">
  </ul>
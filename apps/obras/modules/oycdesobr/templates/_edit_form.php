<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/04 16:19:31
?>
<?php echo form_tag('oycdesobr/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ocregobr, 'getId') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe','obras/ofertas') ?>
<?php use_helper('tabs') ?>
<fieldset>
<legend><?php echo __('Datos de la Obra')?></legend>
<div class="form-row">
  <?php echo label_for('ocregobr[codobr]', __($labels['ocregobr{codobr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{codobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{codobr}')): ?>
    <?php echo form_error('ocregobr{codobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getCodobr', array (
  'size' => 15,
  'maxlength' => 8,
  'readonly'  =>  $ocregobr->getId()!='' ? true : false ,
  'control_name' => 'ocregobr[codobr]',
  'onKeyPress' => "javascript:if (event.keyCode==13 || event.keyCode==9){document.getElementById('ocregobr_codtipobr').focus();}",
  'onBlur'  => "javascript:event.keyCode=13; enter(event,this.value);",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('ocregobr[codtipobr]', __($labels['ocregobr{codtipobr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{codtipobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{codtipobr}')): ?>
    <?php echo form_error('ocregobr{codtipobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getCodtipobr', array (
  'size' => 4,
  'maxlength' => 4,
  'readonly'  =>  $ocregobr->getId()!='' ? true : false ,
  'control_name' => 'ocregobr[codtipobr]',
  'onBlur'=> remote_function(array(
        'url'      => 'oycdesobr/ajax',
        'condition' => "$('ocregobr_codtipobr').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=4&cajtexmos=ocregobr_destipobr&cajtexcom=ocregobr_codtipobr&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Octipobr_Oycdesobr/clase/Octipobr/frame/sf_admin_edit_form/obj1/ocregobr_codtipobr/obj2/ocregobr_destipobr/campo1/codtipobr/campo2/destipobr','','','botoncat')?>
&nbsp;
  <?php $value = object_input_tag($ocregobr, 'getDestipobr', array (
  'disabled' => true,
  'size'=> 40,
  'control_name' => 'ocregobr[destipobr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregobr[desobr]', __($labels['ocregobr{desobr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{desobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{desobr}')): ?>
    <?php echo form_error('ocregobr{desobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getDesobr', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'ocregobr[desobr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregobr[fecini]', __($labels['ocregobr{fecini}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{fecini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{fecini}')): ?>
    <?php echo form_error('ocregobr{fecini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregobr, 'getFecini', array (
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'readonly'  =>  $ocregobr->getId()!='' ? true : false ,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregobr[fecini]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregobr[fecfin]', __($labels['ocregobr{fecfin}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{fecfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{fecfin}')): ?>
    <?php echo form_error('ocregobr{fecfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ocregobr, 'getFecfin', array (
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'readonly'  =>  $ocregobr->getId()!='' ? true : false ,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ocregobr[fecfin]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>
<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Datos Ubicacion');?>
<fieldset>
<div class="form-row"><?php echo label_for('ocregobr[codpai]', __($labels['ocregobr{codpai}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocregobr{codpai}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocregobr{codpai}')): ?><?php echo form_error('ocregobr{codpai}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php echo select_tag('ocregobr[codpai]', options_for_select($pais,$ocregobr->getCodpai(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divEstados',
		'url'      => 'oycdesobr/combo?par=1',
		'with' => "'pais='+this.value"
  ))));?></div>
<br>
<?php echo label_for('ocregobr[codedo]', __($labels['ocregobr{codedo}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocregobr{codedo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocregobr{codedo}')): ?> <?php echo form_error('ocregobr{codedo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divEstados"><?php echo select_tag('ocregobr[codedo]', options_for_select($estados,$ocregobr->getCodedo(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divMunicipios',
		'url'      => 'oycdesobr/combo?par=2',
		'with' => "'pais='+document.getElementById('ocregobr_codpai').value+'&estado='+this.value"
  ))));?></div>
</div>
<br>
<?php echo label_for('ocregobr[codmun]', __($labels['ocregobr{codmun}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocregobr{codmun}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocregobr{codmun}')): ?> <?php echo form_error('ocregobr{codmun}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divMunicipios"><?php echo select_tag('ocregobr[codmun]', options_for_select($municipio,$ocregobr->getCodmun(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
		'update'   => 'divParroquia',
		'url'      => 'oycdesobr/combo?par=3',
		'with' => "'pais='+document.getElementById('ocregobr_codpai').value+'&estado='+document.getElementById('ocregobr_codedo').value+'&municipio='+this.value"
  ))));?></div>
</div>
<br>
<?php echo label_for('ocregobr[codpar]', __($labels['ocregobr{codpar}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocregobr{codpar}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocregobr{codpar}')): ?> <?php echo form_error('ocregobr{codpar}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divParroquia"><?php echo select_tag('ocregobr[codpar]', options_for_select($parroquia,$ocregobr->getCodpar(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
'update'   => 'divSector',
'url'      => 'oycdesobr/combo?par=4',
'with' => "'pais='+document.getElementById('ocregobr_codpai').value+'&estado='+document.getElementById('ocregobr_codedo').value+'&municipio='+document.getElementById('ocregobr_codmun').value+'&parroquia='+this.value"
  ))));?></div>
</div>
<br>
<?php echo label_for('ocregobr[codsec]', __($labels['ocregobr{codsec}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('ocregobr{codsec}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('ocregobr{codsec}')): ?> <?php echo form_error('ocregobr{codsec}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
<div id="divSector"><?php echo select_tag('ocregobr[codsec]', options_for_select($sector,$ocregobr->getCodsec(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
'update'   => 'divCasa',
'url'      => 'oycdesobr/combo?par=5',
'with' => "'pais='+document.getElementById('ocregobr_codpai').value+'&estado='+document.getElementById('ocregobr_codedo').value+'&municipio='+document.getElementById('ocregobr_codmun').value+'&parroquia='+document.getElementById('ocregobr_codpar').value+'&sector='+this.value"
  ))));?></div>
</div>
<br>
  <?php echo label_for('ocregobr[dirobr]', __($labels['ocregobr{dirobr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{dirobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{dirobr}')): ?>
    <?php echo form_error('ocregobr{dirobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getDirobr', array (
  'size' => '80x3',
  'maxlength'=> 250,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'ocregobr[dirobr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<?php tabPageOpenClose("tp1", "tabPage2", 'Presupuesto');?>
<fieldset>
<div class="form-row">
  <?php echo label_for('ocregobr[ivaobr]', __($labels['ocregobr{ivaobr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{ivaobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{ivaobr}')): ?>
    <?php echo form_error('ocregobr{ivaobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, array('getIvaobr',true), array (
  'size' => 7,
  'control_name' => 'ocregobr[ivaobr]',
  'readonly'  =>  $ocregobr->getId()!='' ? true : false ,
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
<?php echo '&nbsp;&nbsp;'.'(Aplicado al Contrato)'?>
    </div>

<br>

<?php echo grid_tag($obj);?>

<br>

<table>
<tr>
<th>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</th>
<th>
<?php echo label_for('ocregobr[subtot]', __($labels['ocregobr{subtot}']), 'class="required" Style="width:150px" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{subtot}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{subtot}')): ?>
    <?php echo form_error('ocregobr{subtot}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, array('getSubtot',true), array (
  'size' => 7,
  'readonly' => true,
  'control_name' => 'ocregobr[subtot]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregobr[moniva]', __($labels['ocregobr{moniva}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{moniva}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{moniva}')): ?>
    <?php echo form_error('ocregobr{moniva}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, array('getMoniva',true), array (
  'size' => 7,
  'readonly' => true,
  'control_name' => 'ocregobr[moniva]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('ocregobr[monobr]', __($labels['ocregobr{monobr}']), 'class="required" Style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{monobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{monobr}')): ?>
    <?php echo form_error('ocregobr{monobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, array('getMonobr',true), array (
  'size' => 7,
  'readonly' => true,
  'control_name' => 'ocregobr[monobr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage3", 'Asignación');?>
<fieldset>
<div class="form-row">
  <?php echo label_for('ocregobr[codpre]', __($labels['ocregobr{codpre}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{codpre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{codpre}')): ?>
    <?php echo form_error('ocregobr{codpre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getCodpre', array (
  'size' => 32,
  'maxlength' => $lonpre,
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascarapresupuesto')",
  'readonly'  =>  $ocregobr->getId()!='' ? true : false ,
  'control_name' => 'ocregobr[codpre]',
  'onBlur'=> remote_function(array(
        'url'      => 'oycdesobr/ajax',
        'condition' => "$('ocregobr_codpre').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&cajtexmos=ocregobr_nompre&cajtexcom=ocregobr_codpre&num=1&fecha='+$('ocregobr_fecini').value+'&monto='+$('ocregobr_monobr').value+'&obra='+$('ocregobr_codobr').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdeftit_Almregrgo/clase/Cpdeftit/frame/sf_admin_edit_form/obj1/ocregobr_codpre/obj2/ocregobr_nompre/campo1/codpre/campo2/nompre/param1/'.$lonpre,'','','botoncat')?>
    </div>
<br>
  <?php echo label_for('ocregobr[nompre]', __($labels['ocregobr{nompre}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{nompre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{nompre}')): ?>
    <?php echo form_error('ocregobr{nompre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getNompre', array (
  'disabled' => true,
  'size' => '60',
  'control_name' => 'ocregobr[nompre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('ocregobr[codpreiva]', __($labels['ocregobr{codpreiva}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{codpreiva}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{codpreiva}')): ?>
    <?php echo form_error('ocregobr{codpreiva}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getCodpreiva', array (
   'size' => 32,
   'maxlength' => $lonpre,
   'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascarapresupuesto')",
   'readonly'  =>  $ocregobr->getId()!='' ? true : false ,
  'control_name' => 'ocregobr[codpreiva]',
  'onBlur'=> remote_function(array(
        'url'      => 'oycdesobr/ajax',
        'condition' => "$('ocregobr_codpreiva').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&cajtexmos=ocregobr_nompreiva&cajtexcom=ocregobr_codpreiva&num=2&fecha='+$('ocregobr_fecini').value+'&monto='+$('ocregobr_moniva').value+'&obra='+$('ocregobr_codobr').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdeftit_Almregrgo/clase/Cpdeftit/frame/sf_admin_edit_form/obj1/ocregobr_codpreiva/obj2/ocregobr_nompreiva/campo1/codpre/campo2/nompre/param1/'.$lonpre,'','','botoncat')?>
    </div>
<br>
  <?php echo label_for('ocregobr[nompreiva]', __($labels['ocregobr{nompreiva}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{nompreiva}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{nompreiva}')): ?>
    <?php echo form_error('ocregobr{nompreiva}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getNompreiva', array (
  'disabled' => true,
  'size' => '60',
  'control_name' => 'ocregobr[nompreiva]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage4", 'Inspectores');?>
<fieldset>
<div class="form-row">
<?php echo grid_tag($obj2);?>
</div>
</fieldset>

<?php tabInit('tp1','0');?>


<?php include_partial('edit_actions', array('ocregobr' => $ocregobr)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($ocregobr->getId()): ?>
<?php echo button_to(__('delete'), 'oycdesobr/delete?id='.$ocregobr->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="JavaScript" type="text/javascript">
 var nuevo='<?php echo $ocregobr->getId(); ?>';
 if (nuevo!='')
 {
   $$('.botoncat')[0].disabled=true;
   $$('.botoncat')[1].disabled=true;
   $$('.botoncat')[2].disabled=true;
   $('trigger_ocregobr_fecini').hide();
   $('trigger_ocregobr_fecfin').hide();

 }

 function enter(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}

     $('ocregobr_codobr').value=valor;
   }
 }
</script>


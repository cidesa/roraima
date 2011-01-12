<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/13 21:15:22
?>
<?php echo form_tag('pagtipret/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php echo object_input_hidden_tag($optipret, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos Tipo de Retencion') ?></legend>
<div class="form-row">
  <?php echo label_for('optipret[codtip]', __($labels['optipret{codtip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('optipret{codtip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('optipret{codtip}')): ?>
    <?php echo form_error('optipret{codtip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($optipret, 'getCodtip', array (
  'size' => 20,
  'maxlength'=>3,
  'readonly'  =>  $optipret->getId()!='' ? true : false ,
  'control_name' => 'optipret[codtip]',
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('optipret_codtip').value=cadena",
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('optipret_codtip').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('optipret[destip]', __($labels['optipret{destip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('optipret{destip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('optipret{destip}')): ?>
    <?php echo form_error('optipret{destip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($optipret, 'getDestip', array (
  'size' => 80,
  'maxlength'=>250,
  'control_name' => 'optipret[destip]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
 <br>
   <?php echo label_for('optipret[codtipsen]', __($labels['optipret{codtipsen}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('optipret{codtipsen}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('optipret{codtipsen}')): ?>
    <?php echo form_error('optipret{codtipsen}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($optipret, 'getCodtipsen', array (
  'size' => 20,
  'control_name' => 'optipret[codtipsen]',
  'maxlength' => 3,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
 <br>
  <?php echo label_for('optipret[consustra]', __($labels['optipret{consustra}']), 'class="required" ') ?>
   <div class="content<?php if ($sf_request->hasError('optipret{destip}')): ?> form-error<?php endif; ?>">
  <?php if($optipret->getConsustra()=='S') $val = true; else $val=false; ?>

  <?php echo " Si " . radiobutton_tag('optipret[consustra]', 'S', $val, array('onClick'=> remote_function(array(
       'update'   => 'divDatos',
       'url'      => 'pagtipret/datos',
       'script'   => true,
           'with' => "'ajax=S&unitri='+document.getElementById('optipret_unitri').value+'&factor='+document.getElementById('optipret_factor').value+'&porsus='+document.getElementById('optipret_porsus').value+'&basimp='+document.getElementById('optipret_basimp').value+'&basimp1='+document.getElementById('optipret_basimp1').value+'&mbasmi='+document.getElementById('optipret_mbasmi').value+'&mbasmi1='+document.getElementById('optipret_mbasmi1').value+'&porret='+document.getElementById('optipret_porret').value"
        )))) ?>
  &nbsp;&nbsp;
  <?php echo "  No" . radiobutton_tag('optipret[consustra]', 'N', !$val, array('onClick'=> remote_function(array(
       'update'   => 'divDatos',
       'url'      => 'pagtipret/datos',
       'script'   => true,
         'with' => "'ajax=N&unitri='+document.getElementById('optipret_unitri').value+'&factor='+document.getElementById('optipret_factor').value+'&porsus='+document.getElementById('optipret_porsus').value+'&basimp='+document.getElementById('optipret_basimp').value+'&basimp1='+document.getElementById('optipret_basimp1').value+'&mbasmi='+document.getElementById('optipret_mbasmi').value+'&mbasmi1='+document.getElementById('optipret_mbasmi1').value+'&porret='+document.getElementById('optipret_porret').value"
        ))))?>
    </div>
<br>
<br>


<div id="divDatos">
<div id='sinsustra' style="<?if ($optipret->getConsustra()=='N') echo 'display:block'; else  echo 'display:none'; ?>">
 <fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
<tr>
<th>
 <?php echo label_for('optipret[porret]', __($labels['optipret{porret}']),'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('optipret{porret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('optipret{porret}')): ?>
    <?php echo form_error('optipret{porret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
    <?php $value = object_input_tag($optipret, array('getPorret',true), array (
  'size' => 7,
  'control_name' => 'optipret[porret]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
   </div>
</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>
   <?php echo label_for('sobreel', __('Sobre el '),'class="required"') ?>
  <?php $value = object_input_tag($optipret, array('getBasimp',true), array (
  'size' => 7,
  'control_name' => 'optipret[basimp]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
</th>
<th>
  <?php echo label_for('montot', __('% del Monto Total'),'class="required"') ?>
</th>

<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>
<div id="montoocul" style="display:none">
   <?php echo label_for('monbasmin', __('Monto Base Mínimo'),'class="required"') ?>
  <?php $value = object_input_tag($optipret, array('getMbasmi',true), array (
  'size' => 7,
  'control_name' => 'optipret[mbasmi]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
</div>
</th>
<th>
<div id="montoocul2" style="display:none">
  <?php echo label_for('expre', __('expresado en Unidades Tributarias'),'class="required"') ?>
</div>
</th>
</tr>
</table>
</div>
</fieldset>
</div>
<div id='consustra' style="<?if ($optipret->getConsustra()=='S') echo 'display:block'; else echo 'display:none'; ?>">
<fieldset id="sf_fieldset_none" class="">
<legend><? echo __('Sustraendo')?></legend>
<div class="form-row">
<table>
<th>
  <?php echo label_for('optipret[unitri]', __($labels['optipret{unitri}']),'class="required"') ?>
   <div class="content<?php if ($sf_request->hasError('optipret{unitri}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('optipret{unitri}')): ?>
    <?php echo form_error('optipret{unitri}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
    <?php $value = object_input_tag($optipret, array('getUnitri',true), array (
  'size' => 7,
  'control_name' => 'optipret[unitri]',
   'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
   </div>
</th>
<th>&nbsp;&nbsp;&nbsp;</th>
<th>
  <?php echo label_for('optipret[factor]', __('X '.'&nbsp;&nbsp;' .$labels['optipret{factor}']),'class="required"') ?>
   <div class="content<?php if ($sf_request->hasError('optipret{factor}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('optipret{factor}')): ?>
    <?php echo form_error('optipret{factor}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($optipret, array('getFactor',true), array (
  'size' => 7,
  'control_name' => 'optipret[factor]',
  'onBlur' => "javascript:event.keyCode=13; return entermontofactor(event, this.id)",
),'0,0000'); echo $value ? $value : '&nbsp;' ?>
 </div>
</th>
<th>&nbsp;&nbsp;&nbsp;</th>
<th>
  <?php echo label_for('optipret[porsus]', __('X '.'&nbsp;&nbsp;'.$labels['optipret{porsus}']),'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('optipret{porsus}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('optipret{porsus}')): ?>
  <?php echo form_error('optipret{porsus}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($optipret, array('getPorsus',true), array (
  'size' => 7,
  'control_name' => 'optipret[porsus]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
<?php echo '&nbsp;&nbsp;'.'%'?>
 </div>
</th>
</tr>
</table>
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
<th>
  <?php echo label_for('optipret[basimp1]', __($labels['optipret{basimp}']),'class="required"') ?>
   <div class="content<?php if ($sf_request->hasError('optipret{basimp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('optipret{basimp}')): ?>
    <?php echo form_error('optipret{basimp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($optipret, array('getBasimp',true), array (
  'size' => 7,
  'control_name' => 'optipret[basimp1]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
<?php echo '&nbsp;&nbsp;&nbsp;&nbsp;'.'% del Monto Total'?>
   </div>
</th>

<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>
<div id="montoocula" style="display:none">
   <?php echo label_for('monbasmin', __('Monto Base Mínimo'),'class="required"') ?>
  <?php $value = object_input_tag($optipret, array('getMbasmi',true), array (
  'size' => 7,
  'control_name' => 'optipret[mbasmi1]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
</div>
</th>
<th>
<div id="montoocula2" style="display:none">
  <?php echo label_for('expre', __('expresado en Unidades Tributarias'),'class="required"') ?>
</div>
</th>
</tr>
</table>
</div>
</fieldset>
</div>
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend><?echo __('Datos Contable') ?></legend>
<div class="form-row">
  <?php echo label_for('optipret[codcon]', __($labels['optipret{codcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('optipret{codcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('optipret{codcon}')): ?>
    <?php echo form_error('optipret{codcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($optipret, 'getCodcon', array (
  'size' => 32,
  'maxlength'=> $loncta,
  'control_name' => 'optipret[codcon]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'onBlur'=> remote_function(array(
        'url'      => 'pagtipret/ajax',
        'complete' => 'AjaxJSON(request, json), verificar()',
        'condition' => "$('optipret_codcon').value != '' && $('id').value == ''",
          'with' => "'ajax=1&cajtexmos=optipret_descta&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?> <?php echo input_hidden_tag('cargable', '') ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Pagtipret/clase/Contabb/frame/sf_admin_edit_form/obj1/optipret_descta/obj2/optipret_codcon/obj3/cargable/campo1/descta/campo2/codcta/campo3/cargab')?>
    </div>
<br>
  <?php echo label_for('optipret[descta]', __($labels['optipret{descta}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('optipret{descta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('optipret{descta}')): ?>
    <?php echo form_error('optipret{descta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($optipret, 'getDescta', array (
  'disabled' => true,
  'size'=>60,
  'control_name' => 'optipret[descta]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<?php include_partial('edit_actions', array('optipret' => $optipret)) ?>


</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($optipret->getId()): ?>
<?php echo button_to(__('delete'), 'pagtipret/delete?id='.$optipret->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
<script type="text/javascript">
function verificar()
{
  if ($('cargable').value!='C' && $('optipret_codcon').value!='')
  {
  	alert('La Cuenta Contable no es Cargable, Por favor Cambiela por una Cuenta Cargable');
  	$('optipret_codcon').value="";
  	$('optipret_descta').value="";
  }
}
 var limbast='<?php echo $optipret->getLimbaseret(); ?>';
 var consus='<?php echo $optipret->getConsustra(); ?>';
 if (limbast=='S')
 {
     if (consus=='S')
     {
         $('montoocula').show();
         $('montoocula2').show();
     }else {
         $('montoocul').show();
         $('montoocul2').show();
     }
 }

</script>
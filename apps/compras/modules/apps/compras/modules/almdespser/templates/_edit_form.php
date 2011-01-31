<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/07 10:17:11
?>
<?php echo form_tag('almdespser/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','compras/almordcom','ajax','tools','observe') ?>


<?php echo object_input_hidden_tag($cadphartser, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('cadphartser[dphart]', __($labels['cadphartser{dphart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadphartser{dphart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphartser{dphart}')): ?>
    <?php echo form_error('cadphartser{dphart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($cadphartser, 'getDphart', array (
  'size' => 15,
  'maxlength' => 8,
  'control_name' => 'cadphartser[dphart]',
  'onKeyPress'  => "javascript: enter(event,this.value);",
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8,'#',0);document.getElementById('cadphartser_dphart').value=valor;",
  'readonly'  =>  $cadphartser->getId()!='' ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<?php echo label_for('cadphartser[reqart]', __($labels['cadphartser{reqart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadphartser{reqart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphartser{reqart}')): ?>
    <?php echo form_error('cadphartser{reqart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('cadphartser[reqart]', $cadphartser->getReqart(),
    'almdespser/autocomplete?ajax=1',  array('autocomplete' => 'off','size' => 16 ,'maxlength' => 8,  'readonly'  =>  $cadphartser->getId()!='' ? true : false ,'onBlur'=> remote_function(array(
		    'update'   => 'divGrid',
		    'condition' => "$('id').value == ''",
            'url'      => 'almdespser/grid',
            'script'=> true,
		   'complete' => 'AjaxJSON(request, json)',
		   'with' => "'ajax=1&cajtexmos=cadphartser_desreqart&cajtexcom=cadphartser_reqart&codigo='+this.value"
			  ))),
	  array('use_style' => 'true')
  )
  ?>
  &nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Careqartser_Almdespser/clase/Careqartser/frame/sf_admin_edit_form/obj1/cadphartser_reqart/obj2/cadphartser_desreqart/campo1/reqart/campo2/desreq','','','botoncat')?>
  &nbsp;
  <?php $value = object_input_tag($cadphartser, 'getDesreqart', array (
  'control_name' => 'cadphartser[desreqart]',
  'size'=>80,
  'disabled' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
  <br>
  <?php echo label_for('cadphartser[fecdph]', __($labels['cadphartser{fecdph}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadphartser{fecdph}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphartser{fecdph}')): ?>
    <?php echo form_error('cadphartser{fecdph}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cadphartser, 'getFecdph', array (
  'size' => 11,
  'maxlength' => 10,
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cadphartser[fecdph]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
   'readonly'  =>  $cadphartser->getId()!='' ? true : false ,
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Introducir una Fecha valida') ?></div>


    </div>
<br>
  <?php echo label_for('cadphartser[desdph]', __($labels['cadphartser{desdph}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadphartser{desdph}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphartser{desdph}')): ?>
    <?php echo form_error('cadphartser{desdph}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphartser, 'getDesdph', array (
  'size' => 80,
  'control_name' => 'cadphartser[desdph]',
  'maxlength' => 255,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('cadphartser[codori]', __($labels['cadphartser{codori}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadphartser{codori}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadphartser{codori}')): ?>
    <?php echo form_error('cadphartser{codori}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadphartser, 'getCodori', array (
  'size' => 16,
  'maxlength' => 15,
  'control_name' => 'cadphartser[codori]',
  'readonly'  =>  $cadphartser->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
			  'url'      => 'almdespser/ajax',
			  'condition' => "$('id').value == ''",
			  'complete' => 'AjaxJSON(request, json)',
			  'script'=> true,
  			  'with' => "'ajax=3&cajtexmos=cadphartser_nomcat&cajtexcom=cadphartser_codori&codigo='+this.value",
			  )),
)); echo $value ? $value : '&nbsp;' ?>

  &nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubibie_Almdes/clase/Bnubibie/frame/sf_admin_edit_form/obj1/cadphartser_codori/obj2/cadphartser_nomcat/campo1/codubi/campo2/desubi','','','botoncat')?></th>
  &nbsp;
  <?php $value = object_input_tag($cadphartser, 'getNomcat', array (
  'size' => 80,
  'control_name' => 'cadphartser[nomcat]',
  'disabled' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<br>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row" id="divGrid">
<?php echo grid_tag($obj);?>
</div>

</fieldset>



<?php include_partial('edit_actions', array('cadphartser' => $cadphartser)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($cadphartser->getId()): ?>
<?php echo button_to(__('delete'), 'almdespser/delete?id='.$cadphartser->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script type="text/javascript">
  var id='<?php echo $cadphartser->getId()?>';
  if (id!="")
    {
      $('trigger_cadphartser_fecdph').hide();
      $$('.botoncat')[0].disabled=true;
  	  $$('.botoncat')[1].disabled=true;
    }

function enter(e,valor)
 {

   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}

     $('cadphartser_dphart').value=valor;
   }
 }

</script>


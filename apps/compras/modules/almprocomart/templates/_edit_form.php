<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/23 16:21:48
?>
<?php echo form_tag('almprocomart/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php echo javascript_include_tag('ajax', 'observe', 'dFilter') ?>
<?php echo object_input_hidden_tag($caprocomart, 'getId') ?>
<?php echo input_hidden_tag('yaexiste', '') ?>
<?php use_helper('Javascript', 'Grid') ?>
<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('caprocomart[fecprocom]', __($labels['caprocomart{fecprocom}']),  'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caprocomart{fecprocom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprocomart{fecprocom}')): ?>
    <?php echo form_error('caprocomart{fecprocom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($caprocomart, 'getFecprocom', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caprocomart[fecprocom]',
  'date_format' => 'dd/MM/yyyy',
  'readonly'  =>  $caprocomart->getId()!='' ? true : false ,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d'));echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('caprocomart[codcat]', __($labels['caprocomart{codcat}']),  'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caprocomart{codcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caprocomart{codcat}')): ?>
    <?php echo form_error('caprocomart{codcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caprocomart, 'getCodcat', array (
  'size' => 32,
  'control_name' => 'caprocomart[codcat]',
   'maxlength' => $loncategoria,
   'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaracategoria');",
   'readonly'  =>  $caprocomart->getId()!='' ? true : false,
   'onBlur'=> remote_function(array(
	   'url'      => 'almprocomart/ajax',
	   'complete' => 'AjaxJSON(request, json);verificaexiste()',
	   'condition' => "$('id').value == ''",
	   'script' => true,
	   'with' => "'ajax=1&cajtexmos=caprocomart_nomcat&fecha='+$('caprocomart_fecprocom').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;
<?php if (!$caprocomart->getId()) echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npcatpre_Almprocomart/clase/Npcatpre/frame/sf_admin_edit_form/obj1/caprocomart_codcat/obj2/caprocomart_nomcat/campo1/codcat/campo2/nomcat')?>
&nbsp;&nbsp;
<?php $value = object_input_tag($caprocomart, 'getNomcat', array (
 'size' => 60,
 'disabled' => true,
  'control_name' => 'caprocomart[nomcat]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<br>
<fieldset>
<legend><?php echo __('Ubicación Geográfica de cada Artículo a Programar') ?></legend>
  <div class="form-row">
   <table>
   <tr>
    <th><?php echo label_for('estado', __('Estado: '), 'class="required" ') ?>
  <div class="content">
  <?php echo select_tag('estado', options_for_select($estados,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divMunicipios',
    'url'      => 'almprocomart/combo?par=1',
    'with' => "'estado='+this.value"
  ))));?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>

 <th> <?php echo label_for('municipio', __('Municipio: '), 'class="required" ') ?>
  <div class="content">
 <div id="divMunicipios">
<?php echo select_tag('municipio', options_for_select($municipios,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divParroquias',
    'url'      => 'almprocomart/combo?par=2',
    'with' => "'estado='+$('estado').value+'&municipio='+this.value"
  ))));?></div>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th><?php echo label_for('parroquia', __('Parroquia: '), 'class="required" ') ?>
  <div class="content">

<div id="divParroquias">
<?php echo select_tag('parroquia', options_for_select($parroquias,'','include_custom=Seleccione Uno'));?></div>
    </div></th>

   </tr>
  </table>
  </div>
  </fieldset>
  <br>

<form name="form1" id="form1">
<?
echo grid_tag($obj);
?>
</form>

<?php include_partial('edit_actions', array('caprocomart' => $caprocomart)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($caprocomart->getId()): ?>
<?php echo button_to(__('delete'), 'almprocomart/delete?id='.$caprocomart->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="JavaScript" type="text/javascript" >
 actualiza();

 function actualiza(id)
  {
    var id="";
    var id='<?php echo $caprocomart->getId()?>';
    if (id!="")
    {
      $('trigger_caprocomart_fecprocom').hide();
    }
  }

 function verificaexiste()
  {
    if ($('yaexiste').value=="S")
    {
       alert("Ya existe una Programación de Artículos para esta Fecha y este Código de Unidad");
       $('caprocomart_codcat').value="";
       $('caprocomart_nomcat').value="";
       $('caprocomart_fecprocom').select();
       $('caprocomart_fecprocom').focus();
    }
  }

  function agregargrid(id)
  {
  	if  ($('parroquia').value!="")
	{
	     //VARIABLES A PASAR AL GRID
	     var index=$('estado').selectedIndex;
	     var text=$('estado').options[index].text;
	     var cod = $('estado').value;

	     var index2=$('municipio').selectedIndex;
	     var text2=$('municipio').options[index2].text;
	     var cod2 = $('municipio').value;

	     var index3=$('parroquia').selectedIndex;
	     var text3=$('parroquia').options[index3].text;
	     var cod3 = $('parroquia').value;


           var aux = id.split("_");
           var name=aux[0];
           var cuentafil=aux[1];
           var col=parseInt(aux[2]);

           var ida="ax"+"_"+cuentafil+"_1";
	       if ($(ida).value!="")
	       {
	         var caj1="ax"+"_"+cuentafil+"_7";
	         var caj2="ax"+"_"+cuentafil+"_8";
	         var caj3="ax"+"_"+cuentafil+"_9";
	         var caj4="ax"+"_"+cuentafil+"_10";
	         var caj5="ax"+"_"+cuentafil+"_11";
	         var caj6="ax"+"_"+cuentafil+"_12";
	         $(caj1).value=cod;
	         $(caj2).value=text;
	         $(caj3).value=cod2;
	         $(caj4).value=text2;
	         $(caj5).value=cod3;
	         $(caj6).value=text3;
	       }
	       return true;
	}else
	 {
	 	alert ('Debe seleccionar una parroquia...');
	 	return false;
	 }
  }
 </script>

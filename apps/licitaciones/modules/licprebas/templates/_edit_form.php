

<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 39767 2010-07-29 13:59:00Z dmartinez $
 */
// date: 2007/03/16 17:37:55
?>
<?php echo form_tag('licprebas/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>
<?php echo object_input_hidden_tag($liprebas, 'getId') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'licitaciones/licprebas', 'tools') ?>

<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <?php echo $liprebas->getEtiqueta() ;?></font></strong></th>
  </tr>
</table>
<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <table>
   <tr>
    <th><?php echo label_for('liprebas[reqart]', __($labels['liprebas{reqart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('liprebas{reqart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liprebas{reqart}')): ?>
    <?php echo form_error('liprebas{reqart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($liprebas, 'getReqart', array (
  'size' => 8,
  'maxlength' => 8,
  'readonly'  =>  $liprebas->getId()!='' ? true : false ,
  'control_name' => 'liprebas[reqart]',
  'onKeyPress' => "javascript:if (event.keyCode==13 || event.keyCode==9){document.getElementById('liprebas_fecreq').focus();}",
  'onBlur'  => "javascript:event.keyCode=13; enters(event,this.value);",
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th> <?php echo label_for('liprebas[fecreq]', __($labels['liprebas{fecreq}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('liprebas{fecreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liprebas{fecreq}')): ?>
    <?php echo form_error('liprebas{fecreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($liprebas, 'getFecreq', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'size' => '10',
  'control_name' => 'liprebas[fecreq]',
  'date_format' => 'dd/MM/yy',
  'readonly'  =>  $liprebas->getId()!='' ? true : false ,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'licprebas/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('liprebas_fecreq').value != '' && $('id').value == ''",
        'with' => "'ajax=7&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>

<?php echo input_hidden_tag('valfec', '') ?><?php echo input_hidden_tag('valfec2', '') ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th> <?php echo label_for('liprebas[tipmon]', __($labels['liprebas{tipmon}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('liprebas{tipmon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liprebas{tipmon}')): ?>
    <?php echo form_error('liprebas{tipmon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php if ($liprebas->getTipmon()=='') $var='001'; else $var=$liprebas->getTipmon();?>
  <?php echo select_tag('liprebas[tipmon]', objects_for_select(TsdesmonPeer::doSelect(new Criteria()),'getCodmon','getNommon',$var,'include_custom=Seleccione')) ?>
    </div></th>
   </tr>
  </table>

<br>

  <?php echo label_for('liprebas[desreq]', __($labels['liprebas{desreq}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('liprebas{desreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liprebas{desreq}')): ?>
    <?php echo form_error('liprebas{desreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($liprebas, 'getDesreq', array (
  'size' => '80x2',
  'maxlength' => 1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'liprebas[desreq]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
  <table>
   <tr>
    <th><?php echo label_for('liprebas[monreq]', __($labels['liprebas{monreq}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('liprebas{monreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liprebas{monreq}')): ?>
    <?php echo form_error('liprebas{monreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($liprebas, 'getMonreq', array (
  'size' => 15,
  'readonly' => true,
  'control_name' => 'liprebas[monreq]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th> <?php echo label_for('liprebas[unires]', __($labels['liprebas{unires}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('liprebas{unires}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liprebas{unires}')): ?>
    <?php echo form_error('liprebas{unires}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($liprebas, 'getUnires', array (
  'size' => $loncat,
  'maxlength' => $loncat,
  'control_name' => 'liprebas[unires]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracategoria')",
  'onBlur'=> remote_function(array(
        'url'      => 'licprebas/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&cajtexmos=liprebas_nomcat&cajtexcom=liprebas_unires&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
</div></th>
<th>&nbsp;</th>
<th>
<?php if ($catbnubica!='S') {?>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npcatpre_licprebas/clase/Npcatpre/frame/sf_admin_edit_form/obj1/liprebas_unires/obj2/liprebas_nomcat/campo1/codcat/campo2/nomcat/param1/'.$loncat.'/param2/licprebas')?>
<?php } else  {?>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubica_Pagemiord/clase/Bnubica/frame/sf_admin_edit_form/obj1/liprebas_unires/obj2/liprebas_nomcat/campo1/codubi/campo2/desubi/param1/'.$loncat)?>
<?php } ?>

    </th>
    <th>&nbsp;&nbsp;&nbsp;</th>
    <th>  <?php $value = object_input_tag($liprebas, 'getNomcat', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'liprebas[nomcat]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>

<br>

  <table>
   <tr>
   <th>
   <?php echo label_for('liprebas[tipreq]', __($labels['liprebas{tipreq}']), 'class="required" style="width:50px"') ?>
    <?php if ($liprebas->getTipreq()=='') $vartipreq='C'; else $vartipreq=$liprebas->getTipreq();?>
   <?php echo select_tag('liprebas[tipreq]', options_for_select($listatipo,$vartipreq, 'include_custom=Seleccione Uno')); ?></th>
   <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
   <th> <?php echo label_for('liprebas[tipfin]', __($labels['liprebas{tipfin}']), 'class="required" style="width:100px') ?>
  <div class="content<?php if ($sf_request->hasError('liprebas{tipfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liprebas{tipfin}')): ?>
    <?php echo form_error('liprebas{tipfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('liprebas[tipfin]', $liprebas->getTipfin(),
    'licprebas/autocomplete?ajax=2',  array('autocomplete' => 'off','size' => 4, 'maxlength' => 4, 'onBlur'=> remote_function(array(
        'url'      => 'licprebas/ajax',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=2&cajtexmos=liprebas_nomext&cajtexcom=liprebas_tipfin&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
?></div></th>
<th>
&nbsp;</th>
<th>
<?php echo  button_to_popup_('...','/metodo/Fortipfin_licprebas/clase/Fortipfin/frame/sf_admin_edit_form/obj1/liprebas_tipfin/obj2/liprebas_nomext/campo1/codfin/campo2/nomext')?>
    </th>
   <th>&nbsp;&nbsp;&nbsp;</th>
   <th>  <?php $value = object_input_tag($liprebas, 'getNomext', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'liprebas[nomext]',
)); echo $value ? $value : '&nbsp;' ?></th>

      <th>&nbsp;&nbsp;&nbsp;</th>
   <th>
     <?php if ($liprebas->getId()!='') { ?>
  <input type="button" name="Submit" class="sf_admin_action_list" value="      Forma Pre-Impresa" onclick="javascript:Mostrar_orden_preimpresa();" />
<? } ?>
   </th>
   </tr>
  </table>

<br>

<table>
    <tr>
   <th> <?php echo label_for('liprebas[codcen]', __($labels['liprebas{codcen}']), 'class="required" style="width:100px') ?>
  <div class="content<?php if ($sf_request->hasError('liprebas{codcen}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liprebas{codcen}')): ?>
    <?php echo form_error('liprebas{codcen}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($liprebas, 'getCodcen', array (
  'size' => 10,
  'maxlength' => 4,
  'control_name' => 'liprebas[codcen]',
  'onBlur'=> remote_function(array(
        'url'      => 'licprebas/ajax',
        'complete' => 'AjaxJSON(request, json)',
         'condition' => "$('liprebas_codcen').value != ''",
         'script' => true,
        'with' => "'ajax=10&cajtexmos=liprebas_descen&cajtexcom=liprebas_codcen&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  </div></th>
<th>
&nbsp;</th>
<th>
<?php echo  button_to_popup_('...','/metodo/Cadefcen_licprebas/clase/Cadefcen/frame/sf_admin_edit_form/obj1/liprebas_codcen/obj2/liprebas_descen/campo1/codcen/campo2/descen')?>
    </th>
   <th>&nbsp;&nbsp;&nbsp;</th>
   <th>  <?php $value = object_input_tag($liprebas, 'getDescen', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'liprebas[descen]',
)); echo $value ? $value : '&nbsp;' ?></th>
    </tr>

</table>

</div>
</fieldset>

<br>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Detalle Solicitud');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<div id="recargos" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?
 echo input_hidden_tag('totartsinrec', '0');
 echo input_hidden_tag('actualfila', '0');
?>

<div align="center">

</div>



</div>
</fieldset>
</div>

<!--
<ul class="sf_admin_actions">
<li class="float-rigth">
<input type="button" name="Submit" value="Recargos" onClick="javascript:$('recargos').toggle();"/>
</li>
</ul>Boton para aplicar recargos(llama al div recargos) -->

<div align="left" id="botonesmarcar">
<table>
<tr>
<th>
<input type="button" name="Submit" value="Marcar" onClick="marcarTodo();"/>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<input type="button" name="Submit" value="Desmarcar" onClick="desmarcarTodo();"/>
</th>
</tr>
</table>
</div>

<?
echo grid_tag($obj);
?>
<?php echo input_hidden_tag('totmarcadas', '0,00') ?>

</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Motivo');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <div align ="left" class="content<?php if ($sf_request->hasError('liprebas{motreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liprebas{motreq}')): ?>
    <?php echo form_error('liprebas{motreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($liprebas, 'getMotreq', array (
  'size' => '80x5',
  'maxlength' => 1000,
  'control_name' => 'liprebas[motreq]',
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage3", 'Beneficio');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <div align ="left" class="content<?php if ($sf_request->hasError('liprebas{benreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liprebas{benreq}')): ?>
    <?php echo form_error('liprebas{benreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($liprebas, 'getBenreq', array (
  'size' => '80x5',
  'maxlength' => 1000,
  'control_name' => 'liprebas[benreq]',
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
   </div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage4", 'Observaciones');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <div align ="left" class="content<?php if ($sf_request->hasError('liprebas{obsreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liprebas{obsreq}')): ?>
    <?php echo form_error('liprebas{obsreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($liprebas, 'getObsreq', array (
  'size' => '80x5',
  'maxlength' => 1000,
  'control_name' => 'liprebas[obsreq]',
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<?php tabPageOpenClose("tp1", "tabPage6", 'Razon de Compra');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?
echo grid_tag($obj3);
?>
</div>
</fieldset>

<?php tabInit("tp1", "0");?>

<?php include_partial('edit_actions', array('liprebas' => $liprebas)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-right">
      
      <?php if ($liprebas->getId()  && $liprebas->getStareq()!='N'): ?>
<?php echo button_to(__('delete'), 'licprebas/delete?id='.$liprebas->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
  'onclick' => 'elimin()',
)) ?><?php endif; ?>
</li>
<li>
<div id="anul" style="display:none">
<input type="button" name="Submit" value="Anular" class="sf_admin_action_delete" onclick="javascript:anular();" />
</div>
</li
  </ul>

<script language="JavaScript" type="text/javascript">
  var ids='<?php echo $liprebas->getId()?>';
  
  var correla='<?php echo $mansolocor; ?>';
  if (correla=='S' && ids=='')
  {
  	$('liprebas_reqart').value='########';
  	$('liprebas_reqart').readOnly=true;
  }


  $('liprebas_reqart').focus();

  var estatus='<?php echo $liprebas->getStareq()?>';
  if (ids!="" && estatus!='N')
  {
    $('anul').show();
  }


    function enters(e,valor)
  {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else{valor=valor.pad(8, '#',0);}

     $('liprebas_reqart').value=valor;
    
   }
  }

  function anular()
  {
    var reqart=$('liprebas_reqart').value;
    var fecreq=$('liprebas_fecreq').value;
    window.open('/licitaciones_dev.php/licprebas/anular?reqart='+reqart+'&fecreq='+fecreq,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=400,resizable=yes,left=400,top=120');
  }
  function validargrid(id)
 {
    var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes=col+1;
    var descripcion=name+"_"+fila+"_"+coldes;

	if (razon_repetido(id))
	{
		alert('La Razon de Compra se encuentra repetido');
		$(id).value="";
		$(descripcion).value="";
	}

 }

 function razon_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var razon=$(id).value;

   var razonrepetido=false;
   var am=totalregistros('cx',1,10);
   var i=0;
   while (i<am)
   {
    var codigo="cx"+"_"+i+"_1";

    var razon2=$(codigo).value;

    if (i!=fila)
    {
      if (razon==razon2)
      {
        razonrepetido=true;
        break;
      }
    }
   i++;
   }
   return razonrepetido;
 }
 

 function totalregistros(letra,posicion,filas)
  {
    var fil=0;
    var total=0;
    while (fil<filas)
    {
      var chk=letra+"_"+fil+"_"+posicion;
      if ($(chk).value!="")
      { total=total + 1; }
     fil++;
    }
    return total;
  }

  function ajax(e,id)
 {
   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var descripcion=name+"_"+fil+"_"+coldes;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {

    new Ajax.Request('/licitaciones_dev.php/licprebas/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), validargrid(id); }, parameters:'ajax=5&cajtexmos='+descripcion+'&cajtexcom='+id+'&codigo='+cod})
 }
 }

 function perderfocus(e,id,totcol)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   if (col!=totcol)
   {
    var colsig=col+1;
    var siguiente=name+"_"+fil+"_"+colsig;
   }
   else
   {
    var fila=fil+1;
   	var siguiente=name+"_"+fila+"_2";
   }

   if (e.keyCode==13 || e.keyCode==9)
   {
     if($(siguiente))
     {
      if (!$(siguiente).readOnly) $(siguiente).focus();
     }
   }
  }

  function validafec()
  {
    if ($('valfec2').value=='S')
  	{
  	  alert('La Fecha no se encuentra del Período Fiscal');
  	  $('liprebas_fecreq').value="";
  	  $('liprebas_fecreq').focus();
  	}
  	else if ($('valfec').value=='S')
  	{
  	  alert('La Fecha se encuentra dentro un Período Cerrado');
  	  $('liprebas_fecreq').value="";
  	  $('liprebas_fecreq').focus();
  	}
  }

  function Mostrar_orden_preimpresa()
  {
            var codreqdes=$('liprebas_reqart').value;
            var codreqhas=$('liprebas_reqart').value;

          var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
          pagina=ruta+"/reportes/reportes/licitaciones/r.php=?r=carsolegrpre.php&codreqdes="+codreqdes+"&codreqhas="+codreqhas;
          window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")

  }

</script>

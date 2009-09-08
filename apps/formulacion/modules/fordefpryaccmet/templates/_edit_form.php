<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/19 12:42:22
?>
<?php echo form_tag('fordefpryaccmet/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fordefpryaccmet, 'getId') ?>
<?php echo input_hidden_tag('duplicada', '') ?>
<?php echo javascript_include_tag('dFilter_string', 'ajax', 'tools') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Proyecto ó Acción Centralizada') ?></legend>
<div class="form-row">
  <table>
   <tr>
    <th>
  <?php echo label_for('fordefpryaccmet[codpro]', __($labels['fordefpryaccmet{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpryaccmet{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpryaccmet{codpro}')): ?>
    <?php echo form_error('fordefpryaccmet{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefpryaccmet, 'getCodpro', array (
  'size' => $lonpry,
  'maxlength' => $lonpry,
  'readonly'  =>  $fordefpryaccmet->getId()!='' ? true : false ,
  'control_name' => 'fordefpryaccmet[codpro]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaraproyecto')",
  'onBlur'=> remote_function(array(
			  'url'      => 'fordefpryaccmet/ajax',
			  'complete' => 'AjaxJSON(request, json), verificar1();',
			  'condition' => "$('fordefpryaccmet_codpro').value != ''",
			  'script' => true,
  			  'with' => "'ajax=1&cajtexmos=fordefpryaccmet_tippro&codigo='+this.value"
			  ))
)); echo $value ? $value : '&nbsp;' ?><?php echo input_hidden_tag('existe1', '') ?>
    </div></th>

    <th>
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fordefpry_Fordefpryaccmet/clase/Fordefpry/frame/sf_admin_edit_form/obj1/fordefpryaccmet_codpro/obj2/fordefpryaccmet_nompro/campo1/codpro/campo2/nompro')?>
</th>

    <th><?php $value = object_input_tag($fordefpryaccmet, 'getTippro', array (
  'disabled' => true,
  'control_name' => 'fordefpryaccmet[tippro]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>

<br>

  <?php echo label_for('fordefpryaccmet[nompro]', __($labels['fordefpryaccmet{nompro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpryaccmet{nompro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpryaccmet{nompro}')): ?>
    <?php echo form_error('fordefpryaccmet{nompro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpryaccmet, 'getNompro', array (
  'size' => '80x3',
  'disabled' => true,
  'control_name' => 'fordefpryaccmet[nompro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>


<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Acción Específica')?></legend>
<div class="form-row">
  <table>
   <tr>
    <th><?php echo label_for('fordefpryaccmet[codaccesp]', __($labels['fordefpryaccmet{codaccesp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpryaccmet{codaccesp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpryaccmet{codaccesp}')): ?>
    <?php echo form_error('fordefpryaccmet{codaccesp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefpryaccmet, 'getCodaccesp', array (
  'size' => $lonacc,
  'maxlength' => $lonacc,
  'control_name' => 'fordefpryaccmet[codaccesp]',
  'readonly'  =>  $fordefpryaccmet->getId()!='' ? true : false ,
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaraaccion')",
  'onBlur'=> remote_function(array(
			  'url'      => 'fordefpryaccmet/ajax',
			  'complete' => 'AjaxJSON(request, json), verificar1();',
			  'condition' => "$('fordefpryaccmet_codaccesp').value != ''",
			  'script' => true,
  			  'with' => "'ajax=2&cajtexmos=fordefpryaccmet_desaccesp&proyec='+$('fordefpryaccmet_codpro').value+'&codigo='+this.value"
			  ))
)); echo $value ? $value : '&nbsp;' ?><?php echo input_hidden_tag('existe2', '') ?>
    </div></th>

    <th>
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Fordefaccesp_Fordefpryaccmet/clase/Fordefaccesp/frame/sf_admin_edit_form/obj1/fordefpryaccmet_codaccesp/obj2/fordefpryaccmet_desaccesp/campo1/codaccesp/campo2/desaccesp/param1/'+$('fordefpryaccmet_codpro').value+'")?>
    </th>
   </tr>
  </table>

<br>

 <?php echo label_for('fordefpryaccmet[desaccesp]', __($labels['fordefpryaccmet{desaccesp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefpryaccmet{desaccesp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefpryaccmet{desaccesp}')): ?>
    <?php echo form_error('fordefpryaccmet{desaccesp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefpryaccmet, 'getDesaccesp', array (
  'size' => '80x3',
  'disabled' => true,
  'control_name' => 'fordefpryaccmet[desaccesp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

</div>
</fieldset>

<br>

<div id="divGrid">
<div id="periodos" style="display:none">
<?
echo grid_tag($obj2);
?>

<br>
<?php echo input_hidden_tag('fila', '') ?>
<table>
 <tr>
 <th>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo label_for('',__('Total') , 'class="required"') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo input_tag('total','0,00', 'size=15 class=grid_txtright readonly=true') ?>
</th>
 </tr>
</table>

<div align="center">
<?php echo link_to_function(image_tag('/images/salir.gif'), "salvarcantidades()") ?>
</div>
</div>
</div>

<br>

<form name="form1" id="form1">
<?
echo grid_tag($obj);
?>
</form>



<?php include_partial('edit_actions', array('fordefpryaccmet' => $fordefpryaccmet)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($fordefpryaccmet->getId()): ?>
<?php echo button_to(__('delete'), 'fordefpryaccmet/delete?id='.$fordefpryaccmet->getId().'&codpro='.$fordefpryaccmet->getCodpro().'&accion='.$fordefpryaccmet->getCodaccesp(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
<script language="JavaScript" type="text/javascript">
function mostrar(id)
{
  //if (e.keyCode==13)
  //{
  	var aux  = id.split("_");
    var name = aux[0];
    var fil  = parseInt(aux[1]);
    var col  = parseInt(aux[2]);

    var colmeta=col-5;

    var codmeta=name+"_"+fil+"_"+colmeta;

    var proyecto=$('fordefpryaccmet_codpro').value;
    var accion=$('fordefpryaccmet_codaccesp').value;
    var meta=$(codmeta).value;

    new Ajax.Updater('divGrid', getUrlModulo()+'ajax',
                    {asynchronous:true,
                     evalScripts:true,
                     onComplete:function(request, json){
                     	      AjaxJSON(request, json);},
                     parameters:'ajax=4&proyecto='+proyecto+'&accion='+accion+'&meta='+meta+'&fil='+fil
                     })
  //}
}

function distribuirPeriodos()
{
//  if ($('id').value=="")  //Nuevo
//  {
  if ($('total').value=='0,00')  //Nuevo
  {

	  var fil=0;
	  while (fil<12)
	  {
	    var periodo="bx"+"_"+fil+"_1";
	    if (fil<9){
	    $(periodo).value= '0'+(fil +1);}
	    else{ $(periodo).value= (fil +1);}
	    fil++;
	  }
  }

  var j       = $('fila').value;
  var haydist = "ax"+"_"+j+"_5";

  if ($(haydist).value!="")
  {
    var distrib=$(haydist).value;
  	var aux2=distrib.split("!");

  	var z=0;
    while (z<((aux2.length)-1))
    {
      var reg=aux2[z];
      var aux3=reg.split("-");
      var periodo=aux3[0] -1;
      var periodos=aux3[0];
      var monto=aux3[1];

      var per="bx"+"_"+periodo+"_1";
      var mont="bx"+"_"+periodo+"_2";

      $(per).value=periodos;
      $(mont).value=monto;

     z++;
    }
  }
  actualizarsaldos_b();


}

function salvarcantidades()
{
  var fil=0;
  var cadena='';
  while (fil<12)
  {
    var periodo="bx"+"_"+fil+"_1";
    var cant="bx"+"_"+fil+"_2";
    var canteje="bx"+"_"+fil+"_3";

    str1= $(cant).value.toString();
    str1= str1.replace('.','') ;
    str1= str1.replace('.','') ;
    str1= str1.replace('.','') ;
    str1= str1.replace('.','') ;
    str1= str1.replace('.','') ;
    str1= str1.replace('.','') ;
    str1= str1.replace(',','.');
    var cantidad=parseFloat(str1);

    var cadena=cadena + $(periodo).value+'-'+$(cant).value+'-'+$(canteje).value+'!';

    fil++;
  }

  var filas=$('fila').value;
  var cantdist="ax"+"_"+filas+"_5";
  var cantot="ax"+"_"+filas+"_4";


  $(cantdist).value=cadena;
  $(cantot).value=$('total').value;
  $('periodos').hide();
}

 function validargrid(id)
 {
 	valor=$(id).value;
 	if (valor!='')
 	{
 		valor=valor.pad(5,"0",0);
 		$(id).value=valor;
	}

 	if (meta_repetido(id))
	{
		alert('La Meta se encuentra repetida');
		$(id).value="";
	}
 }

 function meta_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var meta=$(id).value;

   var metarepetido=false;
   var am=totalregistros('ax',1,20);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var meta2=$(codigo).value;

    if (i!=fila)
    {
      if (meta==meta2)
      {
        metarepetido=true;
        break;
      }
    }
   i++;
   }
   return metarepetido;
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
  function verificar1()
  { if ($('fordefpryaccmet_codpro').value!=""){
  	if ($('existe1').value=='S')
  	{
  		alert('El Proyecto no existe');
  		$('fordefpryaccmet_codpro').value="";
  		$('fordefpryaccmet_tippro').value="";
  		$('fordefpryaccmet_nompro').value="";
  	}}

  	if ($('fordefpryaccmet_codaccesp').value!=""){
  	if ($('existe2').value=='S')
  	{
  		alert('La Accion Especifica no esta asociada al Proyecto');
  		$('fordefpryaccmet_codaccesp').value="";
  	}
  	  if($('duplicada').value=='S')
  	  {
  	  	alert('El Proyecto Y la Accion Especifica ya tienen Metas asociadas');
  	  	$('fordefpryaccmet_codpro').value="";
  		$('fordefpryaccmet_tippro').value="";
  		$('fordefpryaccmet_nompro').value="";
  		$('fordefpryaccmet_codaccesp').value="";
  		$('fordefpryaccmet_desaccesp').value="";
  	  }
  	}
  }
</script>


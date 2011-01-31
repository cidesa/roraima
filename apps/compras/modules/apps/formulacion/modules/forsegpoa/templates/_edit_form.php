<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/25 11:56:21
?>
<?php echo form_tag('forsegpoa/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fordismetperpryaccmet, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Proyecto ó Acción Centralizada') ?></legend>
<div class="form-row">
  <table>
   <tr>
    <th><?php echo label_for('fordismetperpryaccmet[codpro]', __($labels['fordismetperpryaccmet{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordismetperpryaccmet{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordismetperpryaccmet{codpro}')): ?>
    <?php echo form_error('fordismetperpryaccmet{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordismetperpryaccmet, 'getCodpro', array (
  'size' => 10,
  'readonly' => true,
  'control_name' => 'fordismetperpryaccmet[codpro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;</th>
    <th>  <?php $value = object_input_tag($fordismetperpryaccmet, 'getProacc', array (
  'disabled' => true,
  'control_name' => 'fordismetperpryaccmet[proacc]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>

<br>

  <?php echo label_for('fordismetperpryaccmet[nompro]', __($labels['fordismetperpryaccmet{nompro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordismetperpryaccmet{nompro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordismetperpryaccmet{nompro}')): ?>
    <?php echo form_error('fordismetperpryaccmet{nompro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordismetperpryaccmet, 'getNompro', array (
  'disabled' => true,
  'size' => '70x2',
  'control_name' => 'fordismetperpryaccmet[nompro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Acción Específica')?></legend>
<div class="form-row">
 <?php echo label_for('fordismetperpryaccmet[codaccesp]', __($labels['fordismetperpryaccmet{codaccesp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordismetperpryaccmet{codaccesp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordismetperpryaccmet{codaccesp}')): ?>
    <?php echo form_error('fordismetperpryaccmet{codaccesp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordismetperpryaccmet, 'getCodaccesp', array (
  'size' => 10,
  'readonly' => true,
  'control_name' => 'fordismetperpryaccmet[codaccesp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>

 <?php echo label_for('fordismetperpryaccmet[desaccesp]', __($labels['fordismetperpryaccmet{desaccesp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordismetperpryaccmet{desaccesp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordismetperpryaccmet{desaccesp}')): ?>
    <?php echo form_error('fordismetperpryaccmet{desaccesp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordismetperpryaccmet, 'getDesaccesp', array (
  'disabled' => true,
  'size' => '70x2',
  'control_name' => 'fordismetperpryaccmet[desaccesp]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

  <table>
   <tr>
    <th> <?php echo label_for('fordismetperpryaccmet[codmet]', __($labels['fordismetperpryaccmet{codmet}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordismetperpryaccmet{codmet}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordismetperpryaccmet{codmet}')): ?>
    <?php echo form_error('fordismetperpryaccmet{codmet}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordismetperpryaccmet, 'getCodmet', array (
  'size' => 10,
  'readonly' => true,
  'control_name' => 'fordismetperpryaccmet[codmet]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;</th>
    <th><?php $value = object_input_tag($fordismetperpryaccmet, 'getDesmet', array (
  'disabled' => true,
  'size' => 50,
  'control_name' => 'fordismetperpryaccmet[desmet]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>

<br>

  <table>
   <tr>
    <th><?php echo label_for('fordismetperpryaccmet[canmet2]', __($labels['fordismetperpryaccmet{canmet2}']), 'class="required" style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordismetperpryaccmet{canmet2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordismetperpryaccmet{canmet2}')): ?>
    <?php echo form_error('fordismetperpryaccmet{canmet2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordismetperpryaccmet, 'getCanmet2', array (
  'disabled' => true,
  'control_name' => 'fordismetperpryaccmet[canmet2]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;</th>
    <th><?php echo label_for('fordismetperpryaccmet[cananual]', __($labels['fordismetperpryaccmet{cananual}']), 'class="required" style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordismetperpryaccmet{cananual}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordismetperpryaccmet{cananual}')): ?>
    <?php echo form_error('fordismetperpryaccmet{cananual}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordismetperpryaccmet, 'getCananual', array (
  'disabled' => true,
  'control_name' => 'fordismetperpryaccmet[cananual]',
)); echo $value ? $value : '&nbsp;' ?>
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

<script type="text/javascript">
function calculoAutomatico()
{

   var name="ax";

   var fil=0;
   while (fil<12)
   {

      chk=name+"_"+fil+"_1";
      if (document.getElementById(chk).value=="")
      {
      	break;
      }

		     if (fil==0)
		     {
		       progid=name+"_0_2";
		       prog=document.getElementById(progid).value.toString();
		       prog= prog.replace('.','') ;
			   prog= prog.replace('.','') ;
			   prog= prog.replace('.','') ;
			   prog= prog.replace('.','') ;
			   prog= prog.replace('.','') ;
			   prog= prog.replace('.','') ;
			   prog= prog.replace('.','') ;
			   var num1=parseFloat(prog);   //Programado del Mes

			   ejecutid=name+"_0_4";
			   ejecut= document.getElementById(ejecutid).value.toString();
			   ejecut= ejecut.replace('.','') ;
			   ejecut= ejecut.replace('.','') ;
			   ejecut= ejecut.replace('.','') ;
			   ejecut= ejecut.replace('.','') ;
			   ejecut= ejecut.replace('.','') ;
			   ejecut= ejecut.replace('.','') ;
			   ejecut= ejecut.replace('.','') ;
			   var num2=parseFloat(ejecut);   //Ejecutado

			   calculo1=num1-num2;      //Programado del Mes - Ejecutado

			   variacion=name+"_0_5";   //Variación
			   document.getElementById(variacion).value=format(calculo1.toFixed(2),'.',',','.');

			   progmesid=name+"_1_2";
			   progmes=document.getElementById(progmesid).value.toString();
		       progmes= progmes.replace('.','') ;
			   progmes= progmes.replace('.','') ;
			   progmes= progmes.replace('.','') ;
			   progmes= progmes.replace('.','') ;
			   progmes= progmes.replace('.','') ;
			   progmes= progmes.replace('.','') ;
			   progmes= progmes.replace('.','') ;
			   var num3=parseFloat(progmes);   //Programado del Mes

			   calculo2= calculo1+num3;       //Programado del Mes - Ejecutado + Programado del Mes (Linea de Abajo)

			   progacum=name+"_1_3";          //Programado Acumulado =  calculo2
			   document.getElementById(progacum).value=format(calculo2.toFixed(2),'.',',','.');

			   //entermonto(e,id);
		     }
			 else
			 {
			   progid=name+"_"+fil+"_3";
		       prog=document.getElementById(progid).value.toString();
		       prog= prog.replace('.','') ;
			   prog= prog.replace('.','') ;
			   prog= prog.replace('.','') ;
			   prog= prog.replace('.','') ;
			   prog= prog.replace('.','') ;
			   prog= prog.replace('.','') ;
			   prog= prog.replace('.','') ;
			   var num1=parseFloat(prog);        //Programado Acumulado

			   ejecutid=name+"_"+fil+"_4";
			   ejecut= document.getElementById(ejecutid).value.toString();
			   ejecut= ejecut.replace('.','') ;
			   ejecut= ejecut.replace('.','') ;
			   ejecut= ejecut.replace('.','') ;
			   ejecut= ejecut.replace('.','') ;
			   ejecut= ejecut.replace('.','') ;
			   ejecut= ejecut.replace('.','') ;
			   ejecut= ejecut.replace('.','') ;
			   var num2=parseFloat(ejecut);      //Ejecutado

			   calculo1=num1-num2;              //Programado Acumulado - Ejecutado

			   variacion=name+"_"+fil+"_5";     //Variación =  calculo1
			   document.getElementById(variacion).value=format(calculo1.toFixed(2),'.',',','.');

			   fil2=fil+1;

			   progmesid=name+"_"+fil2+"_2";
			   progmes=document.getElementById(progmesid).value.toString();
		       progmes= progmes.replace('.','') ;
			   progmes= progmes.replace('.','') ;
			   progmes= progmes.replace('.','') ;
			   progmes= progmes.replace('.','') ;
			   progmes= progmes.replace('.','') ;
			   progmes= progmes.replace('.','') ;
			   progmes= progmes.replace('.','') ;
			   var num3=parseFloat(progmes);      //Programado del Mes

			   calculo2= calculo1+num3;          //Programado Acumulado - Ejecutado + Programado del Mes
			   progacum=name+"_"+fil2+"_3";      //Ejecutado
			   document.getElementById(progacum).value=format(calculo2.toFixed(2),'.',',','.');

			 } // fin if
	 actualizarsaldos();
	fil=fil+1;
   }// fin while

}
</script>

<?
if ($fordismetperpryaccmet->getId()!='') //ES UN CONSULTA
		{
			echo javascript_tag("
                    javascript:calculoAutomatico();
				");
		}
?>
</div>
</fieldset>

<script type="text/javascript">
function calculos(e,id)
{
   if (e.keyCode==13)
   {
     var aux = id.split("_");
	 var name=aux[0];
	 var fil=parseInt(aux[1]);
	 var col=parseInt(aux[2]);

     if (fil==0)
     {
       progid=name+"_0_2";
       prog=document.getElementById(progid).value.toString();
       prog= prog.replace('.','') ;
	   prog= prog.replace('.','') ;
	   prog= prog.replace('.','') ;
	   prog= prog.replace('.','') ;
	   prog= prog.replace('.','') ;
	   prog= prog.replace('.','') ;
	   prog= prog.replace('.','') ;
	   var num1=parseFloat(prog);

	   ejecutid=name+"_0_4";
	   ejecut= document.getElementById(ejecutid).value.toString();
	   ejecut= ejecut.replace('.','') ;
	   ejecut= ejecut.replace('.','') ;
	   ejecut= ejecut.replace('.','') ;
	   ejecut= ejecut.replace('.','') ;
	   ejecut= ejecut.replace('.','') ;
	   ejecut= ejecut.replace('.','') ;
	   ejecut= ejecut.replace('.','') ;
	   var num2=parseFloat(ejecut);

	   calculo1=num1-num2;

	   variacion=name+"_0_5";
	   document.getElementById(variacion).value=format(calculo1.toFixed(2),'.',',','.');

	   progmesid=name+"_1_2";
	   progmes=document.getElementById(progmesid).value.toString();
       progmes= progmes.replace('.','') ;
	   progmes= progmes.replace('.','') ;
	   progmes= progmes.replace('.','') ;
	   progmes= progmes.replace('.','') ;
	   progmes= progmes.replace('.','') ;
	   progmes= progmes.replace('.','') ;
	   progmes= progmes.replace('.','') ;
	   var num3=parseFloat(progmes);

	   calculo2= calculo1+num3;
	   progacum=name+"_1_3";
	   document.getElementById(progacum).value=format(calculo2.toFixed(2),'.',',','.');

	   entermonto(e,id);
     }
	 else
	 {
	   progid=name+"_"+fil+"_3";
       prog=document.getElementById(progid).value.toString();
       prog= prog.replace('.','') ;
	   prog= prog.replace('.','') ;
	   prog= prog.replace('.','') ;
	   prog= prog.replace('.','') ;
	   prog= prog.replace('.','') ;
	   prog= prog.replace('.','') ;
	   prog= prog.replace('.','') ;
	   var num1=parseFloat(prog);

	   ejecutid=name+"_"+fil+"_4";
	   ejecut= document.getElementById(ejecutid).value.toString();
	   ejecut= ejecut.replace('.','') ;
	   ejecut= ejecut.replace('.','') ;
	   ejecut= ejecut.replace('.','') ;
	   ejecut= ejecut.replace('.','') ;
	   ejecut= ejecut.replace('.','') ;
	   ejecut= ejecut.replace('.','') ;
	   ejecut= ejecut.replace('.','') ;
	   var num2=parseFloat(ejecut);

	   calculo1=num1-num2;

	   variacion=name+"_"+fil+"_5";
	   document.getElementById(variacion).value=format(calculo1.toFixed(2),'.',',','.');

	   fil2=fil+1;

	   progmesid=name+"_"+fil2+"_2";
	   progmes=document.getElementById(progmesid).value.toString();
       progmes= progmes.replace('.','') ;
	   progmes= progmes.replace('.','') ;
	   progmes= progmes.replace('.','') ;
	   progmes= progmes.replace('.','') ;
	   progmes= progmes.replace('.','') ;
	   progmes= progmes.replace('.','') ;
	   progmes= progmes.replace('.','') ;
	   var num3=parseFloat(progmes);

	   calculo2= calculo1+num3;
	   progacum=name+"_"+fil2+"_3";
	   document.getElementById(progacum).value=format(calculo2.toFixed(2),'.',',','.');

	   entermonto(e,id);
	 }
   }
}
</script>

<?php include_partial('edit_actions', array('fordismetperpryaccmet' => $fordismetperpryaccmet)) ?>

</form>

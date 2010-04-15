<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/24 23:51:35
?>
<?php echo form_tag('vachistorico_lote/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npvacdisfrute, 'getId') ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>


<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
<?php echo label_for('npvacdisfrute[perini]', __($labels['npvacdisfrute{perini}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npvacdisfrute{perini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npvacdisfrute{perini}')): ?>
    <?php echo form_error('npvacdisfrute{perini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $perini = date('Y') - 1;
      $perfin = date('Y');
 if ($npvacdisfrute->getPerini()=='')
 {
 $var=$perini;
 $var2=$perfin;
 }
 else
 {
 $var=$npvacdisfrute->getPerini();
 $var2=$npvacdisfrute->getPerfin();
 }
 ?>

<?php echo select_tag('npvacdisfrute[perini]', options_for_select($arranos,$var),array(
    'onChange'=> remote_function(array(
    'update'   => 'grid',
    'url'      => 'vachistorico_lote/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'with' => "'ajax=1&perini='+this.value+'&cajaperfin=npvacdisfrute_perfin&nomina='+$(npvacdisfrute_codnom).value",
  ))));?>

&nbsp; &nbsp; &nbsp; &nbsp;
<strong>Periodo Hasta:</strong>
<?php $value = object_input_tag($npvacdisfrute, 'getPerfin', array (
'value' => $var2,
'size' => 7,
'control_name' => 'npvacdisfrute[perfin]',
'disabled' => true,
)); echo $value ? $value : '&nbsp;' ?>
&nbsp; &nbsp; &nbsp; &nbsp;
<strong>Nómina:</strong>
<?php echo select_tag('npvacdisfrute_codnom', options_for_select($arranom,$var),array(
    'onChange'=> remote_function(array(
    'update'   => 'grid',
    'url'      => 'vachistorico_lote/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'with' => "'ajax=1&perini='+$(npvacdisfrute_perini).value+'&cajaperfin=npvacdisfrute_perfin&nomina='+this.value",
  ))));?>
    </div>
</div>

<div id="grid" class="form-row">
<?
echo grid_tag($obj);
?>
</div>

</fieldset>

<?php include_partial('edit_actions', array('npvacdisfrute' => $npvacdisfrute)) ?>

</form>


     <script type="text/javascript">

function calcular_dias(id)
{
	var adisfrutar = $(id).value;
	var aux = id.split("_");

   	var name=aux[0];
   	var fila=aux[1];
   	var col=parseInt(aux[2]);

      var coldes=col+1;
      var disfrutados  = name+"_"+fila+"_"+coldes;

      var coldes=col+2;
      var pordisfrutar = name+"_"+fila+"_"+coldes;

	$(pordisfrutar).value = parseInt(adisfrutar) - parseInt($(disfrutados).value);


}

function calcular_dias2(id)
{
	var disfrutados = $(id).value;
	var aux = id.split("_");

   	var name=aux[0];
   	var fila=aux[1];
   	var col=parseInt(aux[2]);

      var coldes=col-1;
      var adisfrutar  = name+"_"+fila+"_"+coldes;

      var coldes=col+1;
      var pordisfrutar = name+"_"+fila+"_"+coldes;

	$(pordisfrutar).value = parseInt($(adisfrutar).value) - parseInt(disfrutados);


}


  </script>



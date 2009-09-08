<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/07 15:17:27
?>
<?php echo form_tag('nomdefespasicartipnomlot/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>
<?php echo object_input_hidden_tag($npasicarnom, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('npasicarnom[codnom]', __($labels['npasicarnom{codnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasicarnom{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicarnom{codnom}')): ?>
    <?php echo form_error('npasicarnom{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicarnom, 'getCodnom', array (
  'size' => 20,
  'control_name' => 'npasicarnom[codnom]',
  'maxlength' => 3,
  'readonly' => $npasicarnom->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
        'condition' =>  "$('id').value == '' && $('npasicarnom_codnom').value != ''",
        'update'   => 'mensaje',
        'url'      => 'nomdefespasicartipnomlot/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=1&cajtexmos=npasicarnom_nomnom&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>


<?php if (!$npasicarnom->getId()) echo   button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npnomina_Nomdefespasicartipnomlot/clase/Npnomina/frame/sf_admin_edit_form/obj1/npasicarnom_codnom/obj2/npasicarnom_nomnom/campo1/codnom/campo2/nomnom/param1/')?>


  <?php $value = object_input_tag($npasicarnom, 'getNomnom', array (
  'size' => 30,
  'disabled' => true,
  'control_name' => 'npasicarnom[nomnom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div id="mensaje">
</div>
<br>
<?
echo grid_tag($obj);
?>



</fieldset>

<?php include_partial('edit_actions', array('npasicarnom' => $npasicarnom)) ?>

</form>

<script>
function verificar_codigo_repetido(id)
  {
     f=0;
     i=id.split('_');
     i=i[1];
     contador_repetido=0;
     while (f<10)
      {
             var col_fila_codigo_car = "ax_"+f+"_1";
             var col_fila_codigo_car_com = "ax_"+i+"_1";
             if (col_fila_codigo_car_com!=col_fila_codigo_car)
             {
               if ($(col_fila_codigo_car_com).value==$(col_fila_codigo_car).value)
               {
                 contador_repetido++;
                 break;
               }
             }
           f++;
      }
      if (contador_repetido>0)
      {
      // alert(contador_repetido + ' Código de cargo repetido, Verifique sus datos');
       $(id).value='';
      }
       i=0;
       f=0;
}
</script>
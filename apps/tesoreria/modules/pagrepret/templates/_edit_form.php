<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/06 11:05:52
?>
<?php echo form_tag('pagrepret/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Grid') ?>
<?php echo object_input_hidden_tag($tsrepret, 'getId') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'observe', 'tools') ?>
<?php echo input_hidden_tag('exisret', '') ?>
<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('tsrepret[codrep]', __($labels['tsrepret{codrep}']), 'class="required" Style="width:150px"') ?>
<div
	class="content<?php if ($sf_request->hasError('tsrepret{codrep}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('tsrepret{codrep}')): ?> <?php echo form_error('tsrepret{codrep}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>


<?php echo select_tag('tsrepret[codrep]', options_for_select($tiposreportes,$tsrepret->getCodrep(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
'update'   => 'divGrid',
'url'      => 'pagrepret/grid?ajax=1',
'with'   => "'codrep='+this.value"
  )))); ?>


	</div>
</div>

<div id="divGrid">
<?php echo grid_tag($grid);?>
</div>





</fieldset>

<?php include_partial('edit_actions', array('tsrepret' => $tsrepret)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($tsrepret->getId()): ?>
<?php echo button_to(__('delete'), 'pagrepret/delete?id='.$tsrepret->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="JavaScript" type="text/javascript">
$('tsrepret_codrep').focus();
function validargrid(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var descripcion=name+"_"+fila+"_"+coldes;

  if ($('exisret').value=='N' && $(id).value!="")
  {
   alert('La Retención no Existe');
  	$(id).value="";
	$(descripcion).value="";
  }
  else
  {
  	if (retencion_repetido(id))
   {
	alert('La Retencion se Encuentra Repetida');
	$(id).value="";
	$(descripcion).value="";
   }
  }
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

  function retencion_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var retencion=$(id).value;

   var retencionrepetido=false;

   var fil=parseInt($('filas').value);
   var cal=fil+10;
   var am=totalregistros('ax',1,cal);

   var i=0;
   while (i<(am-1))
   {
    var retenc="ax"+"_"+i+"_1"
    var retencion2=$(retenc).value;

    if (i!=fila)
    {
      if (retencion==retencion2)
      {
        retencionrepetido=true;
        break;
      }
    }
   i++;
   }
   return retencionrepetido;
 }

function ajax(id)
 {
   if ($(id).value!="")
   {
    valor=$(id).value;
 	valor=valor.pad(3,"0",0);
 	$(id).value=valor;
   }

   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var descripcion=name+"_"+fil+"_"+coldes;
    var cod=$(id).value;

    new Ajax.Request('/tesoreria_dev.php/pagrepret/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), validargrid(id);}, parameters:'ajax=1&cajtexmos='+descripcion+'&cajtexcom='+id+'&codigo='+cod})
 }
</script>

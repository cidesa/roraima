<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/20 10:13:56
?>
<?php echo form_tag('prenivpre/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fordefniv, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
   <?php echo label_for('fordefniv[nomemp]', __($labels['fordefniv{nomemp}']), 'class="required" style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefniv{nomemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefniv{nomemp}')): ?>
    <?php echo form_error('fordefniv{nomemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_tag('fordefniv[nomemp]',$empresa,'size=60,disabled=true') ?>
    </div>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Código Presupuestario')?></legend>
<div class="form-row">
<table>
 <tr>
  <th><?php echo label_for('fordefniv[rupcat]', __($labels['fordefniv{rupcat}']), 'class="required" style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefniv{rupcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefniv{rupcat}')): ?>
    <?php echo form_error('fordefniv{rupcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('fordefniv[rupcat]', options_for_select($listacategorias,$fordefniv->getRupcat(), 'include_blank=true')) ?>
    </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th><?php echo label_for('fordefniv[ruppar]', __($labels['fordefniv{ruppar}']), 'class="required" style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefniv{ruppar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefniv{ruppar}')): ?>
    <?php echo form_error('fordefniv{ruppar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('fordefniv[ruppar]', options_for_select($listacategorias,$fordefniv->getRuppar(), 'include_blank=true')) ?>
    </div></th>
  <th>&nbsp;&nbsp;&nbsp;</th>
  <th><?php echo label_for('fordefniv[nivdis]', __($labels['fordefniv{nivdis}']), 'class="required" style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefniv{nivdis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefniv{nivdis}')): ?>
    <?php echo form_error('fordefniv{nivdis}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('fordefniv[nivdis]', options_for_select($listacategorias,$fordefniv->getNivdis(), 'include_blank=true')) ?>
    </div></th>
 </tr>
</table>
</div>
</fieldset>

<br>

<div id="div_obj" class="form-row">
<?
	echo grid_tag($obj);
?>
</div>

<div id="div_recargo" class="form-row" style="display:none">
<?
	echo grid_tag($obj2);
?>
</div>

<br>

  <?php echo label_for('fordefniv[forpre]', __($labels['fordefniv{forpre}']), 'class="required" style="width: 200px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefniv{forpre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefniv{forpre}')): ?>
    <?php echo form_error('fordefniv{forpre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefniv, 'getForpre', array (
  'size' => 32,
  'readonly' => true,
  'control_name' => 'fordefniv[forpre]',
)); echo $value ? $value : '&nbsp;' ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="Submit" value="Periodo" onclick="$('div_recargo').toggle();" />

    </div>

<br>

<table>
 <tr>
  <th>
   <fieldset id="sf_fieldset_none" class="">
   <legend><?php echo __('Fechas')?></legend>
   <div class="form-row">
    <?php echo label_for('fordefniv[fecini]', __($labels['fordefniv{fecini}']), 'class="required" style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefniv{fecini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefniv{fecini}')): ?>
    <?php echo form_error('fordefniv{fecini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($fordefniv, 'getFecini', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fordefniv[fecini]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>

    <?php echo label_for('fordefniv[feccie]', __($labels['fordefniv{feccie}']), 'class="required" style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefniv{feccie}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefniv{feccie}')): ?>
    <?php echo form_error('fordefniv{feccie}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($fordefniv, 'getFeccie', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fordefniv[feccie]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>
  <?php echo label_for('fordefniv[feccie]', __($labels['fordefniv{feccie}']), 'class="required" style="width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefniv{feccie}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefniv{feccie}')): ?>
    <?php echo form_error('fordefniv{feccie}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($fordefniv, 'getFeccie', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fordefniv[feccie]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
   </div>
   </fieldset>
  </th>
  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  <th>
  <fieldset id="sf_fieldset_none" class="">
   <div class="form-row">
   <div>
     <?php echo label_for('fordefniv[asiper]', __($labels['fordefniv{asiper}']), 'class="required" style="width: 150px"') ?>
  <?
if ($fordefniv->getAsiper()=='S')	{
  ?><?php echo radiobutton_tag('fordefniv[asiper]', 'S', true)        ."Si".'&nbsp;&nbsp;';
		  echo radiobutton_tag('fordefniv[asiper]', 'N', false)."   No";?>
		<?

}else{
	echo radiobutton_tag('fordefniv[asiper]', 'S', false)        ."Si".'&nbsp;&nbsp;';
	echo radiobutton_tag('fordefniv[asiper]', 'N', true)."   No";

} ?>
</div>

<br>

  <?php echo label_for('fordefniv[numper]', __($labels['fordefniv{numper}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefniv{numper}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefniv{numper}')): ?>
    <?php echo form_error('fordefniv{numper}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefniv, 'getNumper', array (
  'size' => 20,
  'control_name' => 'fordefniv[doccom]',
  'onBlur'=> remote_function(array(
              'update'   => 'div_recargo',
              'url' => 'prenivpre/ajax',
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=1&codigo='+this.value",
			  )),
)); echo $value ? $value : '&nbsp;' ?>



  <?php echo select_tag('fordefniv[numper]', options_for_select($listaperiodos,$fordefniv->getNumper(), 'include_blank=true')) ?>
    </div>
</div>
</fieldset>
  </th>
  <th></th>
  <th></th>
 </tr>
</table>

<br>





</fieldset>

<script type="text/javascript">
  function poner_num(n)
  {
    i=0;
	tira="";
	while (i<n)
	{
	  tira=tira+"#";
	  i=i+1;
	}
   return tira;
  }

function formato(e,id)
{
   if (e.keyCode==13)
   {
     var aux = id.split("_");
	 var name=aux[0];
	 var fila=parseInt(aux[1]);
	 var col=parseInt(aux[2]);

     var collongitud=col;
     var long=name+"_"+fila+"_"+collongitud;

     ultimo= parseInt(document.getElementById('fordefniv_rupcat').value)+ parseInt(document.getElementById('fordefniv_ruppar').value);
     valor=document.getElementById(long).value;
       if (fila==0)
	   {
	     format=poner_num(valor);
	     //document.getElementById('fordefniv_forpre').value=format;
	   }
	   else
	   {
	     format=poner_num(valor);
	   }

	 document.getElementById('fordefniv_forpre').value="";
	 var fil=0;
     while (fil<20)
     {

      chk=name+"_"+fil+"_1";
      if (document.getElementById(chk).value=="")
      {break;}

      idlon=name+"_"+fil+"_2";
      lon=parseInt(document.getElementById(idlon).value);


	      if (fil==0)
	      {
		      j=0;
		      while (j<lon)
		      {
		      	document.getElementById('fordefniv_forpre').value=document.getElementById('fordefniv_forpre').value + "#";

		      j++;
		      }
	      }
	      else
	      {
	         document.getElementById('fordefniv_forpre').value=document.getElementById('fordefniv_forpre').value + "-";
	         j=0;
		      while (j<lon)
		      {
		      	document.getElementById('fordefniv_forpre').value=document.getElementById('fordefniv_forpre').value + "#";

		      j++;
		      }
	      }
      fil++;
	 }

    }
}
</script>

<?php include_partial('edit_actions', array('fordefniv' => $fordefniv)) ?>

</form>

<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/07/02 16:07:22
?>
<?php echo form_tag('oycsitobr/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ocregobr, 'getId') ?>
<?php echo javascript_include_tag('tools','observe','dFilter','ajax','obras/ofertas') ?>
<table width="100%">
  <tr>
    <th><strong><font color="<? print $color;?>" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <? print $eti;?></font></strong></th>
  </tr>
</table>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Obra')?></legend>
<div class="form-row">
  <?php echo label_for('ocregobr[codobr]', __($labels['ocregobr{codobr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{codobr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{codobr}')): ?>
    <?php echo form_error('ocregobr{codobr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getCodobr', array (
  'size' => 32,
  'readonly' => true,
  'control_name' => 'ocregobr[codobr]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($ocregobr, 'getDesobr', array (
  'size' => 80,
  'readonly' => true,
  'control_name' => 'ocregobr[desobr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Financiera Global');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('ocregobr[totalp]', __($labels['ocregobr{totalp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{totalp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{totalp}')): ?>
    <?php echo form_error('ocregobr{totalp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, array('getTotalp',true), array (
  'disabled' => true,
  'control_name' => 'ocregobr[totalp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('ocregobr[totala]', __($labels['ocregobr{totala}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{totala}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{totala}')): ?>
    <?php echo form_error('ocregobr{totala}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getTotala', array (
  'disabled' => true,
  'control_name' => 'ocregobr[totala]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<table>
<tr>
<th>
  <?php echo label_for('ocregobr[totaldif]', __($labels['ocregobr{totaldif}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{totaldif}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{totaldif}')): ?>
    <?php echo form_error('ocregobr{totaldif}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getTotaldif', array (
  'disabled' => true,
  'control_name' => 'ocregobr[totaldif]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocregobr[pordif]', __($labels['ocregobr{pordif}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{pordif}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{pordif}')): ?>
    <?php echo form_error('ocregobr{pordif}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getPordif', array (
  'disabled' => true,
  'control_name' => 'ocregobr[pordif]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>

<br>

  <?php echo label_for('ocregobr[totalc]', __($labels['ocregobr{totalc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{totalc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{totalc}')): ?>
    <?php echo form_error('ocregobr{totalc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getTotalc', array (
  'disabled' => true,
  'control_name' => 'ocregobr[totalc]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<table>
<tr>
<th>
  <?php echo label_for('ocregobr[totalcv]', __($labels['ocregobr{totalcv}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{totalcv}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{totalcv}')): ?>
    <?php echo form_error('ocregobr{totalcv}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getTotalcv', array (
  'disabled' => true,
  'control_name' => 'ocregobr[totalcv]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocregobr[porvarcon]', __($labels['ocregobr{porvarcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{porvarcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{porvarcon}')): ?>
    <?php echo form_error('ocregobr{porvarcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getPorvarcon', array (
  'disabled' => true,
  'control_name' => 'ocregobr[porvarcon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>

<br>

<table>
<tr>
<th>
 <?php echo label_for('ocregobr[moneje]', __($labels['ocregobr{moneje}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{moneje}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{moneje}')): ?>
    <?php echo form_error('ocregobr{moneje}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getMoneje', array (
  'readonly' => true,
  'control_name' => 'ocregobr[moneje]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
 <?php echo label_for('ocregobr[poreje]', __($labels['ocregobr{poreje}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{poreje}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{poreje}')): ?>
    <?php echo form_error('ocregobr{poreje}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getPoreje', array (
  'readonly' => true,
  'control_name' => 'ocregobr[poreje]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>

<br>

<table>
<tr>
<th>
 <?php echo label_for('ocregobr[monporeje]', __($labels['ocregobr{monporeje}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{monporeje}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{monporeje}')): ?>
    <?php echo form_error('ocregobr{monporeje}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getMonporeje', array (
  'readonly' => true,
  'control_name' => 'ocregobr[monporeje]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('ocregobr[porxeje]', __($labels['ocregobr{porxeje}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{porxeje}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{porxeje}')): ?>
    <?php echo form_error('ocregobr{porxeje}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getPorxeje', array (
  'readonly' => true,
  'control_name' => 'ocregobr[porxeje]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Financiera Detallada');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo grid_tag($obj);?>
<br>
  <?php echo label_for('ocregobr[totobreje]', __($labels['ocregobr{totobreje}']), 'class="required" Style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{totobreje}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{totobreje}')): ?>
    <?php echo form_error('ocregobr{totobreje}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getTotobreje', array (
  'readonly' => true,
  'control_name' => 'ocregobr[totobreje]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage3", 'Financiera Física');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo grid_tag($obj2);?>

<br>

  <?php echo label_for('ocregobr[obrejefis]', __($labels['ocregobr{obrejefis}']), 'class="required" Style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('ocregobr{obrejefis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ocregobr{obrejefis}')): ?>
    <?php echo form_error('ocregobr{obrejefis}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ocregobr, 'getObrejefis', array (
  'readonly' => true,
  'control_name' => 'ocregobr[obrejefis]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabInit('tp1','0');?>

<?php include_partial('edit_actions', array('ocregobr' => $ocregobr)) ?>

</form>

<ul class="sf_admin_actions">
  </ul>

<script language="JavaScript" type="text/javascript">
totalizarsfd();
totalizarsf();

  function totalizarsfd()
  {
  	var acum=0;
  	var acum2=0;
  	var totreg=parseInt('<?php echo $fil1?>');
    var l=0;
    while (l<totreg)
    {
      var moneje="ax"+"_"+l+"_4";
      var mondif="ax"+"_"+l+"_5";
      var num1=toFloat(moneje);
      var num2=toFloat(mondif);

     if (num1>0)
     {
       acum= acum + num1;
     }

     if (num2>0)
     {
       acum2= acum2 + num2;
     }
   l++;
   }

   $('ocregobr_moneje').value=format(acum.toFixed(2),'.',',','.');
   $('ocregobr_monporeje').value=format(acum2.toFixed(2),'.',',','.');
   $('ocregobr_totobreje').value=format(acum2.toFixed(2),'.',',','.');

  }

  function totalizarsf()
  {
  	var acum=0;
  	var totreg2=parseInt('<?php echo $fil2?>');
    var i=0;
    while (i<totreg2)
    {
      var monporeje="bx"+"_"+i+"_6";
      var num1=toFloat(monporeje);

     if (num1>0)
     {
       acum= acum + num1;
     }

   i++;
   }
  if (totreg2>0)
  {
   $('ocregobr_obrejefis').value=format((acum/totreg2).toFixed(2),'.',',','.');
   $('ocregobr_poreje').value=format((acum/totreg2).toFixed(2),'.',',','.');
   var num3=toFloat('ocregobr_poreje');
   $('ocregobr_porxeje').value=format((100-num3).toFixed(2),'.',',','.');
  }

  }
</script>



<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo 'Conciliacion Bancaria' ?></h1>

<div id="sf_admin_content">
<fieldset id="sf_fieldset_none" class="">
<legend> Datos de la Conciliacion</legend>
<div class="form-row">
  <?php echo label_for('lnrocue','Numero de Cuenta' , 'class="required"') ?>

  <?php echo input_tag('nrocue', '','size=40') ?>
  &nbsp;
<?php echo button_to('...','#') ?>
</div>
  <div class="form-row">
  <?php echo label_for('ldescue','Descripcion' , 'class="required"') ?>

  <?php echo input_tag('descue', '','disabled=true,size=80') ?>  
   </div>
   <div class="form-row">
  <?php echo label_for('lmescon','Mes a Conciliar' , 'class="required"') ?>

  <?php echo select_tag('mescon', options_for_select(array(
  '01'  => 'Enero',
  '02'  => 'Febrero',
  '03'  => 'Marzo',
  '04'  => 'Abril',
  '05'  => 'Mayo',
  '06'  => 'Junio',
  '07'  => 'Julio',
  '08'  => 'Agosto',
  '09'  => 'Septiembre',
  '10'  => 'Octubre',
  '11'  => 'Noviembre',
  '12'  => 'Diciembre'
), '01')) ?>
  
   </div>
   <div class="form-row">
  	<?php echo label_for('lannocon','Año a Conciliar' , 'class="required"') ?>

    <?php echo input_tag('annocon', '','size=6') ?>  
   </div>
  <div class="form-row" align="center" >
  <fieldset id="sf_fieldset_none"  class="">
   <div class="form-row" align="center">
  	  <?php echo button_to('  Hacer  ','#') ?>
  	    &nbsp;
  	    &nbsp;
  	    &nbsp;
  	  <?php echo button_to('  Anular ','#') ?>
   </div>
   </fieldset>
    </div>
</fieldset>
</div>


</div>





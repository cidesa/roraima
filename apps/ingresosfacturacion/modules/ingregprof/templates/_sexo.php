<?php
/*
 * Created on 26/01/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php
if ($inprofes->getId()=='')
{
echo select_tag('inprofes[sexo]', options_for_select(Array('M' => 'Masculino', 'F' => 'Femenino'),$inprofes->getSexo()));
}else
{
  echo object_input_hidden_tag($inprofes, 'getInprofesId',array('control_name' => 'inprofes[id]')) ?>
  <?php if ($inprofes->getSexo()=='F'){

  	echo input_tag('inprofes_sexo', 'Femenino', 'size=10', 'readonly = true');

  }else{

    echo input_tag('inprofes_sexo', 'Masculino', 'size=10', 'readonly = true');

  }
 ?>


&nbsp;
<?php
}
?>

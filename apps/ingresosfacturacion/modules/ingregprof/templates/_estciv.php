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
echo select_tag('inprofes[estciv]', options_for_select(Array('S' => 'Soltero(a)', 'C' => 'Casado(a)', 'V' => 'Viudo(a)', 'D' => 'Divorsiado(a)'),$inprofes->getEstciv()));
}else
{
  echo object_input_hidden_tag($inprofes, 'getInprofesId',array('control_name' => 'inprofes[id]')) ?>
  <?php switch ($inprofes->getEstciv()){

  	case 'S':  echo input_tag('inprofes_sexo', 'Soltero(a)', 'size=10', 'readonly = true');
  	           break;

  	case 'C':  echo input_tag('inprofes_sexo', 'Casado(a)', 'size=10', 'readonly = true');
  	           break;

  	case 'V':  echo input_tag('inprofes_sexo', 'Viudo(a)', 'size=10', 'readonly = true');
  	           break;

  	case 'D':  echo input_tag('inprofes_sexo', 'Divorciado(a)', 'size=10', 'readonly = true');
  	           break;

  }


 ?>
&nbsp;
<?php
}
?>
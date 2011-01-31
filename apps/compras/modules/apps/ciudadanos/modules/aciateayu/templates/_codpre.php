 <?php //$codpre = H::Obtener_FormatoPresupuesto();



echo Catalogo($atayudas,8,array(
  'getprincipal' => 'getCodpre',
  'getsecundario' => 'getNompre',
  'campoprincipal' => 'codpre',
  'camposecundario'=> 'nompre',
  'campobase' => 'idcodpre',
  ), 'Cpdeftit_Acitipayu', 'cpdeftit', '' );




/*
 $value = object_input_tag($atayudas, 'getCodpre', array (
  'size' => 32,
  'control_name' => 'atayudas[codpre]',
  'maxlength' => 40,
  'onKeyPress' => "javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById('atayudas_codpre').value=cadena;}",
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;

echo  button_to_popup_('...','/metodo/Cpdeftit_Acitipayu/clase/Cpdeftit/frame/sf_admin_edit_form/obj1/attipayu_codpre/campo1/codpre/'); 
*/
?>

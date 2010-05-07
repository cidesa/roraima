<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <?php $value = object_input_date_tag($opordpag, 'getFechas', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fechas]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'update' => 'salidas',
        'url'      => 'tesrencajchi/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opordpag_fechas').value != '' && $('id').value == ''",
        'with' => "'ajax=5&codcajchi='+$('opordpag_codcajchi').value+'&fecdes='+$('opordpag_fecdes').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>

<br>

<ul class="sf_admin_actions" >
<li class="float-center">
<input id="marcatodos" class="sf_admin_action_save" type="button" value="Marcar Todos" onClick="martodos();">
</li>
<li class="float-center">
<input id="desmartodos" class="sf_admin_action_cancel" type="button" value="Desmarcar Todos" onClick="destodos();">
</li>
</ul>
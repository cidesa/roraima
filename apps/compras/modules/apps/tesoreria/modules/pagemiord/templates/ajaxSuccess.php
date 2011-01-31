<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'Javascript', 'Grid', 'I18N', 'PopUp', 'Linktoapp') ?>
<?php echo javascript_include_tag('ajax','tesoreria/pagemiord','tools') ?>

<?php if ($div=='TIPCAU') { ?>
<?php if ($tipcau==$ordpagnom || $tipcau=="OPNN") { ?>
<?php $opnn= label_for('', __('Por favor, seleccione la Nómina a Pagar'), 'class="required" style="width:220px "')?>
<?php $opnn .= input_tag('tipnom', '', 'size=7; onBlur=javascript:cargar1();') ?>
<?php $opnn .= input_hidden_tag('nomina', '') ?><?php $opnn .= input_hidden_tag('fechanomina', '') ?><?php $opnn .= input_hidden_tag('gasto', '') ?><?php $opnn .= input_hidden_tag('banco', '') ?><?php $opnn .= input_hidden_tag('nomespecial', '') ?>
<?php $opnn .= input_hidden_tag('codnomesp', '') ?>
<? $sql="Select distinct((CASE when c.cedemp is null THEN b.nomnom else C.NOMEMP||' ('||B.NOMNOM||')' END)) as nomina,
         A.CODNOM as codigo,A.FECNOM as fecha,a.codtipgas as gasto,A.CODBAN as codban, A.ESPECIAL as especial, A.CODNOMESP as nominaesp
         FROM NPNOMINA B,NPCIENOM A left outer join NPHOJINT C on A.CODBAN=C.CEDEMP
         WHERE A.CODNOM=B.CODNOM AND A.ASIDED<>'P' order by nomina,fecha;";
   $url=cross_app_link_to('herramientas','catalogobuscar').'/space/catalogo1/objs/tipnom-nomina-fechanomina-gasto-banco-nomespecial-codnomesp/campos/codigo-nomina-fecha-gasto-codban-especial-nominaesp'; ?>
<?php $opnn .=  '&nbsp;&nbsp;&nbsp;'.button_to_popup('...',$url,$sql,'catalogo1')?>

<?php  echo javascript_tag(
  update_element_function('divAdi', array(
    'content'  => $opnn,
  ))) ?>
  <? echo grid_tag($obj);?>
<?php }else if ($tipcau==$ordpagapo || $tipcau=="APOR") { ?>
<?php $apor= label_for('', __('Por favor, seleccione el Aporte a Pagar'), 'class="required" style="width:220px "')?>
  <?php $apor .= input_tag('codigoaporte', '', 'size=7; onBlur=javascript:cargar2();') ?>
<?php $apor .= input_hidden_tag('fecnom', '') ?><?php $apor .= input_hidden_tag('gasto2', '') ?>
  <? $sql="SELECT DISTINCT B.NOMCON,A.CODCON as codigoaporte, A.FECNOM as fecnom,A.CODTIPGAS AS GASTO  FROM NPCIENOM A, NPDEFCPT B
           Where A.CODCON = B.CODCON AND A.ASIDED='P';";
   $url=cross_app_link_to('herramientas','catalogobuscar').'/space/catalogo1/objs/codigoaporte-fecnom-gasto2/campos/codigoaporte-fecnom-gasto';
 ?>
 <?php $apor .=  '&nbsp;&nbsp;&nbsp;'.button_to_popup('...',$url,$sql,'catalogo1')?>

<?php  echo javascript_tag(
  update_element_function('divAdi', array(
    'content'  => $apor,
  ))
) ?>
<? echo grid_tag($obj);?>
<?php }else if ($tipcau==$ordpagliq || $tipcau=="LIQU") { ?>
<?php $liqu= label_for('', __('Por favor, seleccione la Liquidación Pendiente por Pagar'), 'class="required" style="width:220px "')?>
  <?php $liqu .= input_tag('codigoemp', '', 'size=7; onBlur=javascript:cargar3();') ?>
  <?php $liqu .= input_hidden_tag('empleado', '') ?><?php $liqu .= input_hidden_tag('cedula', '') ?>
  <? $sql="select distinct(c.nomemp) as empleado, a.codemp as codigo, c.cedemp as cedula
           from NPLIQUIDACION_DET a left outer join NPHOJINT c on a.codemp=c.codemp
           where  coalesce(a.numord,'')='' order by empleado;";
  $url=cross_app_link_to('herramientas','catalogobuscar').'/space/catalogo1/objs/codigoemp-empleado-cedula/campos/codigo-empleado-cedula'; ?>
  <?php $liqu .=  '&nbsp;&nbsp;&nbsp;'.button_to_popup('...',$url,$sql,'catalogo1')?>

  <?php  echo javascript_tag(
  update_element_function('divAdi', array(
    'content'  => $liqu,
  ))
) ?>
<? echo grid_tag($obj);?>
<?php }else if ($tipcau==$ordpagfid || $tipcau=="OPFD") { ?>
<?php $opfd= label_for('', __('Por favor, seleccione el Fideicomiso Pendiente por Pagar'), 'class="required" style="width:220px "')?>
  <?php $opfd .= input_tag('lanomina', '', 'size=7; onBlur=javascript:cargar4();') ?>
  <?php $opfd .= input_hidden_tag('lafecha', '') ?><?php $opfd .= input_hidden_tag('elnombre', '') ?>
  <? $sql="Select B.NomNom as nomnom,A.CodNom as codnom,A.Fecha as fecha from NPOrdFid A,NPNomina B Where A.CodNom=B.CodNom Group By B.NomNom,A.CodNom,A.Fecha";
  $url=cross_app_link_to('herramientas','catalogobuscar').'/space/catalogo1/objs/lanomina-lafecha-elnombre/campos/codnom-fecnom-nomnom'; ?>
  <?php $opfd .=  '&nbsp;&nbsp;&nbsp;'.button_to_popup('...',$url,$sql,'catalogo1')?>

    <?php  echo javascript_tag(
  update_element_function('divAdi', array(
    'content'  => $opfd,
  ))
) ?>

<div id="carga4">
<? echo grid_tag($obj);?>
</div>
<?php }else if ($tipcau==$ordpagval || $tipcau=="OPVA") { ?>
<?php echo label_for('', __('Por favor, seleccione el Contrato a Pagar'), 'class="required" style="width:220px "')?>
<?php echo input_tag('tipcon', '', 'size=7; onBlur=javascript:cargar5();') ?>
<?php echo input_hidden_tag('refcomv', '') ?><?php echo  input_hidden_tag('rifcon', '') ?>
<?php echo '&nbsp;&nbsp;&nbsp;'.button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Ocregcon_Pagemiord/clase/Ocregcon/frame/sf_admin_edit_form/obj1/refcomv/obj2/rifcon/campo1/refcom/campo2/cedrif')?>
<?php }else { ?>
<?php if ($docrefiere=='N') { ?>
<ul class="sf_admin_actions">
<li class="float-rigth">
<input type="button" name="Submit" value="Retenciones" onClick="javascript:$('reten').toggle();"/>
</li>
</ul>
<? echo grid_tag($obj);?>
<?php }else { ?>
<div id="divDatos">
<input type="button" name="Submit" value="R" onClick="javascript:$('divDatos').hide();$('ref').show();"/>

<ul class="sf_admin_actions">
<li class="float-rigth">
<input type="button" name="Submit" value="Retenciones" onClick="javascript:$('reten').toggle();"/>
</li>
</ul>
<? echo grid_tag($obj);?>
</div>
<div id="ref" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Referencia')?></legend>
<div class="form-row">
<table>
  <tr>
    <th><?php echo label_for('refere',__('Referencia') , 'class="required" Style="width:100px"') ?>
  <?php $value = input_tag('refere', '', array (
  'size' => 20,
  'maxlength' => 8,
  'onBlur'=> remote_function(array(
       'update'   => 'divGrid2',
       'url'      => 'pagemiord/ajax',
       'condition' => "$('refere').value != ''",
       'script'   => true,
       'complete' => 'AjaxJSON(request, json),actualizarsaldos(), mensajes();',
       'with' => "'ajax=6&codigo='+this.value+'&fecha='+$('fecha').value+'&arreglo='+$('opordpag_referencias').value+'&indice='+$('indref').value+'&tipcau='+$('opordpag_tipcau').value+'&fecha2='+$('opordpag_fecemi').value+'&observe='+$('opordpag_observe').value+'&causado='+$('total').value+'&refcre='+$('opordpag_refcre').value+'&refsolpag='+$('opordpag_refsolpag').value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

<?php //echo input_auto_complete_tag('refere','',
  //  'pagemiord/autocomplete?ajax=6'//,  array('autocomplete' => 'off','maxlength' => 8,'onBlur'=> remote_function(array(
       //'update'   => 'divGrid2',
       //'url'      => 'pagemiord/ajax',
       //'script'   => true,
       //'complete' => 'AjaxJSON(request, json),actualizarsaldos(), mensajes();',
       //'with' => "'ajax=6&codigo='+this.value+'&fecha='+$('fecha').value+'&arreglo='+$('opordpag_referencias').value+'&indice='+$('indref').value+'&tipcau='+$('opordpag_tipcau').value+'&fecha2='+$('opordpag_fecemi').value+'&observe='+$('opordpag_observe').value+'&causado='+$('total').value+'&refcre='+$('refcre').value"
        //))),array('use_style' => 'true', 'with' => "'tipcau='+$('opordpag_tipcau').value")
  //)  ?>
  </th>
<th>
<div id="cpprecom" style="display:none">
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpprecom_Pagemiord/clase/Cpprecom/frame/sf_admin_edit_form/obj1/refere/campo1/refprc')?>
</div>
<div id="cpcompro" style="display:none">
    <?php if($tipcau==$ordpagcre) { // Orden de pago de creditos ?>
        <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Ccsoldescuades_Pagemiord/clase/Ccdetcuades/frame/sf_admin_edit_form/obj1/refere/campo1/refcom/obj2/opordpag_refcre/campo2/codigo')?>
    <?php } elseif($tipcau==$ordpagsolpag) { ?>
        <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opsolpag_Pagemiord/clase/Opsolpag/frame/sf_admin_edit_form/obj1/refere/campo1/refcom/obj2/opordpag_refsolpag/campo2/refsol')?>
    <?php } else { ?>
        <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpcompro_Pagemiord/clase/Cpcompro/frame/sf_admin_edit_form/obj1/refere/campo1/refcom')?>
    <?php } ?>

</div>
</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th><?php echo label_for('',__('Fecha') , 'class="required" Style="width:100px"') ?>
<?php echo input_tag('fecha', '', array(
'readonly'=> true,
'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)) ?></th>
<th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
<th>
  <?php echo link_to_function(image_tag('/images/Save.png'), "salva('ref')") ?>
</th>
<th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
<th>
  <?php echo link_to_function(image_tag('/images/salir.gif'), "mostrar('divDatos','ref')") ?>
</th>
</tr>

</table>

<br>

<?php echo label_for('',__('Descripción') , 'class="required" Style="width:100px"') ?>
<div>
<?php echo textarea_tag('descripcion', '', 'size=80x5 readonly=true') ?>
</div>

<br>

<table>
<tr>
 <th>
 <?php echo label_for('',__('Código') , 'class="required" Style="width:100px"') ?>
 <?php echo input_tag('tipo', '', 'size=5 readonly=true') ?>
</th>
<th><?php echo input_tag('destipo', '', 'size=50 readonly=true') ?></th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo input_hidden_tag('fila', '') ?>
<?php echo input_hidden_tag('indref', '') ?>
 <?php echo input_hidden_tag('totalcomprometido', '') ?><?php echo input_hidden_tag('totalcau', '') ?><?php echo input_hidden_tag('mensaje', '') ?>
<?php echo input_hidden_tag('ajaxs', '') ?>
</th>
 <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
 <th>
<?php echo label_for('',__('Total Causado') , 'class="required" Style="width:100px"') ?>
<?php echo input_tag('total','0,00', 'size=15 class=grid_txtright readonly=true') ?></th>
</tr>
</table>

<script type="text/javascript">
causado();

  function mostrar(item,item2)
  {
    obj=$(item);
    obj.style.display="block";
    obj2=$(item2);
    obj2.style.display="none";
  }

  function causado()
   {

  str1= $('opordpag_monord').value.toString();
  str1= str1.replace('.','') ;
  str1= str1.replace('.','') ;
  str1= str1.replace('.','') ;
  str1= str1.replace('.','') ;
  str1= str1.replace('.','') ;
  str1= str1.replace('.','') ;
  str1= str1.replace(',','.');
  var totord=parseFloat(str1);

  str2= $('totalcau').value.toString();
  str2= str2.replace('.','') ;
  str2= str2.replace('.','') ;
  str2= str2.replace('.','') ;
  str2= str2.replace('.','') ;
  str2= str2.replace('.','') ;
  str2= str2.replace('.','') ;
  str2= str2.replace(',','.');
  var totacausar=parseFloat(str2);

  var calcul= totord+totacausar;

    $('total').value=format(calcul.toFixed(2),'.',',','.');
   }

   function modifico1(e)
    {
     if (e.keyCode==13)
     {
     $('modifico1').value=false;
   }
    }

    function modifico2(e)
    {
     if (e.keyCode==13)
     {
     $('modifico2').value=false;
   }
    }
</script>

<div id="divGrid2">
<?  echo grid_tag($obj4);?>
</div>
</div>
</fieldset>
</div>
<?php } ?>
<?php } ?>
<?php }else if ($div=='OPNN') {?>
<?php if ($divu==1) {?>
<? echo grid_tag($obj);?>
<?php } else {?>
<?  echo grid_tag($obj6); ?>
<?php }?>
<script language="JavaScript" type="text/javascript">
  netos();
  chequeadisponibilidad();
</script>
<?php }else if ($div=='APOR') { ?>
<? echo grid_tag($obj);?>
<script language="JavaScript" type="text/javascript">
  netos();
  chequeadisponibilidad();
</script>
<?php }else if ($div=='LIQU') { ?>
<?php if ($divu==1) {?>
<? echo grid_tag($obj);?>
<?php } else {?>
<?  echo grid_tag($obj6); ?>
<?php }?>
<script language="JavaScript" type="text/javascript">
  netos();
  chequeadisponibilidad();
</script>
<?php }else if ($div=='OPFD') { ?>
<? echo grid_tag($obj);?>
<script language="JavaScript" type="text/javascript">
  netos();
  chequeadisponibilidad();
</script>
<?php }else if ($div=='OPVA') { ?>
<? echo grid_tag($obj);?>
<script language="JavaScript" type="text/javascript">
  netos();
</script>
<?php }else if ($div=='VAL') { ?>
<?php $opval= label_for('', __('Por favor, seleccione la Valuación a Pagar'), 'class="required" style="width:220px "')?>
<?php $opval .= input_tag('tipval', '', 'size=7; onBlur=javascript:cargar6();') ?>
<?php $opval .= input_hidden_tag('monval', '') ?>
<?php $opval .=  '&nbsp;&nbsp;&nbsp;'.button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Ocregval_Pagemiord/clase/Ocregval/frame/sf_admin_edit_form/obj1/monval/obj2/opordpag_desord/campo1/monval/campo2/obsval')?>

<?php  echo javascript_tag(
  update_element_function('divCon', array(
    'content'  => $opva,
  ))) ?>
  <? echo grid_tag($obj);?>
<?}else if ($div=='CIRIF') {?>
<?php echo label_for('Tipobenef', __('Elija un Tipo de Beneficiario'), 'class="required" style="width:200px "') ?>
<?php echo select_tag('tipoben', options_for_select(array('P'=>'Proveedor','C'=>'Contratista'),'','include_blank=true')) ?>
<?}else if ($div=='REF'){?>
<? echo grid_tag($obj4);?>
</div>
<?php }?>

<? if ($ajax=='8') { ?>


<? } ?>
<script language="JavaScript" type="text/javascript">
  function mensajes()
  {
   if (($('ajaxs').value=='6') && ($('mensaje').value!=""))
   {
    alert($('mensaje').value);
   }

  }
</script>
<script language="JavaScript" type="text/javascript" src="../../lib/general/tool.js"></script>
<script language="JavaScript" type="text/javascript" src="../../lib/general/prototype_1_5_1.js"></script>
<form name="form1" method="post" action="">
<table width="100%" align="center">
<tr>
  <td width="100%" align="center"><? require_once('../../lib/general/top.php'); ?>
  </td>
</tr>
    <tr>
      <td width="100%" colspan="2" class="cell_date" align="right">
    <?
    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S&aacute;bado");
    $mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $me=$mes[date('n')];
    echo $dias[date('w')].strftime(", %d de $me del %Y")."<br>";
    ?>
    </td>
    </tr>
<tr>
  <td>
  <div id="sf_admin_container">
  <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td rowspan="2" valign="top" class="main"> <h1><?php echo strtoupper($titulo)?></h1> <input name="titulo" type="hidden" id="titulo">

       <div id="sf_admin_content">
        <fieldset >
          <table class="form-row" width="100%" border="0" align="left" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
           <tr>
            <td>
            <table>
            <tr bordercolor="#6699CC">
              <h2>Pantalla</h2>
              <td class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td> <?php echo $tipopagina?></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="24" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td> <?php echo $orientacion?></td>
              <td> </td>
            </tr>
            </table>
            </td>
          </tr>
          <tr>
            <td colspan="2">
            <table width="100%">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"><font color="#000066" size="3"><h2>Criterios
                  de Selecci&oacute;n</h2></font></div></td>
            </tr>
            <tr>
            <td>
            <table width="55%" align="center">
            <tr bordercolor="#6699CC">
              <td bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>
<?php use_helper('Javascript', 'wait') ?>

<?php include_title() ?>

<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>
<?php echo wait() ?>
<table width="100%" align="center"><!--DWLayoutTable-->
  <tr>
  <td width="100%">
      <table width="100%" border="0" align="left" cellpadding="0"><!--DWLayoutTable-->
      <tr>
        <td width="100%"><table width="100%" height="0%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="39%" valign="top" ><img src="/images/borrar_01.jpg" width="273" height="89" /></td>
                  <td rowspan="4" valign="top"><img src="/images/borrar_02.jpg" width="19" height="121" align="top" /></td>
                  <td colspan="2"  width="100%" valign="top" background=" /images/borrar_03.jpg" align="right"><img src="/images/borrar_04.jpg" width="341" height="89" /></td>
                </tr>
                <tr>
                  <td rowspan="3" valign="bottom" background="/images/borrar_05.jpg"><span class="Quote Order">Usuario: <?php echo $sf_user->getAttribute('usuario','Sin Autenticar') ?> | Empresa: <?php echo $_SESSION["nomemp"] ?>  <br>
                    M&oacute;dulo: Vi&aacute;ticos</span></td>
          <td colspan="2" valign="middle" background=" /images/borrar_06.jpg" height="22" align="right">

            <a href="<?php echo "javascript:self.close()"; ?>" style="color:#8B0000;" >[ Cerrar Ventana ]</a>&nbsp;

            <a href= "javascript: var w = window.open('<?php if (SF_ENVIRONMENT=='dev') echo "/".sfConfig::get('app_autenticacion')."_dev.php/ayudas?m=".sfConfig::get('app_this'); else echo "/".sfConfig::get('app_autenticacion').".php/ayudas?m=".sfConfig::get('app_this'); ?>')">[ Ayuda en L&iacute;nea ]</a>&nbsp;
            <a href="javascript: var w = window.open('http://wiki.cidesa.com.ve')">[ Comunidad ]</a>&nbsp;
 <a href="<?php if (SF_ENVIRONMENT=='dev') echo "/".sfConfig::get('app_autenticacion')."_dev.php/login/logout"; else echo "/".sfConfig::get('app_autenticacion').".php/login/logout"; ?>">[ Cerrar Sesi&oacute;n ]</a>&nbsp;            &nbsp;          </td>
                </tr>
                <tr>
                  <td colspan="2" vawidth="100%" valign="top" background="/images/borrar_07.jpg" align="right"><img src="/images/borrar_07.jpg" width="341" height="2"></td>
                </tr>
                <tr>
                  <td colspan="2" valign="top" background="/images/borrar_08.jpg" align="right"><img src="/images/borrar_08.jpg" width="341" height="8" /></td>
                </tr>
              </table></td>
      </tr>
    </table>
    </td>
  </tr>
<tr>
      <td valign="top" >
        <table width="100%" border="0" cellpadding="0" cellspacing="0" >
          <!--DWLayoutTable-->
          <tr>
            <td width="100%" height="19" align="right">&nbsp;</td>
          </tr>
          <tr>
            <td height="56" ><?php echo $sf_data->getRaw('sf_content'); ?></td>
          </tr>
          <tr>
            <td align="CENTER"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
          <tr>
            <td align="CENTER"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
          <tr>
            <td height="42" align="CENTER"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
          <tr>
            <td height="11" align="CENTER"><hr /></td>
          </tr>
          <tr>
            <td height="25" align="CENTER"><strong><font size='1'></font></strong></td>
          </tr>
          <tr>
            <td height="25" align="CENTER"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><div align="center"><?php echo image_tag('get_apache_80x15_2.png');
             ?>&nbsp;&nbsp;
                    <?php
            echo image_tag('get_linux_80x15.png');

             ?>&nbsp;&nbsp;
                    <?php
                  echo image_tag('get_php_80x15.png');

             ?>&nbsp;&nbsp;
                    <?php
                  echo image_tag('firefox.png');
             ?>&nbsp;&nbsp;
                    <?php
                  echo image_tag('debian.png');
             ?>&nbsp;&nbsp;
                    <?php
                  echo image_tag('postgresql_2.png');
             ?>&nbsp;&nbsp;
                    <?php
                  echo image_tag('ubuntu.png');
             ?>&nbsp;&nbsp;
                    <?php
                  echo image_tag('adodb.png');
             ?>&nbsp;&nbsp;
                    <?php
                  echo image_tag('symfony1.png');
             ?>&nbsp;&nbsp;


                </div></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="CENTER"><strong><font size='1'>Copyleft CIDESA 2007. Distribuido bajo la licencia GNU/GPL V2.0</font></strong></td>
          </tr>
          <tr>
            <td align="CENTER"><strong><font size='1'>Venezuela - Lara - Barquisimeto</font></strong></td>
          </tr>

        </table></tr>
</td>
</table>

</body>
</html>



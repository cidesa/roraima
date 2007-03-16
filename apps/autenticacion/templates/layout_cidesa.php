<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>
<?php use_helper('Javascript') ?>

<?php include_title() ?>

<link rel="shortcut icon" href="/favicon.ico" />

</head>
<body>
<table width="100%" align="center"><!--DWLayoutTable-->
  <tr>
	<td width="100%">
			<table width="100%" border="0" align="left" cellpadding="0"><!--DWLayoutTable-->
			<tr>
			  <td width="100%"><table width="100%" border="0" cellpadding="0" cellspacing="0"><!--DWLayoutTable-->
                <tr>
                  <td><img src="/images/borrar_01.jpg" width="309" height="89"></td>
                  <td rowspan="4" valign="top"><img src="/images/borrar_02.jpg" width="19" height="121" align="top"></td>
                  <td width="100%" rowspan="4" valign="top" background="/images/borrar_03.jpg"><img src="/images/borrar_03.jpg" width="11" height="121" align="top"></td>
                  <td valign="top"><img src="/images/borrar_04.jpg" width="341" height="89"></td>
                </tr>
                <tr>
                  <td rowspan="3" background="/images/borrar_05.jpg" valign="bottom"><span class="Quote Order">Usuario: <?php echo $sf_user->getAttribute('usuario','Sin Autenticar') ?> <br>
                    M&oacute;dulo: <?php echo $sf_context->getModuleName() ?></span></td>
                  <td valign="middle" background="/images/borrar_06.jpg" height="22" align="right"><a href=" /autenticacion_dev.php/login/logout">[Cerrar Sesi&oacute;n]</a>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                  <td valign="top"><img src="/images/borrar_07.jpg" width="341" height="2"></td>
                </tr>
                <tr>
                  <td valign="top"><img src="/images/borrar_08.jpg" width="341" height="8"></td>
                </tr><tr><td height="1"><img src="/images/spacer1.gif" alt="" width="266" height="1"></td><td><img src="/images/spacer1.gif" alt="" width="19" height="1"></td><td></td><td><img src="/images/spacer1.gif" alt="" width="341" height="1"></td></tr>
              </table>		      </td>
			</tr>  
		</table>
    </td>
  </tr>
<tr>
      <td valign="top" > 
        <table width="100%" border="0" cellpadding="0" cellspacing="0" >
          <!--DWLayoutTable-->
          <tr> 
            <td width="100%" height="56" ><?php echo $sf_data->getRaw('sf_content'); ?></td>
          </tr>
          <tr> 
            <td align="CENTER">Elaborado por Cidesa.<BR>
            <?php echo image_tag('poweredbyphp.png','size=75x50'); ?> <BR>
            Creado con PHP + Postgres
						</td>
          </tr>
        </table>  </tr>
</td>
</table>

</body>
</html>



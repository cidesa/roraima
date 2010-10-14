<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>

<?php if($params['archivo']=='S') {?>
<div id="divgriddatos" >
<table width="100%" >
  <tr>
    <th><strong><font color="#CC0000" size="4" face="Verdana, Arial, Helvetica, sans-serif"> <?php echo "Existe un Archivo Cargado haga click en Leer Archivo";?></font></strong></th>  
  </tr>
</table>
</div>

<?php } else { ?>
<div id="divgriddatos" >
<table width="100%" >
  <tr>
    <th><strong><font color="#CC0000" size="4" face="Verdana, Arial, Helvetica, sans-serif"> <?php echo "No hay Archivos Cargados, debe cargar un archivo primero";?></font></strong></th>
  </tr>
</table>
</div>
<?php }  ?>

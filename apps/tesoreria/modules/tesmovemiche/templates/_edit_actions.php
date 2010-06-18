<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/04 10:32:47
?>
<ul class="sf_admin_actions">
<li><input type="button" onclick="salvar2();" class="sf_admin_action_save" value="Guardar" name="save"/></li>
    <li><?php echo button_to(__('create'), 'tesmovemiche/create', array (
  'class' => 'sf_admin_action_create',
  'confirm' => '¿Desea crear un nuevo registro?. Perderá cualquier cambio en la ventana actual',
)) ?></li>
</ul>
<script language="JavaScript" type="text/javascript">
    var aprmonche='<?php echo $tscheemi->getAprmonche();?>';
    function salvar2()
    {
      if (aprmonche=='S')
      {
        var mondefche='<?php echo $tscheemi->getMontominche() ?>';
        var operacion=$('tscheemi_operacion').value;
        if (operacion=='ordpag')
            var monc=toFloat('tscheemi_montotordpag');
        else if (operacion=='compro')
            var monc=toFloat('tscheemi_montotcompro');
        else if (operacion=='precom')
            var monc=toFloat('tscheemi_montotprecom');
        else if (operacion=='pagdir')
            var monc=toFloat('tscheemi_totnetpagdir');
        else if (operacion=='pagnopre')
            var monc=toFloat('tscheemi_totnetpagnap');

        if (monc>mondefche)
        {
          if(confirm(" El Monto del Cheque es mayor al limite maximo permitido ¿Esta seguro de grabar?"))
          {
            f = document.sf_admin_edit_form;
            f.action = "/tesoreria_dev.php/tesmovemiche/save";
            f.submit();
          }else {
             f = document.sf_admin_edit_form;
             f.action = "/tesoreria_dev.php/tesmovemiche/index";
             f.submit();
          }
        }else {
            f = document.sf_admin_edit_form;
            f.action = "/tesoreria_dev.php/tesmovemiche/save";
            f.submit();
        }
      }else {
          f = document.sf_admin_edit_form;
          f.action = "/tesoreria_dev.php/tesmovemiche/save";
          f.submit();
      }
    }

</script>


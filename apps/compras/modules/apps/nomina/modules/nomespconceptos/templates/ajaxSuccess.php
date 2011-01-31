<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'SubmitClick', 'Javascript', 'Linktoapp') ?>
<form name="form1" id="form1">
<?
  echo grid_tag($obj);
?>
</form>

<?php

if ($mensaje!="")
{
?>
       <script type="text/javascript">
            mens='<? print $mensaje; ?>';
            alert(mens);
            $('npnomespnomtip_codnomesp').value="";
            $('npnomespnomtip_codnom').value="";
            $('npnomespnomtip_nomnom').value="";
            $('npnomespnomtip_nomnomesp').value="";
            $('npnomespnomtip_codnomesp').focus();
       </script>
<?php
}
?>

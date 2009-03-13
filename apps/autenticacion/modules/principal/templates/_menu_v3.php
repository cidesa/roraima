<?php
/*
 * Created on 25/03/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Javascript', 'Linktoapp') ?>
<?php echo javascript_include_tag('dojo/dojo') ?>
<?php echo stylesheet_tag('menu') ?>
<?php

$esreportes =  false;

function addNodo($nodo,$indice)
{

  global $esreporte;

  foreach($nodo as $k){
  	$val=explode('.',$k['nomyml']);
    if (SF_ENVIRONMENT=='dev') $dev = '_dev';
    else $dev = '';
  	?>
   <div dojoType="TreeNode" widgetId="<?php echo $indice ?>" title="<a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/autenticacion'.$dev.'.php/principal/menu/m/'.strtolower($val[0]) ?>'><?php echo $k['nomapl'] ?></a>"></div>
   <?php
    }
}


function addMenu($elmenu)
{
  $indice = 0;
  ?>
        <ul>
            <div dojoType="TreeSelector" widgetId="treeSelector" ></div>
            <div dojoType="Tree" widgetId="tree_widget" selector="treeSelector" toggler="fade">
              <?php addNodo($elmenu,$indice); ?>
            </div>
        </ul>
  <?php

}?>

<script type="text/javascript">
dojo.require("dojo.widget.Tree");
dojo.require("dojo.widget.TreeSelector");
dojo.require("dojo.widget.TreeNode");
dojo.require("dojo.widget.TreeContextMenu");
</script>

<?php

?>


<div name="contenedor">
<h3 align="center" class="siga">Sistema de Información Automatizado para la Integración de la Gestión Administrativa</h3>
<div class="panel-menu panel-inicial" align="left" >
</div>
<div class="panel-menu lista-central panel-central" align="left"> <!-- Panel del menú -->
<?php addMenu($menu); ?>
</div> <!-- Fin del panel -->
<div class="panel-menu panel-final" align="left" >
</div>
</div>

<?php echo javascript_tag("
  function popup(dir)
  {
    window.open(dir);
  }
") ?>



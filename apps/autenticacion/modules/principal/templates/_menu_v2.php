<?php use_helper('Javascript', 'Linktoapp') ?>

<?php echo javascript_include_tag('prototype_1_5_1') ?>

<?php echo javascript_include_tag('mootools') ?>

<?php echo javascript_include_tag('menu_v2') ?>

<?php echo stylesheet_tag('menu_v2', 'menu') ?>

<?php

function obtenerModulos()
{
  try{
    $modulos = array();
    if ($gestor = opendir(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'config/menus')) {
      while (false !== ($archivo = readdir($gestor))) {
        if(stristr($archivo, '.yml') !== FALSE) $modulos[] = $archivo;
      }
      closedir($gestor);
    }
    return $modulos;
  }catch(Exception $ex){return array();}

}

$modulos = obtenerModulos();
natsort($modulos);


?>
<div name="contenedor">
      <h3 align="center" class="siga">Sistema de Información Automatizado para la Integración de la Gestión Administrativa</h3>
<div class="panel-menu panel-inicial" align="left" style="width:18% !important;" >
</div>
<div class="panel-menu panel-central" style="width:900px !important;" >

      <div id="kwicks_container">
        <ul  id="kwicks">
          <?php foreach($modulos as $mod){?>

            <?php

              $dir = sfConfig::get('sf_root_dir').'/config/menus/'.strtolower($mod);
              $arraymod = explode('.',$mod);
              $mod = $arraymod[0];

              $menuyml = sfYaml::load($dir);

              //H::PrintR($menuyml); exit();

              if(isset($menuyml[$mod]['opciones']['activo']) && $menuyml[$mod]['opciones']['activo']==true){

                $imagen = $menuyml[$mod]['opciones']['imagen'];
                $nombre = $menuyml[$mod]['opciones']['nombre'];
                $descripcion = $menuyml[$mod]['opciones']['descripcion'];
?>
              <li id="kwick_<?php echo strtolower($mod) ?>" class="kwick" style="background: url('/images/<?php echo $imagen ?>'); repeat scroll 0% 50%;"><a href="<?php echo $_SERVER['PHP_SELF'].'/menu/m/'.strtolower($mod) ?>" class="kwick" ></a></li>
<?php
              }

      }?>

        </ul>
        <span class="clr"><!-- spanner --></span>
      </div>
</div>
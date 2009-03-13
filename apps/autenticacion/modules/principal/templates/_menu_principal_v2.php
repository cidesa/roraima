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
$menustring = array();
$arrlis=array();

if(file_exists(sfConfig::get('app_reportes').'/reportes/'.strtolower($modulo)))
{
	$directorio=opendir(sfConfig::get('app_reportes').'/reportes/'.strtolower($modulo));	  
	
	while ($elemento = readdir($directorio))
	{
		if(strrpos(strtolower($elemento),".php"))
		  $arrlis[]= strtolower($elemento);
	}	
}
function addNodo($nodo,$indice,$dirs,$dir = '',$nombrenodopadre='Nodo Padre',$arrlis)
{
  global $esreporte;
	global $menustring;

  foreach($nodo as $k => $val){
    if(is_array($val)) {
      ?>
      <div dojoType="TreeNode" widgetId="<?php echo $indice ?>" title="<?php echo $k ?>">
      <?php
      if(strtolower($k)=='reportes') $esreporte = true;
      $indice++;
      if(!esDefault($k,$dirs)) $dir = buscarUrl($k,$dirs);
      //else $dir_ = $dir;
      if($dir=='') $dir = buscarUrl($k,$dirs);
      //print $dir;
      addNodo($val,$indice,$dirs,$dir,$k,$arrlis);
      ?>
      </div>
      <?php
    }else{
      if(!esDefault($k,$dirs)) $dir_ = buscarUrl($k,$dirs);
      else{
        if($dir=='') $dir_ = buscarUrl($k,$dirs);
        else $dir_ = $dir;
      }
      //if($esreporte){
			$menustring[] = $nombrenodopadre.' : '.$k;
		if($arrlis)			
		{
			if((!in_array(strtolower($val),$arrlis)) && (strrpos(strtolower($val),".php")))		
			$val='basereporte.php?r='.str_replace('.php','',$val);		  	
		}	  
	
      ?>
        <?php echo javascript_tag("dir".str_replace(array('.','?','=','/'),'',$val)."='".'http://'.$_SERVER['HTTP_HOST'].'/'.$dir_.'/'.strtolower($val)."'; nombre".str_replace(array('.','?','=','/'),'',$val)."='".$k."' ;") ?>
        <div dojoType="TreeNode" widgetId="<?php echo $indice ?>" title="<a href='javascript: var w = window.open(<?php echo "dir".str_replace(array('.','?','=','/'),'',$val)?>,<?php echo "nombre".str_replace(array('.','?','=','/'),'',$val) ?>,params);'><?php echo $k ?></a>"></div>
      <?php
      //}else{
      ?>
      <!--  <div dojoType="TreeNode" widgetId="<?php echo $indice ?>" title="<a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/'.$dir_.'/'.strtolower($val) ?>'><?php echo $k ?></a>"></div> -->
      <?php
     // }
    }
    if(!esDefault($k,$dirs))  $dir='';
  }
}


function addMenu($elmenu,$direcciones,$imgs,$imagen,$nombre,$arrlis)
{
  $indice = 0;
  ?>
  <h1 class="<?php echo $imagen ?>"><?php echo $nombre ?></h1>
        <ul>
            <div dojoType="TreeSelector" widgetId="treeSelector"></div>
            <div dojoType="Tree" widgetId="tree_widget" selector="treeSelector" toggler="fade">
              <?php addNodo($elmenu,$indice,$direcciones,'','',$arrlis); ?>
            </div>
        </ul>
  <?php

}

function obtenerModulos()
{
  try{
    $modulos = array();
    if ($gestor = opendir('fuentes/siga/config/menus')) {
      while (false !== ($archivo = readdir($gestor))) {
        if(stristr($archivo, '.yml') !== FALSE) $modulos[] = $archivo;
      }
      closedir($gestor);
    }
    return $modulos;
  }catch(Exception $ex){return array();}

}

function buscarUrl($modulo,$urls)
{
  if(isset($urls[$modulo])){
    if(isset($urls[$modulo]['modulo'])){
      if (SF_ENVIRONMENT=='dev') return $urls[$modulo]['modulo_dev'];
      else return $urls[$modulo]['modulo'];
    }
    elseif(isset($urls[$modulo]['absoluta'])) return $urls[$modulo]['absoluta'];
    else{
      if(isset($urls['default']['modulo'])){
        if (SF_ENVIRONMENT=='dev') return $urls['default']['modulo_dev'];
        else return $urls['default']['modulo'];
      }
      elseif(isset($urls['default']['absoluta'])) return $urls['default']['absoluta'];
      else return '';
    }
  }else{
    if(isset($urls['default']['modulo'])){
      if (SF_ENVIRONMENT=='dev') return $urls['default']['modulo_dev'];
      else return $urls['default']['modulo'];
    }
    elseif(isset($urls['default']['absoluta'])) return $urls['default']['absoluta'];
    else return '';
  }
}

function esDefault($modulo,$urls)
{
  if(isset($urls[$modulo])){
    if(isset($urls[$modulo]['modulo'])){
      return false;
    }
    elseif(isset($urls[$modulo]['absoluta'])) return false;
    else{
      if(isset($urls['default']['modulo'])){
        return false;
      }
      elseif(isset($urls['default']['absoluta'])) return false;
      else return false;
    }
  }else{
    if(isset($urls['default']['modulo'])){
      return true;
    }
    elseif(isset($urls['default']['absoluta'])) return true;
    else return false;
  }
}

function buscarImagen($img,$imgs)
{
  if(isset($imgs[$img])){
    return $imgs[$img];
  }else{
    if(isset($imgs['default'])) return $imgs['default'];
    else return '';
  }
}


?>

<script type="text/javascript">
dojo.require("dojo.widget.Tree");
dojo.require("dojo.widget.TreeSelector");
dojo.require("dojo.widget.TreeNode");
dojo.require("dojo.widget.TreeContextMenu");
</script>

<?php

  $dir = sfConfig::get('sf_root_dir').'/config/menus/'.strtolower($modulo).'.yml';

  $menuyml = sfYaml::load($dir);

  $dirreportes = sfConfig::get('app_reportes').'/reportes/reportes.yml';

  $menureportesyml = sfYaml::load($dirreportes);

//  $modulo = substr($mod,0,strlen($mod)-4);

  $imagen = $menuyml[$modulo]['opciones']['imagen'];
  $nombre = $menuyml[$modulo]['opciones']['nombre'];
  $urls = $menuyml[$modulo]['opciones']['urls'];
  $imagenes = $menuyml[$modulo]['opciones']['imagenes'];


  $menu = $menuyml[$modulo]['menu'];

  if(is_array($menureportesyml)){
    if(array_key_exists(strtolower($modulo),$menureportesyml)) $menu['Reportes'] = $menureportesyml[strtolower($modulo)];
  }

  if(is_array($menureportesyml)){
    if(array_key_exists(strtolower($modulo.'_urls'),$menureportesyml)) $urls = array_merge($urls,$menureportesyml[strtolower($modulo).'_urls']) ;
  }

	//$menulineal = H::array_lineal($menu);
	
	//foreach($menulineal as $mod) echo $mod.'<br>';


?>

<?php echo javascript_tag("ancho=screen.availWidth; alto=screen.availHeight; nombre = ''; params = 'dependent=1,toolbar=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1,width=ancho,height=alto';") ?>


<div name="contenedor">
<div class="panel-menu panel-inicial" align="left" >
</div>
<div class="panel-menu lista-central panel-central" align="left" > <!-- Panel del menú -->
<?php addMenu($menu,$urls,$imagenes,$imagen,$nombre,$arrlis); ?>
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




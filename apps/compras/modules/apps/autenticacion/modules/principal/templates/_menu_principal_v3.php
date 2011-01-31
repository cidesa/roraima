<?php
/*
 * Created on 25/03/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Javascript', 'Linktoapp', 'tabs') ?>
<?php echo stylesheet_tag('menu_principal_v3', 'mootabs') ?>
<?php echo javascript_include_tag('mootools', 'mootabs') ?>
<?php

  $dir = sfConfig::get('sf_root_dir').'/config/menus/'.strtolower($modulo).'.yml';

  $menuyml = sfYaml::load($dir);

//  $modulo = substr($mod,0,strlen($mod)-4);

  $imagen = $menuyml[$modulo]['opciones']['imagen'];
  $nombre = $menuyml[$modulo]['opciones']['nombre'];
  $urls = $menuyml[$modulo]['opciones']['urls'];
  $imagenes = $menuyml[$modulo]['opciones']['imagenes'];


  $menu = $menuyml[$modulo]['menu'];



// 22:06
?>
<div>
<div class="panel-menu panel-inicial" align="left" >
</div>
<div class="panel-menu lista-central panel-central" align="left" > <!-- Panel del menú -->
      <div class="mootabs" id="myTabs">
      <ul class="mootabs_title">
<?php
$i=1;
foreach($menu as $k => $m){
    echo '<li title="Tab'.$i.'">';
    echo $k;
    echo '</li>';
    $i++;
}
?>
      </ul>
<?php
$i=1;
foreach($menu as $k => $m){
  echo '<div id="Tab'.$i.'" class="mootabs_panel active" >';
  echo '<ul>';
  foreach($m as $opcion => $mod){
    echo '<li>';
    if(!is_array($mod)) echo link_to($opcion,'http://'.$_SERVER['HTTP_HOST'].'/dir/'.strtolower($mod));
    else echo link_to($opcion,'http://'.$_SERVER['HTTP_HOST'].'/dir/'.strtolower($opcion));
    echo '</li>';
  }
  echo '</ul>';
  echo '</div>';
  $i++;

}
?>
</div>
</div> <!-- Fin del panel -->
<div class="panel-menu panel-final" align="left" >
</div>
</div>


<script type="text/javascript" charset="utf-8">

      window.addEvent('domready', init);
      function init() {
        options = {
          width: '600px',
          height: '250px',
          changeTransition: 'none',
          duration: 1000,
          mouseOverClass: 'over',
          activateOnLoad: 'first',
        }

        myTabs1 = new mootabs('myTabs', options);

        //myTabs1.addTab('Tab1', 'Tab 1 Label', 'Content of tab1');

      }
</script>



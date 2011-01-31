<?php

/**
 * cross_app_link_to: Función para generar un link entre aplicaciones.
 * La version 1.0 de symfony no lo soporta y por eso se creo una helper para realizar el link
 * entre aplicaciones
 *
 * @package    Roraima
 * @subpackage helper
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
function cross_app_link_to($app, $route, $args=null)
{
  /* get the host to build the absolute paths
     needed because this menu lets switch between sf apps
  */
  $host = sfContext::getInstance()->getRequest()->getHost() ;
  /* get the current environment. Needed to switch between the apps preserving
     the environment
  */
  $env = sfConfig::get('sf_environment');
  /* get the routing file
  */
  $appRoutingFile = SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.$app.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'routing.yml' ;
  /* get the route in the routing file */
  /* first, substract the @ from the route name */
  //$route = substr($route, 1, strlen($route)) ;
  if (file_exists($appRoutingFile))
  {
    $yml = sfYaml::load($appRoutingFile) ;
    if(isset($yml[$route]['url'])) $routeUrl = $yml[$route]['url'];
    else $routeUrl=$route;
    if ($args)
    {
      foreach ($args as $k => $v)
      {
        $routeUrl = str_replace(':'.$k, $v, $routeUrl) ;
      }
    }
    if (strrpos($routeUrl, '*') == strlen($routeUrl)-1)
    {
      $routeUrl = substr($routeUrl, 0, strlen($routeUrl)-2) ;
    }
  }
  if ($env == 'dev')
  {
  	  $path = 'http://' . $host . '/' . $app . '_dev.php' . $routeUrl ;
  }
  else
  {
  	$path = 'http://' . $host . '/' . $app . '.php' . $routeUrl ;
  	//$path = 'http://' . $host . $routeUrl ;
  }
  return $path ;
}

?>

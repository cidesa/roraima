<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'nptipcon'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
 class NptipconPeer extends BaseNptipconPeer
{
    public static function getDestipcon($codigo)
     {
   	  $c=new Criteria();
   	  $c->add(NptipconPeer::CODTIPCON,$codigo);
   	  $per = NptipconPeer::doSelectOne($c);
   	  if ($per)
  	  return $per->getDestipcon();
      else
      return '';
      }

    public static function getDestipcon_vacio($codigo)
     {
      $desc = Herramientas::getX_vacio('CODTIPCON','Nptipcon','DesTipCon',str_pad($codigo,3,'0',STR_PAD_LEFT));
      if ($desc)
      	return $desc;
      else
      	return '';
   }
}

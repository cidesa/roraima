<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'bnregsem'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class BnregsemPeer extends BaseBnregsemPeer
{
  public static function getCodsem($codigo)
  {
    return Herramientas::getX_vacio('CODACT','Bnregsem','codsem',trim($codigo));
  }

  public static function getCodact($codigo)
  {
    return Herramientas::getX_vacio('CODACT','Bnregsem','codact',trim($codigo));
  }


  public static function getDessem22($codigo1,$codigo2)
  {
    return Herramientas::getXx('Bnregsem',array('CODACT','CODSEM'),array(trim($codigo1),trim($codigo2)),'Dessem');
  }

  public static function getDessem($cod)
  {
        return Herramientas::getX_vacio('codact','bnregsem','dessem',trim($cod));
  }

}

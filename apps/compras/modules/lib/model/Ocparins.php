<?php

/**
 * Subclass for representing a row from the 'ocparins'.
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
class Ocparins extends BaseOcparins
{

  public function getDespar(){

    return Herramientas::getX('codpar','ocdefpar','despar',self::getCodpar());

  }

  public function getCancon(){

    $e= new Criteria();
    $e->add(OcparconPeer::CODCON,self::getCodcon());
    $e->add(OcparconPeer::CODPAR,self::getCodpar());
    $dato= OcparconPeer::doSelectOne($e);
    if ($dato)
    {
    	$cantidad=$dato->getCancon();
    }else { $cantidad=0;}
    return $cantidad;

  }

  public function getAbrUni(){

    $coduni = Herramientas::getX('codpar','ocdefpar','coduni',self::getCodpar());
    return Herramientas::getX('coduni','ocunidad','abruni',$coduni);

  }


}

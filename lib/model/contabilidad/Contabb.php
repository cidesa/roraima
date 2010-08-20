<?php

/**
 * Subclase para representar una fila de la tabla 'contabb'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.contabilidad
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Contabb.php 32405 2009-09-01 21:27:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Contabb extends BaseContabb
{

  public function getCodigo1(){
   return self::getCodcta();
  }
  public function getNombre1(){
   return self::getDescta();
  }

  public function getDesrede(){
    return Herramientas::getX('codcta','contabb','descta',self::getCodcta());
  }

  public function getFueing(){
    return self::getCodcta();
  }

  public function getDescta2(){
    return self::getDescta();
  }


}

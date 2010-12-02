<?php

/**
 * Subclase para representar una fila de la tabla 'caentord'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Caentord extends BaseCaentord
{
  public function getNomalm()
    {
      return Herramientas::getX('CODALM','Cadefalm','Nomalm',self::getCodalm());
    }

  public function getDesart()
    {
      return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
}
}

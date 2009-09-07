<?php

/**
 * Subclass for representing a row from the 'ocoferpre'.
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
class Ocoferpre extends BaseOcoferpre
{
  protected $objpartidas=array();
  //protected $montot;
  protected $canval;
  protected $canfin;

  public function getNompro()
  {
    return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
  }

  public function getDesobr()
  {
    return Herramientas::getX('CODOBR','Ocregobr','desobr',self::getCodobr());
  }

  public function getDespar()
  {
    return Herramientas::getX('CODPAR','Ocdefpar','despar',self::getCodpar());
  }

   public function getCoduni()
  {
    return Herramientas::getX('CODPAR','Ocdefpar','coduni',self::getCodpar());
  }
}

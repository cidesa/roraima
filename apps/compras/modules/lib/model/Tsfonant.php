<?php

/**
 * Subclase para representar una fila de la tabla 'tsfonant'.
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
class Tsfonant extends BaseTsfonant
{
 protected $obj=array();
  protected $nomben="";
  protected $ctapag="";
  protected $agregabenefi="N";
  protected $numcue="";
  protected $tipdoc="";
  protected $check="";

  public function getNomben()
  {
   return Herramientas::getX('CEDRIF','Opbenefi','Nomben',self::getCedrif());
  }

  public function getCtapag()
  {
   return Herramientas::getX('CEDRIF','Opbenefi','Codcta',self::getCedrif());
  }
}

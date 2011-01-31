<?php

/**
 * Subclass for representing a row from the 'famovaju'.
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
class Famovaju extends BaseFamovaju
{
    protected $monaju="0,00";
    protected $canlotreal="0,00";
    protected $canpuedaju="0,00";
    protected $canrealped="0,00";
    protected $canrealdes="0,00";
    protected $candistrib="0,00";
    protected $tipo="0,00";
    protected $fecven="";
    protected $exist="0,00";

  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }

    public function afterHydrate()
  {
    $val=self::getMontot() - self::getRecaju();
    $this->monaju=number_format($val, 2, ',', '.');
    if (self::getCanaju()<0)
       $this->canaju= $this->canaju*-1;
  }

    public function getTipo()
  {
   return Herramientas::getX('CODART','Caregart','Tipo',self::getCodart());
  }

}

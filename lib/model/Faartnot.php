<?php

/**
 * Subclass for representing a row from the 'faartnot'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author:dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:Faartnot.php 33699 2009-10-01 22:15:36Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Faartnot extends BaseFaartnot
{
	protected $canentregar="0,00";
	protected $canajustada="0,00";
	protected $montot="0,00";
	protected $canord="0,00";
        protected $monaju="0,00";
        protected $canlotreal="0,00";
        protected $canpuedaju="0,00";
        protected $canrealped="0,00";
        protected $canrealdes="0,00";
        protected $candistrib="0,00";
        protected $tipo="";
        protected $preaju="0,00";
        protected $ajupre="0,00";
        protected $recaju="0,00";
        protected $fecven="";
        protected $exist="0,00";


  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }

  public function getNomalm()
  {
   return Herramientas::getX('CODALM','Cadefalm','Nomalm',self::getCodalm());
  }

  public function getTipo()
  {
   return Herramientas::getX('CODART','Caregart','Tipo',self::getCodart());
  }

  /*public function getCanord()
  {
  	$val=self::getCanent() + self::getCandes();
    return $val;
  }*/

  public function afterHydrate()
  {
    $this->canord=number_format(self::getCanent(), 2, ',', '.');
    $val=self::getPreart() * self::getCanent();
    $this->montot=number_format($val, 2, ',', '.');
    $this->preaju=number_format(self::getPreart(), 2, ',', '.');

    $t= new Criteria();
    $t->add(FadeflotPeer::NUMLOT,self::getNumlot());
    $t->add(FadeflotPeer::CODALM,self::getCodalm());
    $t->add(FadeflotPeer::CODART,self::getCodart());
    $reg= FadeflotPeer::doSelectOne($t);
    if ($reg)
    {
        $this->fecven=$reg->getFecven();
        $this->canlotreal=$reg->getCanlot();
        if ($this->canord<=$reg->getCanlot())
        {  $this->exist=$reg->getCanlot()-$this->canord; }
        else {
          $this->exist=0;
          $this->canord=$reg->getCanlot();
        }
    }

  }
}

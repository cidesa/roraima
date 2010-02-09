<?php

/**
 * Subclass for representing a row from the 'cpprecom'.
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
class Cpprecom extends BaseCpprecom
{
  protected $salpre = 0;
  protected $msganulado="";
  protected $nomext="";
  protected $nomben="";

   public function getMsganulado(){
   	$c = new Criteria();
    $c->add(CpprecomPeer::REFPRC,$this->getRefprc());
    $reg = CpprecomPeer::doSelectOne($c);

	if($reg){
		if($reg->getFecanu()){
		   	return "ANULADO EL ".$reg->getFecanu2();
		}else return "";
	}
  }

   public function afterHydrate(){
   	$this->nomext=H::getX('TIPPRC','Cpdocprc','Nomext',$this->getTipprc());
   	$this->nomben=H::getX('CEDRIF','Opbenefi','Nomben',$this->getCedrif());
    $this->salpre = $this->getMonprc() - $this->getSalaju();
  }

  public function getRefmov()
  {
    return self::getRefprc();
  }

  public function getFecanu2($format = 'd/m/Y') {
    	return parent::getFecanu($format);
    }
}

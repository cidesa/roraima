<?php

/**
 * Subclass for representing a row from the 'faajuste'.
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
class Faajuste extends BaseFaajuste
{
	public $obj = array();

	protected  $codpro = "";
        protected  $rifpro = "";
        protected  $nompro = "";
        protected  $dirpro = "";
        protected  $telpro = "";

   public function afterHydrate()
  {
    if (self::getTipaju() == 'P'){
            $c1 = new Criteria();
            $c1->add(FapedidoPeer::NROPED, self::getCodref());
            $reg1 = FapedidoPeer::doSelectOne($c1);
            if ($reg1){
                    $this->codpro = $reg1->getCodcli();
            }
    }
    else if (self::getTipaju() == 'NE'){
            $c1 = new Criteria();
            $c1->add(FanotentPeer::NRONOT, self::getCodref());
            $reg1 = FanotentPeer::doSelectOne($c1);
            if ($reg1){
                    $this->codpro = $reg1->getCodcli();
            }
    }
    else if (self::getTipaju() == 'F'){
            $c1 = new Criteria();
            $c1->add(FafacturPeer::REFFAC, self::getCodref());
            $reg1 = FafacturPeer::doSelectOne($c1);
            if ($reg1){
                    $this->codpro = $reg1->getCodcli();
            }
    }
  }

/*	public function getCodpro()
    {
    	$codpro = '';
        $c = new Criteria();
  		$c->add(FaajustePeer::REFAJU,self::getRefaju());
  		$datos = FaajustePeer::doSelectOne($c);
  		if ($datos){
			if ($datos->getTipaju() == 'P'){
				$c1 = new Criteria();
				$c1->add(FapedidoPeer::NROPED, $datos->getCodref());
				$reg1 = FapedidoPeer::doSelectOne($c1);
				if ($reg1){
					$codpro = $reg1->getCodcli();
				}
			}
			else if ($datos->getTipaju() == 'NE'){
				$c1 = new Criteria();
				$c1->add(FanotentPeer::NRONOT, $datos->getCodref());
				$reg1 = FanotentPeer::doSelectOne($c1);
				if ($reg1){
					$codpro = $reg1->getCodcli();
				}
			}
			else if ($datos->getTipaju() == 'F'){
				$c1 = new Criteria();
				$c1->add(FafacturPeer::REFFAC, $datos->getCodref());
				$reg1 = FafacturPeer::doSelectOne($c1);
				if ($reg1){
					$codpro = $reg1->getCodcli();
				}
			}
  		}
  		else{
  			$codpro = '';
  		}

        return $codpro;
    }*/

	public function getRifpro()
    {
        return Herramientas::getX('CODPRO','Facliente','Rifpro',$this->codpro);
    }

    public function getNompro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Nompro',$this->codpro);
    }

    public function getDirpro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Dirpro',$this->codpro);
    }

    public function getTelpro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Telpro',$this->codpro);
    }

}

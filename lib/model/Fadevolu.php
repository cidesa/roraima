<?php

/**
 * Subclass for representing a row from the 'fadevolu'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fadevolu.php 33699 2009-10-01 22:15:36Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fadevolu extends BaseFadevolu
{
	public $obj = array();

	public $codpro = '';

	public function getCodpro()
    {
        $c = new Criteria();
  		$c->add(CadphartPeer::DPHART,self::getRefdes());
  		$datos = CadphartPeer::doSelectOne($c);

  		if ($datos){
			if ($datos->getTipref() == 'R'){
				$codpro = $datos->getCodcli();
			}
			else if ($datos->getTipref() == 'P'){
				$c1 = new Criteria();
				$c1->add(FapedidoPeer::NROPED, $datos->getReqart());
				$reg1 = FapedidoPeer::doSelectOne($c);
				if ($reg1){
					$codpro = $reg1->getCodcli();
				}
			}
			else if ($datos->getTipref() == 'F'){
				$c1 = new Criteria();
				$c1->add(FafacturPeer::REFFAC, $datos->getReqart());
				$reg1 = FafacturPeer::doSelectOne($c);
				if ($reg1){
					$codpro = $reg1->getCodcli();
				}
			}
  		}
  		else{
  			$codpro = '';
  		}

        return $codpro;
    }

	public function getRifpro()
    {
        return Herramientas::getX('CODPRO','Facliente','Rifpro',self::getCodpro());
    }

    public function getNompro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Nompro',self::getCodpro());
    }

    public function getDirpro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Dirpro',self::getCodpro());
    }

    public function getTelpro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Telpro',self::getCodpro());
    }

}

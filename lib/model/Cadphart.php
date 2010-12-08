<?php

/**
 * Subclass for representing a row from the 'cadphart'.
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
class Cadphart extends BaseCadphart
{
   protected $check="";

   public function getMondph($val=false)
	{
		return parent::getMondph(true);
	}

    public function getRifpro()
    {
        return Herramientas::getX('CODPRO','Facliente','Rifpro',self::getCodcli());
    }

    public function getNompro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Nompro',self::getCodcli());
    }

    public function getDirpro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Dirpro',self::getCodcli());
    }

    public function getTelpro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Telpro',self::getCodcli());
    }

   public function getNomcat()
	{
		//return Herramientas::getX('CODCAT','Npcatpre','Nomcat',self::getCodori());
	    return Herramientas::getX('CODUBI','Bnubica','Desubi',self::getCodori());
	}

	public function getNomalm()
	{
		return Herramientas::getX('CODALM','Cadefalm','Nomalm',self::getCodalm());
	}

	public function getDesreq()
	{
		return Herramientas::getX('REQART','Careqart','Desreq',self::getReqart());
	}

	public function getFecreq()
	{
		return Herramientas::getX('REQART','Careqart','Fecreq',self::getReqart());
	}

	public function getNomubi()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',self::getCodubi());
	}

  public function getDescen()
  {
	return Herramientas::getX('CODCEN','Cadefcen','Descen',self::getCodcen());
  }

    public function getManartlot()
    {
            return H::getConfApp2('manartlot', 'compras', 'almregart');
    }
}


<?php
/**
 * Subclass for representing a row from the 'fcreginm'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcreginm.php 32426 2009-09-02 03:49:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcreginm extends BaseFcreginm
{
    protected $nacconcon="";
    protected $tipconcon="";
    protected $nacconrep="";
    protected $tipconrep="";
    protected $codusoinm="";
    /*Dueño anterior*/
    protected $rifpre="";
    protected $fcconrepdircon="";
    protected $fcconrepnomcon="";
    /* otros */
    protected $mascara= "";
    protected $grid= array();
    protected $gridcomplemento= array();
    protected $codestinm="";
    protected $desestinm="";
    protected $anoava="";
    //protected $rifpre="";
    protected $codzon="";
    protected $deszon="";
    protected $total_avaluo="";
    protected $rifconant="";
    protected $rifrepant="";


  public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      $this->codestinm = Herramientas::getX_vacio('nroinm','fcdetinm','codestinm',self::getNroinm());
      $this->desestinm = Herramientas::getX_vacio('nroinm','fcdetinm','desestinm',self::getNroinm());
      $this->anoava    = Herramientas::getX_vacio('nroinm','fcdetinm','anoava',self::getNroinm());
      $this->codzon    = Herramientas::getX_vacio('nroinm','fcdetinm','codzon',self::getNroinm());
      $this->mensaje = self::getEstinm()=='D' ? 'DESINCORPORADO' : '' ;

  //    $this->deszon=Herramientas::getX_vacio('nroinm','fcdetinm','deszon',self::getNroinm());
//Select a.*,b.desestinm,c.deszon,c.destip,c.anual,c.valmtr from FCDetInm a,FCEstInm b,FCValInm c where a.NroInm='" + DatosIns(0).Text + "' and a.AnoAva=(Select max(AnoAva) from FCDetInm where NroInm='" + DatosIns(0).Text + "') and a.codest=b.codestinm and a.codzon=c.codzon and a.codtip=c.codtip and (a.anoava=c.anovig or c.anovig=(Select Max(AnoVig) From FCValInm where anovig<=a.anoava)) order by a.AnoCon,a.CodTip

      $c = new Criteria();
      $c->add(FctrainmPeer::NROINM,self::getNroinm());
      $reg = FctrainmPeer::doSelectOne($c);
      if ($reg)
      {
       $c = new Criteria();
       $c->add(FconrepPeer::RIFCON,$reg->getRifcon());
       $regi = FconrepPeer::doSelectOne($c);
       if ($regi)
       {
         $this->rifpre=$regi->getRifcon();
         $this->fcconrepnomcon=$regi->getNomcon();
         $this->fcconrepdircon=$regi->getDircon();

       }

         $this->numtras   = $reg->getNumtras();
         $this->fectra    = $reg->getFectra();
         $this->funrectra = $reg->getFunrectra();
         $this->rifconant = $reg->getRifconant();
         $this->nomconant = Herramientas::getX('rifcon','fcconrep','nomcon',$reg->getRifconant());
         $this->rifrepant = $reg->getRifrepant();
         $this->nomrepant = Herramientas::getX('rifcon','fcconrep','nomcon',$reg->getRifrepant());

      }
      else
      {
         //$this->rifpre="";
         //$this->fcconrepnomcon="";
         //$this->fcconrepdircon="";
      }
   }

    public function getRifconant()
    {
      return '55';
    }


    public function getCatcon()
    {
      return self::getCodcatinm();
    }

    public function getNomcatrasto()
    {
  	  return self::getNomcon();
    }

	public function getNacconcon()
	{
		return Herramientas::getX('rifcon','Fcconrep','naccon',self::getRifcon());
	}

	public function getTipconcon()
	{
		return Herramientas::getX('rifcon','Fcconrep','tipcon',self::getRifcon());
	}

	public function getNacconrep()
	{
		return Herramientas::getX('rifcon','Fcconrep','naccon',self::getRifrep());
	}

	public function getTipconrep()
	{
		return Herramientas::getX('rifcon','Fcconrep','tipcon',self::getRifrep());
	}


	public function getDesubicat()
	{
		return Herramientas::getX('codcatinm','fcreginm','nomcon',self::getCodcatinm());
	}

	public function getNomcatfis()
	{
		return Herramientas::getX('codcatfis','Fccatfis','nomcatfis',self::getCodcatfis());
	}

	public function getNomcarinm()
	{
		return Herramientas::getX('Codcarinm','fccarinm','nomcarinm',self::getCodcarinm());
	}

	public function getDeszon()
	{
		return Herramientas::getX('Codzon','fcvalinm','deszon',Herramientas::getX_vacio('Nroinm','fcdetinm','codzon',self::getNroinm()));
	}

    /*public function getCodusoinm()
    {
       return self::getCoduso();
    }*/

	public function getDescripcionuso()
	{
		return Herramientas::getX('codusoinm','Fcusoinm','nomusoinm',self::getCoduso());
	}

	public function getDescripcioncodsit()
	{
		return Herramientas::getX('codsitinm','fcsitjurinm','nomsitinm',self::getCodsitinm());
	}

	public function getNomconrep()
	{
		return Herramientas::getX('rifcon','fcconrep','nomcon',self::getRifrep());
	}
}


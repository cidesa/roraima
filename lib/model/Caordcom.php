<?php

/**
 * Subclass for representing a row from the 'caordcom'.
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
class Caordcom extends BaseCaordcom
{
    private $rifpro ='';
    private $codconpag ='';
    private $codforent ='';
    protected $codigoproveedor='';
    protected $reptipcom='';
    protected $genctaord=null;
    protected $totrecargo="0,00";
    protected $totorden="0,00";
    protected $genctaalc="";
    private $eti="";
    protected $tipopro="";
    protected $compro="";
    protected $oculsave="";
    protected $manorddon="";
    protected $traemot="";


    public function getReptipcom()
    {
      $rep = Constantes::ListaReportesOrdenCompras();
      //print $this->tipord;
      if(array_key_exists($this->tipord,$rep)) return $rep[$this->tipord];
      else return 'carordpre.php';
    }
    protected $partrec="";

      public function getNompro()
    {
      return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
    }

      /*public function getMonord($val=false)
    {
      return parent::getMonord(true);
    }*/



    public function getCodconpag()//Condición de pago
    {
      if (self::getId() && $this->codconpag=='')
        return Herramientas::getX_vacio('ordcom','Caordconpag','codconpag',self::getOrdcom());
      else
        return $this->codconpag;

    }


      public function getDesconpag()//Condición de pago
    {
      if (self::getId())
      {
        $c = new Criteria();
      $c->add(CaordconpagPeer::ORDCOM,self::getOrdcom());
      $c->addJoin(CaconpagPeer::CODCONPAG,CaordconpagPeer::CODCONPAG);
      $des = CaconpagPeer::doSelectone($c);
      if ($des){
        return $des->getDesconpag();
      }else{
        return ' ';
      }
      }
      else
      {
        $c = new Criteria();
      $c->add(CaconpagPeer::CODCONPAG,$this->codconpag);
      $des = CaconpagPeer::doSelectone($c);
      if ($des){
        return $des->getDesconpag();
      }else{
        return ' ';
      }
      }
    }


    public function getNomext()
    {
      return Herramientas::getX('tipcom','CpDocCom','nomext',self::getDoccom());
    }



    public function getDespro()
    {
      return Herramientas::getX('CODPRO','Catippro','Despro',self::getTippro());
    }

    public function getCodforent()
    {
      if (self::getId() && $this->codforent=='')
        return Herramientas::getX_vacio('ORDCOM','caordforent','Codforent',self::getOrdcom());
      else
        return $this->codforent;
    }

    public function getDesforent()
    {
      if (self::getId())
        return Herramientas::getX('codforent','caforent','Desforent',Herramientas::getX_vacio('ORDCOM','caordforent','Codforent',self::getOrdcom()));
      else
        return Herramientas::getX('codforent','caforent','Desforent',$this->codforent);
    }

    public function getNomfin()
    {
      return Herramientas::getX('codfin','ForTipFin','Nomext',self::getTipfin());
    }
    public function getDesubi()
    {
      return Herramientas::getX('codubi','bnubica','desubi',self::getCoduni());
    }
    public function getNomemp()
    {
      return Herramientas::getX('codemp','nphojint','nomemp',self::getCodemp());
    }
    public function getRefer()
    {
      return Herramientas::getX('refcom','CPCompro','RefPrc',self::getOrdcom());
    }

    public function getRifpro()
    {
    return Herramientas::getX_vacio('codpro','caprovee','rifpro',self::getCodpro());
    }

    public function getRifpro_()
    {
    return $this->rifpro;
    }

    public function setRifpro($val)
    {
      $this->rifpro = $val;
    }

    public function setCodconpag($val)
    {
      $this->codconpag = $val;
    }

    public function setCodforent($val)
    {
      $this->codforent = $val;
    }

    public function AfectaDisponibilidad()
    {
      $refiere = Herramientas::getX('tipcom','CPdoccom','afedis',self::getDoccom());
      if($refiere=='R') return true;
      else return false;
    }


    public function getGenctaord()
    {
      $d= new Criteria();
      $data=OpdefempPeer::doSelectOne($d);
      if ($data)
      {
      	$si=$data->getGenctaord();
      }else $si=null;
      return $si;
    }

    public function getGencomalc()
    {
      $d= new Criteria();
      $data=OpdefempPeer::doSelectOne($d);
      if ($data)
      {
      	$si=$data->getGencomalc();
      }else $si=null;
      return $si;
    }

    public function getEti()
    {
     if (self::getId())
     {
     if (self::getOrdcom()!="")
     {
      if (self::getStaord()=='N')
      {
      	$si="Anulada el ".date('d/m/Y',strtotime(self::getFecanu()));
      }else{
        $c= new Criteria();
        $c->add(CpimpcauPeer::REFERE,self::getOrdcom());
        $c->add(CpimpcauPeer::STAIMP,'N',Criteria::NOT_EQUAL);
        $data= CpimpcauPeer::doSelectOne($c);
        if ($data)
        {
          $d= new Criteria();
          $d->add(OpordchePeer::NUMORD,$data->getNumord());
          $reg= OpordchePeer::doSelectOne($d);
          if ($reg)
          {
          	$fecha=H::getX('NUMCHE','Tscheemi','fecemi',$reg->getNumche());
          	$si="Pagada con el N° de Cheque: ".$reg->getNumche()." el ".date('d/m/Y',strtotime($fecha));
          }else{
          	$fecha=H::getX('refcau','cpcausad','feccau',$data->getRefcau());
          	$si="Causada con N° de Orden ".$data->getRefcau()." el ".date('d/m/Y',strtotime($fecha));
          }
        }else $si="Pendiente por Causar";
      }
     }else { $si="";}
     }else { $si="";}

   return $si;
    }


  public function getCompro()
  {
  	  $d= new Criteria();
  	  $d->add(CpcomproPeer::REFCOM,self::getOrdcom());
  	  $resul= CpcomproPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	return 'S';
  	  }else return 'N';
  }

  public function setCompro()
  {
  	return $this->compro;
  }

  public function getOculsave()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almordcom',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('oculsave',$varemp['aplicacion']['compras']['modulos']['almordcom']))
	       {
	       	$dato=$varemp['aplicacion']['compras']['modulos']['almordcom']['oculsave'];
	       }
         }
     return $dato;
  }

  public function setOculsave()
  {
  	return $this->oculsave;
  }

  public function getDescen()
  {
	return Herramientas::getX('CODCEN','Cadefcen','Descen',self::getCodcen());
  }

  public function getDescenaco()
  {
	return Herramientas::getX('CODCENACO','Cadefcenaco','Descenaco',self::getCodcenaco());
  }

    public function getEdaact()
  {
  	if (self::getFecdon())
  	{
		$sql = "select  Extract(year from age(now(),'" . self::getFecdon() . "')) as edad";
		if (Herramientas :: BuscarDatos($sql, & $result))
			return $result[0]['edad'];
		else
		    return self::getEdadon();
  	}
  	else
  	    return 0;
  }

  public function getManorddon()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almdefart',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('manorddon',$varemp['aplicacion']['compras']['modulos']['almdefart']))
	       {
	       	$dato=$varemp['aplicacion']['compras']['modulos']['almdefart']['manorddon'];
	       }
         }
     return $dato;
  }

  public function setManorddon()
  {
  	return $this->manorddon;
  }

  public function getTraemot()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almordcom',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('traemot',$varemp['aplicacion']['compras']['modulos']['almordcom']))
	       {
	       	$dato=$varemp['aplicacion']['compras']['modulos']['almordcom']['traemot'];
	       }
         }
     return $dato;
  }

  public function setTraemot()
  {
  	return $this->traemot;
  }

}

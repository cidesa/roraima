<?php

/**
 * Subclass for representing a row from the 'caordcom' table.
 *
 *
 *
 * @package lib.model
 */
class Caordcom extends BaseCaordcom
{
    private $rifpro ='';
    private $codconpag ='';
    private $codforent ='';
    protected $codigoproveedor='';
    protected $reptipcom='';

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

}

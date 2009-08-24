<?php

/**
 * Subclass for representing a row from the 'caartsol' table.
 *
 *
 *
 * @package lib.model
 */
class Caartsol extends BaseCaartsol
{
  private $codpre = '';
  private $canaju = 0.00;
  private $check = '';
  private $fecent = '';
  private $montot2 = 0.00;
  private $monrgo2 = 0.00;
  protected $codigopre="";
  protected $desartsol="";
  protected $datosrecargo="";
  protected $cancost="0,00";

   public function hydrate(ResultSet $rs, $startcol = 1)
   {
     parent::hydrate($rs, $startcol);
     $this->codigopre= self::getCodcat() ."-". self::getCodpar();
     if (self::getDesart())
      	$this->desartsol = self::getDesart();
      else
      	$this->desartsol =Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
    //Cargar en el campo datosrecargo del Grid Recargos, los recargo por artículo de la tabla Cadisrgo
     $calculo= self::getCanreq() * self::getCosto();
     $this->cancost=number_format($calculo,2,',','.');
     $this->datosrecargo="";
     $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
     $c= new Criteria();
	 $c->add(CadisrgoPeer::REQART,self::getReqart());
	 $c->add(CadisrgoPeer::CODART,self::getCodart());
	 $c->add(CadisrgoPeer::CODCAT,self::getCodcat());
	 $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
	 $result=CadisrgoPeer::doSelect($c);
	 if ($result)
	 {
        foreach ($result as $datos)
        {
           $monrgo=number_format($datos->getMonrgo(),2,',','.');
           $monrgoc=number_format($datos->getMonrgoc(),2,',','.');
           $this->datosrecargo=$this->datosrecargo . $datos->getCodrgo().'_' . $datos->getNomrgo().'_' . $monrgoc .'_'. $datos->getTiprgo().'_' . $monrgo .'_'. $datos->getCodpar(). '!';
        }
	 }

   }


  public function getUnimed2()
  {
    return Herramientas::getX('CODART','Caregart','Unimed',self::getCodart());
  }

  public function getCospro()
  {
    return Herramientas::getX('CODART','Caregart','Cospro',self::getCodart());
  }

    public function setCheck($val)
    {
    $this->check = $val;
  }

  public function getCheck()
  {
    if (self::getMonrgo()!=0 && self::getId()!="")
    { $this->check=1;}
    else { $this->check;}
    return $this->check;
  }

  public function getTotdet()
  {
      $totdet= self::getCanreq() * self::getCosto();
    return number_format($totdet,2,',','.');
  }

  public function setTotdet($val){

    $this->Totdev= $val;
  }

   public function setFecent($val)
    {
    $this->fecent = $val;
  }

  public function getFecent()
  {
    return $this->fecent;
  }

  public function getCanaju()
  {
    $var = number_format(0,2,',','.');
    return $var;
  }


  public function getCanaju_()
  {
    return $this->canaju;
  }


    public function setCanaju($val)
    {
       $this->canaju = $val;
    }



  public function getCodPre()
  {
    $var = Herramientas::getX('CODART','Caregart','Codpar',self::getCodart());
    return $var;
  }


  public function getCodPre_()
  {
    return $this->codpre;
  }


    public function setCodPre($val)
    {
       $this->codpre = $val;
    }

  public function getMontot2($va=false)
  {
    if (self::getId()!="")
    {
     $var = parent::getMontot($va);
    }
    else
    {
      $var= $this->montot2;
    }
    return $var;
  }

  public function setMontot2($val)
    {
       $this->montot2 = $val;
    }

    public function getMonrgo2($va=false)
  {
    if (self::getId()!="")
    {
      $var = parent::getMonrgo($va);
    }
    else
    {
      $var=$this->monrgo2;
    }
    return $var;
  }

  public function setMonrgo2($val)
    {
       $this->monrgo2 = $val;
    }


 }

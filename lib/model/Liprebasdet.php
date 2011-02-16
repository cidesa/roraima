<?php

/**
 * Subclase para representar una fila de la tabla 'liprebasdet'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Liprebasdet extends BaseLiprebasdet
{
    protected $codpre = "";
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

      $this->codpre=self::getCodpar();

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



  /*public function getCodPre()
  {
     $var=self::getCodpar();

    return $var;
  }*/


  public function getCodPre()
  {
    return $this->codpre;
  }


    /*public function setCodPre($val)
    {
       $this->codpre = $val;
    }*/

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

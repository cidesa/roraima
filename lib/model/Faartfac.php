<?php

/**
 * Subclass for representing a row from the 'faartfac' table.
 *
 *
 *
 * @package lib.model
 */
class Faartfac extends BaseFaartfac
{
  protected $check="";
  protected $desart="";
  protected $unimed="";
  protected $exiart="0,00";
  protected $canent="0,00";
  protected $candesp="0,00";
  protected $distot="0,00";
  protected $preant="0,00";
  protected $canpreart="0,00";
  protected $codctapro="";
  protected $mondesc="0,00";
  protected $blanco1="";
  protected $blanco2="0,00";
  protected $recarg="";
  protected $desc="";
  protected $precioe="0,00";
  protected $canentregar="0,00";
  protected $canajustada="0,00";
  protected $montot="0,00";


  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }

  public function getUnimed()
  {
   return Herramientas::getX('CODART','Caregart','Unimed',self::getCodart());
  }

  public function getExiart()
  {
   return Herramientas::getX('CODART','Caregart','Distot',self::getCodart());
  }

  public function getDistot()
  {
   return Herramientas::getX('CODART','Caregart','Distot',self::getCodart());
  }

  public function getBlanco1()
  {
   return Herramientas::getX('CODART','Caregart','Tipo',self::getCodart());
  }

  public function getCansol()
  {
   return self::getCantot();
  }

  public function getPreart()
  {
   return self::getPrecio();
  }

  public function afterHydrate()
  {
    if (self::getPrecio()!=0)
    {
      $this->precioe=self::getPrecio();
    }
  }

}

<?php

/**
 * Subclass for representing a row from the 'ccdetger' table.
 *
 *
 *
 * @package lib.model
 */
class Ccdetger extends BaseCcdetger
{
  protected $cedemp='';
  protected $nomuse='';
  protected $desfor = '';
  protected $nomyml = '';
  protected $nomger = '';
  protected $administrador = '';
  protected $obj=array();
  protected $totfil=0;
  private $gerencias='';
  protected $marca = '';

  public function getNombre(){
   $nombre = Herramientas::getX('login','ccusuint','nomusuint',self::getLogin());
   return $nombre;
  }

  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    parent::hydrate($rs, $startcol);
    $c= new Criteria();
    $c->add(CcusuintPeer::LOGIN,self::getLogin());
    $data=CcusuintPeer::doSelectOne($c);
    if ($data)
    {
      $this->cedemp=$data->getCedusuint();
      $this->nomuse=$data->getNomusuint();
    }
    else
    {
      $this->cedemp='';
      $this->nomuse='';
    }

    $c1= new Criteria();
    $c1->add(CcgerencPeer::ID,self::getCcgerencId());
    $data1=CcgerencPeer::doSelectOne($c1);
    if ($data1)
    {
      $this->nomyml=$data1->getNomyml();
      $this->nomger=$data1->getNomger();
    }
    else
    {
      $this->nomyml='';
      $this->nomger='';
    }
   }

  public function getNomusuint(){
   $nombre = Herramientas::getX('login','ccusuint','nomusuint',self::getLogin());
   return $nombre;
  }

    public function getCedusuint(){
   $nombre = Herramientas::getX('login','ccusuint','cedusuint',self::getLogin());
   return $nombre;
  }

  public function setGerencias($val)
  {
    $this->gerencias = $val;
  }

  public function getGerencias()
  {
    return $this->gerencias;
  }


}

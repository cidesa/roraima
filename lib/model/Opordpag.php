<?php

/**
 * Subclass for representing a row from the 'opordpag' table.
 *
 *
 *
 * @package lib.model
 */
class Opordpag extends BaseOpordpag
{
  private $codtip = '';
  private $check = '';
  protected $referencias = '';
  protected $documento = '';
  protected $afectapre = '';
  protected $totalcomprobantes = '';
  protected $cuentarendicion = '';
  protected $vacio = '';
  protected $presiono = 'N';
  protected $neto = '0,00';
  protected $totfonter = '0,00';
  protected $montotal=0;
  protected $fecdes = '';
  protected $fechas = '';
  protected $objeto=array();
  protected $mascaraubi = "";
  protected $lonubi = 0;
  protected $idrefer="";
  protected $codcat="";


   public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      $this->montotal= (self::getMonord()-self::getMondes()-self::getMonpag()-self::getMonret()- Cheques::ObtenerAjuste(self::getNumord()) );
   }


  public function getNomext()
  {
  return Herramientas::getX('TIPCAU','Cpdoccau','Nomext',self::getTipcau());
  }

  public function getDescta()
  {
  return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtapag());
  }

 public function getCodctasec()
  {
  return Herramientas::getX('CEDRIF','Opbenefi','Codctasec',self::getCedrif());
  }

  public function getNomext2()
  {
  return Herramientas::getX('CODFIN','Fortipfin','Nomext',self::getTipfin());
  }

  public function setCodtip($val)
  {
  $this->codtip = $val;
  }

  public function getCodtip()
  {
  return $this->codtip;
  }

  public function getDestip()
  {
  return Herramientas::getX('CODTIP','Optipret','Destip',self::getCodtip());
  }

  public function getDesubi()
  {
  return Herramientas::getX('CODUBI','Bnubica','Desubi',self::getCoduni());
  }

  public function getIdrefer()
  {
    return Herramientas::getX_vacio('numcom','contabc','id',self::getNumcom());
  }

  public function setCheck($val)
  {
  $this->check = $val;
  }

  public function getCheck()
  {
  return $this->check;
  }


/*  public function getMontotal()
  {
  $montot= (self::getMonord()-self::getMondes()-self::getMonpag()-self::getMonret()- Cheques::ObtenerAjuste(self::getNumord()) );
  return $montot;
  }*/

  public function getMontotaltotal()
  {
  $montot= (self::getMonord()-self::getMondes()-self::getMonpag()-self::getMonret()- Cheques::ObtenerAjuste(self::getNumord()) );
  return $montot;
  }

  public function setMontotal($val)
  {
  $this->montotal = $val;
  }

  public function getMontotalGrid()
  {
    return $this->montotal;
  }

  public function setFecdes($val)
  {
  $this->fecdes = $val;
  }

  public function getFecdes()
  {
    return $this->fecdes;
  }

  public function setFechas($val)
  {
  $this->fechas = $val;
  }

  public function getFechas()
  {
    return $this->fechas;
  }

}

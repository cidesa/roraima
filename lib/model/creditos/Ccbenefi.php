<?php

/**
 * Subclass for representing a row from the 'ccbenefi' table.
 *
 *
 *
 * @package lib.model
 */
class Ccbenefi extends BaseCcbenefi
{
    protected $div=true;
    protected $div2=true;
    protected $divfecven=true;
    protected $divfecini=true;
    protected $estadoid='';
    //protected $ciudadid='';
    protected $municipioid='';
    protected $corestadoid='';
    protected $cormunicipioid='';

    protected $tipupsid='';
    protected $objbenefi=array();

    protected $cordirnomurb='';
    protected $cordircalles='';
    protected $cordircasedi='';
    protected $cordirnumpis='';
    protected $cordirapatar='';
    protected $cordirpunref='';

    protected $nomrepben='';
    protected $cedrifben='';
    protected $sexrepben='';
    protected $numtel='';
    protected $numcel='';
    protected $corele2='';
    protected $dirnomurb2='';
    protected $dirnumcal='';
    protected $dirnumcasedi='';
    protected $dirnumpis2='';
    protected $dirnumapt='';
    protected $dirpunref2='';
    protected $estado2='';
    protected $ccmunici_id='';
    protected $parloccas='';

    protected $edad="";

    protected $login = "";
    protected $contras = "";
    protected $repcontras = "";
    protected $ccpregunid = "";
    protected $respue = "";

  public function __toString(){
    return $this->getNomben();
  }

  public function getCedrifcue(){
    return $this->getCedrif();
  }

  public function getMunicipio()
  {
    $parroquia = $this->getCcparroq();
    if($parroquia){
      $municipio = $parroquia->getCcmunici();
      if($municipio) return $municipio->getId();
      else return '';
    }else return '';
  }

  public function getEstado()
  {
    $parroquia = $this->getCcparroq();
    if($parroquia){
      $municipio = $parroquia->getCcmunici();
      if($municipio) return $municipio->getCcestadoId();
      else return '';
    }else{
      $ciudad = $this->getCcciudad();
      if($ciudad)
        return $ciudad->getCcestadoId();
        else return '';
      }
  }

  public function getNombreParroquia(){
   return Herramientas::getX('id','ccparroq','nompar',self::getCcparroqid());
  }

}

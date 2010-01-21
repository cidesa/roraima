<?php

/**
 * Subclass for representing a row from the 'ccanalis' table.
 *
 *
 *
 * @package lib.model
 */
class Ccanalis extends BaseCcanalis
{
  protected $div=false;
  protected $estadoid='';
  protected $municipioid='';
  protected $gerenciaid='';
  protected $anaest='';

  public function __toString(){
    return $this->getNomana();
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
    }else return '';
  }

  public function getGerencia()
  {
    $area = $this->getCcareger();
    if($area){
      $gerencia = $area->getCcgerenc();
      if($gerencia) return $gerencia->getId();
      else return '';
    }else return '';
  }

  public function getCargo()
  {
    $tipana = $this->getCctipana();
    if($tipana){return $tipana->getNomtipana();}
    else return '';
  }

  public function getEstadoscobrador(){
  	$estadoscobrador = "";
  	$sql = "select ccestado.nomest from ccestado, ccanaest where ccanaest.ccestado_id = ccestado.id and ccanaest.ccanalis_id =".self::getId();
  	$estados = array();
  	H::BuscarDatos($sql,$estados);
  	foreach($estados as $estado){
  		if($estadoscobrador ==""){
  			$estadoscobrador = $estado["nomest"];
  		} else {
  			$estadoscobrador = $estadoscobrador.', '.$estado["nomest"];
  		}

  	}
  	return $estadoscobrador;
  }
}

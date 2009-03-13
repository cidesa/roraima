<?php

/**
 * Subclass for representing a row from the 'fapedido' table.
 *
 *
 *
 * @package lib.model
 */
class Fapedido extends BaseFapedido
{
  protected $obj=array();
  protected $objfecped=array();
  protected $entrega="";
  protected $estatus="";
  protected $combo="";
  protected $com="";
  protected $fil="";
  protected $rifpro="";
  protected $nompro="";
  protected $nitcli="";
  protected $telcli="";
  protected $dircli="";
  protected $check=0;


  public function getRifpro()
  {
   return Herramientas::getX('CODPRO','Facliente','Rifpro',self::getCodcli());
  }

  public function getNompro()
  {
   return Herramientas::getX('CODPRO','Facliente','Nompro',self::getCodcli());
  }

  public function getNitcli()
  {
   return Herramientas::getX('CODPRO','Facliente','Nitpro',self::getCodcli());
  }

  public function getTelcli()
  {
   return Herramientas::getX('CODPRO','Facliente','Telpro',self::getCodcli());
  }

  public function getDircli()
  {
   return Herramientas::getX('CODPRO','Facliente','Dirpro',self::getCodcli());
  }


}

<?php

/**
 * Subclass for representing a row from the 'fafactur'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fafactur.php 33699 2009-10-01 22:15:36Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fafactur extends BaseFafactur
{
	protected $obj1=array();
	protected $obj2=array();
	protected $obj3=array();
	protected $obj4=array();
	protected $obj5=array();
	protected $incluircliente="N";
	protected $rifpro="";
	protected $nompro="";
	protected $telpro="";
	protected $dirpro="";
	protected $tipper="";
	protected $desconpag="";
	protected $monto="0,00";
	protected $monrgo="0,00";
	protected $moncan="0,00";
	protected $monres="0,00";
	protected $tipconpag="";
	protected $usuarios="";
	protected $password="";
	protected $tipo="";
	protected $apliclades="";
	protected $combo="";
	protected $docrefiera="";
	protected $ctacli="";
	protected $tipocliente="";
	protected $limitecredito="";
	protected $totcanpreart="0,00";
	protected $esretencion="";
	protected $tottotart="0,00";
	protected $totmonrgo="0,00";
	protected $monedaanterior="";
	protected $totdesc="0,00";
	protected $totrec="0,00";
	protected $trajo="";
	protected $porcentajedescto="0";
	protected $totprecio="0,00";
    protected $lonart="";
    protected $rgofijos="";
    protected $listaart="";
    protected $ctasociada="S";
    protected $estatus="";
    protected $despnotent="";
    protected $codtip="";
	protected $destip="";
	protected $filgenmov="";

  public function getRifpro()
  {
   return Herramientas::getX('CODPRO','Facliente','Rifpro',self::getCodcli());
  }

  public function getNompro()
  {
   return Herramientas::getX('CODPRO','Facliente','Nompro',self::getCodcli());
  }

  public function getTipper()
  {
   return Herramientas::getX('CODPRO','Facliente','Tipper',self::getCodcli());
  }

  public function getTelpro()
  {
   return Herramientas::getX('CODPRO','Facliente','Telpro',self::getCodcli());
  }

  public function getDirpro()
  {
   return Herramientas::getX('CODPRO','Facliente','Dirpro',self::getCodcli());
  }

    public function getDesconpag()
  {
   return Herramientas::getX('ID','Faconpag','Desconpag',self::getCodconpag());
  }


}
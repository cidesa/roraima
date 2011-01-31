<?php

/**
 * Subclass for representing a row from the 'forasoactpro'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Forasoactpro extends BaseForasoactpro
{
    protected $obj=array();
    protected $canuni="0,00";
    protected $codart="";
    protected $codpar="";
    protected $canart="0,00";
    protected $monart="0,00";
    protected $totpre="0,00";
    protected $codfin="";
    protected $codtip="";
    protected $observ="";
    protected $cadenaper="";
    protected $cadenafin="";

    
     public function getDesmet()
    {
      return Herramientas::getX('CODMET','Fordefmet','Desmet',self::getCodmet());
    }

    public function getDespro()
    {
      return Herramientas::getX('CODPRO','Fordefpro','Despro',self::getCodpro());
    }

    public function getDesact()
    {
      return Herramientas::getX('CODACT','Fordefact','Desact',self::getCodact());
    }

    public function getDesart()
    {
      return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
    }

    public function getUnimed()
    {
      return Herramientas::getX('CODART','Caregart','Unimed',self::getCodart());
    }

    public function getCodpar()
    {
      return Herramientas::getX('CODART','Caregart','Codpar',self::getCodart());
    }

    public function getNompar()
    {
      return Herramientas::getX('CODPAR','Nppartidas','Nompar',self::getCodpar());
    }

    public function getDestip()
    {
      return Herramientas::getX('CODTIP','Fortiptit','Destip',self::getCodtip());
    }

    public function getNomparing()
    {
      if (self::getCodfin()=='Mixtos')
          return "Diversos";
      else return Herramientas::getX('CODPARING','Fordefparing','Destip',self::getCodfin());
    }

}

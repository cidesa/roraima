<?php

/**
 * Subclass for representing a row from the 'cpdeftit'.
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
class Cpdeftit extends BaseCpdeftit
{
  protected $listaperiodo = array();
  protected $obj = array();
  protected $codigo1='';
  protected $nombre1='';

  protected $dismon;
  protected $dispor;
  protected $checked="";
  protected $asigna="";

  /*public function getCodigo1(){
   return self::getCodpre();
  }*/
  public function getNombre1(){
   return self::getNompre();
  }

  public static function Listaperiodo()
  {
    $c = new Criteria();
    $nroperiod = CpdefnivPeer::doSelectone($c);

	$lista = array();
	if ($nroperiod)
	{
      for ($i=0;$i<=$nroperiod->getNumper();$i++)
      {
    	$i = str_pad($i,2,'0',STR_PAD_LEFT);
		$lista += array($i => $i);
      }
	}
	return $lista;
  }

    public function __toString(){
	  	return $this->getCodpre();
	}

  public function getDescta()
  {
  return Herramientas::getX('CODCTA','Contabb','Descta',self::getCodcta());
  }

    public function getAsigna()
    {
      $c= new Criteria();
      $c->add(CpasiiniPeer::CODPRE,self::getCodpre());
      $reg=CpasiiniPeer::doSelect($c);
      if ($reg)
          return $this->asigna='S';
       else  return  $this->asigna='N';
    }
}

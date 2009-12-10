<?php

/**
 * Subclass for representing a row from the 'cpimpprc'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:Cpimpprc.php 35042 2009-11-26 01:33:34Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpimpprc extends BaseCpimpprc
{
  protected $mondis='';
  private $montrue = '';
  private $check = '';

  private $monporpag = 0.00;

  private $retiva = '';


  public function setMontrue($val)
  {
	$this->montrue = $val;
  }

  public function getMontrue()
  {
  	$montrue= self::getMonimp() - self::getMoncau() - self::getMonaju() + self::getMoncau();
	return $montrue;
  }

  public function setCheck($val)
  {
	$this->check = $val;
  }

  public function getCheck()
  {
	return $this->check;
  }

  public function getMonporpag()
  {
	$montot= (self::getMonimp()-self::getMonpag()-self::getMonaju());
	return $montot;
  }

   public function setMonporpag($val)
  {
	$this->monporpag = $val;
  }

    public function getMonporpagGrid()
  {
	return $this->monporpag;
  }


  public function getRetiva()
  {
  	$c= new Criteria();
  	$reg= CadefartPeer::doSelectOne($c);
  	if ($reg)
  	{ $afectarecargo=$reg->getAsiparrec();
  	}else {$afectarecargo='C';}

  	if ($afectarecargo=='R' || $afectarecargo=='S')
  	{
  	  Herramientas::obtenerFormatoCategoria(&$formatopar,&$iniciopartida);
  	  $par=substr(self::getCodpre(),$iniciopartida,strlen($formatopar));
  	  $c= new Criteria();
  	  $c->add(TsretivaPeer::CODPAR,$par);
  	  $datos= TsretivaPeer::doSelectOne($c);
  	  if ($datos)
  	  {
  		return 'S';
  	  }else return 'N';
   }else if ($afectarecargo=='P')
   {
   	  $c= new Criteria();
  	  $c->add(TsretivaPeer::CODPAR,self::getCodpre());
  	  $datos= TsretivaPeer::doSelectOne($c);
  	  if ($datos)
  	  {
  		return 'S';
  	  }else return 'N';

   }
  }

  public function setRetiva($val)
  {
	$this->retiva = $val;
  }

}

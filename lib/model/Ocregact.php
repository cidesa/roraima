<?php

/**
 * Subclass for representing a row from the 'ocregact'.
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
class Ocregact extends BaseOcregact
{
  protected $codtipact='';
  protected $destipact='';
  protected $numofi='';
  protected $fecact='';
  protected $obsact='';

	public function getDescon()
	{
		return Herramientas::getX('codcon','ocregcon','descon',self::getCodcon());
	}

	public function getCodobr()
	{
		return Herramientas::getX('codcon','ocregcon','codobr',self::getCodcon());
	}

	public function getDesobr()
	{
		return Herramientas::getX('codobr','ocregobr','desobr',self::getCodobr());
	}

	public function getCodpro()
	{
		return Herramientas::getX('codcon','ocregcon','codpro',self::getCodcon());
	}

	public function getNompro()
	{
		return Herramientas::getX('codpro','caprovee','nompro',self::getCodpro());
	}

	public function getNomins()
	{
	  $c= new Criteria();
	  $c->add(OcinginsobrPeer::CODOBR,self::getCodobr());
	  $c->add(OcinginsobrPeer::CEDINS,self::getCedins());
	  $reg= OcinginsobrPeer::doSelectOne($c);
      if ($reg)
      {
      	$nomins=$reg->getNomins();
      }
      else
      {
      	$nomins='';
      }
		return $nomins;
	}

	public function getNomtec()
	{
		return Herramientas::getX('codemp','Nphojint','nomemp',self::getCedtec());
	}

	public function getNomdir()
	{
		return Herramientas::getX('codemp','Nphojint','nomemp',self::getCedfis());
	}

	public function getNomtop()
	{
       $c= new Criteria();
       $c->add(OcproperPeer::CODPRO,self::getCodpro());
       $c->addJoin(OcdefperPeer::CEDPER,OcproperPeer::CEDPER);
       $c->addJoin(OctipcarPeer::CODTIPCAR,OcdefempPeer::CODINGRES);
       $c->addJoin(OcdefempPeer::CODINGRES,OcdefperPeer::CODTIPCAR);
       $c->addJoin(OctipcarPeer::CODTIPCAR,OcdefperPeer::CODTIPCAR);
	   $registro = OcdefperPeer::doSelectOne($c);
	   if($registro)
	   {
	   	$val=$registro->getNomper();
	   }else { $val="";}

		return $val;
	}

	public function getNomper()
	{
		$codpro=Herramientas::getX('codcon','Ocregcon','codpro',self::getCodcon());
		$c= new Criteria();
		$c->add(CaproveePeer::CODPRO,$codpro);
		$resul= CaproveePeer::doSelectOne($c);
		if ($resul)
		{
			$valor=$resul->getNompro();
		}else {$valor="";}

		return $valor;
	}
}

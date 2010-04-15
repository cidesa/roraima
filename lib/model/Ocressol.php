<?php

/**
 * Subclass for representing a row from the 'ocressol'.
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
class Ocressol extends BaseOcressol
{
	public function getDessol()
	{
	  return Herramientas::getX('numsol','ocregsol','dessol',self::getNumsol());
	}

	public function getNomemp()
	{
	  return Herramientas::getX('codemp','NPHojInt','nomemp',self::getCedemi());
	}

	public function getNomemp3()
	{
	  return Herramientas::getX('codemp','NPHojInt','nomemp',self::getCedfir());
	}

	public function getCedulate()
	{
	  return Herramientas::getX('numsol','ocregsol','codemp',self::getNumsol());
	}

	public function getNomemp2()
	{
	  return Herramientas::getX('codemp','NPHojInt','nomemp',self::getCedulate());
	}

	public function getCedulaste()
	{
	  return Herramientas::getX('numsol','ocregsol','cedste',self::getNumsol());
	}

	public function getNombreste()
	{
	  return Herramientas::getX('cedste','ocdatste','nomste',self::getCedulaste());
	}

	public function getFechasol()
	{
	  if (!self::getNumsol())
	  {
	  	$val=Herramientas::getX('numsol','ocregsol','fecsol',self::getNumsol());
	  }
	  else
	  {
	   $fec=Herramientas::getX('numsol','ocregsol','fecsol',self::getNumsol());
	   $val=date("d/m/Y",strtotime($fec));
	  }
	  return $val;
	}

}

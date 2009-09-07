<?php

/**
 * Subclass for representing a row from the 'facorrelat'.
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
class Facorrelat extends BaseFacorrelat
{
	public $obj = array();
	protected $ctadev="";
	protected $ctavco="";
	protected $apliclades="";

   	public function getNomemp()
	{
	  return Herramientas::getX('CODEMP','Empresa','Nomemp','001');
	}

	public function getDiremp()
	{
	  return Herramientas::getX('CODEMP','Empresa','Diremp','001');
	}

	public function getTlfemp()
	{
	  return Herramientas::getX('CODEMP','Empresa','Tlfemp','001');
	}

	public function getNumlot()
	{
	  return Herramientas::getX('CODEMP','Empresa','Numlot','001');
	}

	public function getCodcat()
	{
	  return Herramientas::getX('CODEMP','Empresa','Codcat','001');
	}

	public function getLonart()
	{
	  return Herramientas::getX('CODEMP','Cadefart','Lonart','001');
	}

	public function getRupart()
	{
	  return Herramientas::getX('CODEMP','Cadefart','Rupart','001');
	}

	public function getForart()
	{
	  return Herramientas::getX('CODEMP','Cadefart','Forart','001');
	}

	public function getDesart()
	{
	  return Herramientas::getX('CODEMP','Cadefart','Desart','001');
	}

	public function getForubi()
	{
	  return Herramientas::getX('CODEMP','Cadefart','Forubi','001');
	}

	public function getDesubi()
	{
	  return Herramientas::getX('CODEMP','Cadefart','Desubi','001');
	}

	public function getForsnc()
	{
	  return Herramientas::getX('CODEMP','Cadefart','Forsnc','001');
	}

	public function getDessnc()
	{
	  return Herramientas::getX('CODEMP','Cadefart','Dessnc','001');
	}

	public function getCtadev()
	{
	  return Herramientas::getX('CODEMP','Cadefart','Ctadev','001');
	}

	public function getDesctadev()
	{
	  return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtadev());
	}

	public function getCtavco()
	{
	  return Herramientas::getX('CODEMP','Cadefart','Ctavco','001');
	}

	public function getDesctavco()
	{
	  return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtavco());
	}

	public function getApliclades()
	{
	  $valor = Herramientas::getX('CODEMP','Cadefart','Apliclades','001');
	  if ($valor == "S")
	  	return 1;
	  else
	  	return 0;
	}

	public function getGeneraop()
	{
	  $valor = Herramientas::getX('CODEMP','Cadefart','Generaop','001');
	  if ($valor == "S")
	  	return 1;
	  else
	  	return 0;
	}

	public function getGeneracom()
	{
	  $valor = Herramientas::getX('CODEMP','Cadefart','Generacom','001');
	  if ($valor == "S")
	  	return 1;
	  else
	  	return 0;
	}

	public function getAsiparrec()
	{
	  return Herramientas::getX('CODEMP','Cadefart','Asiparrec','001');
	}

}

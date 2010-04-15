<?php

/**
 * Subclase para representar una fila de la tabla 'npempjorlab'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npempjorlab extends BaseNpempjorlab
{

public function getNomemp()
  {
	return Herramientas::getX('CODEMP','Nphojint','Nomemp',self::getCodemp());
  }

public function getNomcar()
  {
	return Herramientas::getX('CODEMP','Npasicaremp','Nomcar',self::getCodemp());
  }

  public function getNomnom()
  {
	return Herramientas::getX('CODNOM','Npasicaremp','Nomnom',self::getCodnom());
  }

public function getLunes()
  {
	$res=Herramientas::getX('IDEJOR','Npdefjorlab','Lunes',self::getIdejor());
	if (trim($res)!='')
	{
 		return true;
	}
	else return false;
  }

public function getMartes()
  {
	$res=Herramientas::getX('IDEJOR','Npdefjorlab','Martes',self::getIdejor());
	if (trim($res)!='')
	{
 		return true;
	}
	else return false;
  }

public function getMiercoles()
  {
	$res=Herramientas::getX('IDEJOR','Npdefjorlab','Miercoles',self::getIdejor());
	if (trim($res)!='')
	{
 		return true;
	}
	else return false;
  }

 public function getJueves()
  {
	$res=Herramientas::getX('IDEJOR','Npdefjorlab','Jueves',self::getIdejor());
	if (trim($res)!='')
	{
 		return true;
	}
	else return false;
  }

  public function getViernes()
  {
	$res=Herramientas::getX('IDEJOR','Npdefjorlab','Viernes',self::getIdejor());
	if (trim($res)!='')
	{
 		return true;
	}
	else return false;
  }

  public function getSabado()
  {
	$res=Herramientas::getX('IDEJOR','Npdefjorlab','Sabado',self::getIdejor());
	if (trim($res)!='')
	{
 		return true;
	}
	else return false;
  }

  public function getDomingo()
  {
	$res=Herramientas::getX('IDEJOR','Npdefjorlab','Domingo',self::getIdejor());
	if (trim($res)!='')
	{
 		return true;
	}
	else return false;
  }

}

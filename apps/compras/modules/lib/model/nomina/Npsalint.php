<?php

/**
 * Subclase para representar una fila de la tabla 'npsalint'.
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
class Npsalint extends BaseNpsalint
{
	protected $nomnom='';
	protected $codnom='';
	protected $feccal='';
	protected $nomemp='';
	protected $periodo='';
	protected $codnomasi='';

 	  public function getDestipcon()
  {
  	  	  return Herramientas::getX('codtipcon','nptipcon','destipcon',self::getCodcon());
  }

  public function getCodnom()
  {
  	  	  $dato= Herramientas::getX('codemp','npasicaremp','codnom',self::getCodemp());
      return Herramientas::getX('codnom','npnomina','codnom',$dato);
  }
	  public function getNomemp()
  {
  	  	  $dato= Herramientas::getX('codemp','npasiempcont','nomemp',self::getCodemp());
  	      return Herramientas::getX('nomemp','npasiempcont','nomemp',$dato);
  }
	  public function getFeccal()
  {
  	  	  $dato= Herramientas::getX('codemp','npasiempcont','feccal',self::getCodemp());
  	      return Herramientas::getX('feccal','npasiempcont','feccal',$dato);
  }


  public function getNomnom()
  {

  	$dato= Herramientas::getX('codemp','npasicaremp','codnom',self::getCodemp());
    return Herramientas::getX('codnom','npnomina','nomnom',$dato);

  }
}
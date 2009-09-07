<?php

/**
 * Subclase para representar una fila de la tabla 'npasicatconemp'.
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
class Npasicatconemp extends BaseNpasicatconemp
{

public function getNomcon()
    {
    	return Herramientas::getX('codcon','npdefcpt','nomcon',self::getCodcon());
    }

public function getNomemp()
    {
    	return Herramientas::getX('codemp','npasicaremp','nomemp',self::getCodemp());
    }
public function getNomnom()
    {
    	return Herramientas::getX('codnom','npasicaremp','nomnom',self::getCodnom());
    }
public function getNomcar()
    {
    	return Herramientas::getX('codcar','npasicaremp','nomcar',self::getCodcar());
    }
public function getNomcat()
    {
    	return Herramientas::getX('codcat','npcatpre','nomcat',self::getCodcat());
    }


}

<?php

/**
 * Subclass for representing a row from the 'npasicatconemp' table.
 *
 * 
 *
 * @package lib.model
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

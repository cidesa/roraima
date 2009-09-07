<?php

/**
 * Subclase para representar una fila de la tabla 'npconceptoscategoria'.
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
class Npconceptoscategoria extends BaseNpconceptoscategoria
{
public function getNomcon()
    {
    	return Herramientas::getX('codcon','npdefcpt','nomcon',self::getCodcon());
    }

public function getDescat()
    {    	
       return Herramientas::getX('codcat','npcatpre','nomcat',self::getCodcat());      
    }

public function getCodpre()
     {  	
    	return Herramientas::getX('codcon','Npdefcpt','codpar',self::getCodcon());
     }

 public function setCheck($val)
  {
	$this->check = $val;		
  }
	
  public function getCheck()
  {
	return $this->check;		
  }

}

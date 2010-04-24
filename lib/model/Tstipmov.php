<?php

/**
 * Subclass for representing a row from the 'tstipmov'.
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
class Tstipmov extends BaseTstipmov
{

    public function getDesdebcre()
	  {
	  	if (self::getDebcre()=='C')
	  	       return 'Crédito';
	  	else if (self::getDebcre()=='D')
	  	       return 'Débito';
	    else return 'Indefinido';	       
	  }

  public function getDescta()
  {
  return Herramientas::getX('CODCTA','Contabb','Descta',self::getCodcon());
  }

}

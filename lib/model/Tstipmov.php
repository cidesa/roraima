<?php

/**
 * Subclass for representing a row from the 'tstipmov' table.
 *
 * 
 *
 * @package lib.model
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

}

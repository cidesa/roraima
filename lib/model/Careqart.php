<?php

/**
 * Subclass for representing a row from the 'careqart' table.
 *
 *
 *
 * @package lib.model
 */
class Careqart extends BaseCareqart
{
	/*public function getDesubi()
	{
		$c = new Criteria();
		 $registro = BndefinsPeer::doSelectOne($c);
		 if ($registro)
		 {
		 //return  Herramientas::getX('codubi','bnubibie','desubi',$registro->getLonUbi());
			return  $registro->getLonUbi();
			}
			} */
	public function getDesubi()
	{
		return  Herramientas::getX('codubi','bnubibie','desubi',self::getCodcatreq());
	}

	public function getMonreq()
	{
		//return number_format(parent::getMonreq(), 2, ',', ' ');
		return number_format(parent::getMonreq(), 2, '.', '');
	}	
}

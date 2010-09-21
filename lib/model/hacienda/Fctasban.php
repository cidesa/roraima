<?php

/**
 * Subclass for representing a row from the 'fctasban'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fctasban.php 32426 2009-09-02 03:49:02Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fctasban extends BaseFctasban
{
	protected $ano="";
	protected $enero="0,00";
	protected $febrero="0,00";
	protected $marzo="0,00";
	protected $abril="0,00";
	protected $mayo="0,00";
	protected $junio="0,00";
	protected $julio="0,00";
	protected $agosto="0,00";
	protected $septiembre="0,00";
	protected $octubre="0,00";
	protected $noviembre="0,00";
	protected $diciembre="0,00";

	public function afterHydrate()
	{
		$arreglo=array();
		if (Hacienda::Obtener_mes(self::getTasano(),$arreglo))
		{
			//H::PrintR($arreglo);
			$this->enero=$arreglo[0];
			$this->febrero=$arreglo[1];
			$this->marzo=$arreglo[2];
			$this->abril=$arreglo[3];
			$this->mayo=$arreglo[4];
			$this->junio=$arreglo[5];
			$this->julio=$arreglo[6];
			$this->agosto=$arreglo[7];
			$this->septiembre=$arreglo[8];
			$this->octubre=$arreglo[9];
			$this->noviembre=$arreglo[10];
			$this->diciembre=$arreglo[11];

		}
	}
}




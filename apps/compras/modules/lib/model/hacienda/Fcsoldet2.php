<?php

/**
 * Subclase para representar una fila de la tabla 'fcsoldet2'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.hacienda
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Fcsoldet2 extends BaseFcsoldet2
{

    public function getEdodecstatus()
	{
		if (self::getEdodec() == 'P'){
			$edodecstatus = "PAGADA";
		}else{
			if (H::dateDiff('d',self::getFecven(),date('d')) <= 0){
				$edodecstatus = "VIGENTE";
			}else{
				$edodecstatus = "VENCIDA";
			}

		}
		return $edodecstatus;
	}
}

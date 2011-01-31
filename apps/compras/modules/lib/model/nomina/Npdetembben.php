<?php

/**
 * Subclase para representar una fila de la tabla 'npdetembben'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2.nomina
 */ 
class Npdetembben extends BaseNpdetembben
{
	public function getNomben()
	{
		return H::getx('Cedrif','Npbenefiemb','nomben',self::getCedrifben());
	}
}

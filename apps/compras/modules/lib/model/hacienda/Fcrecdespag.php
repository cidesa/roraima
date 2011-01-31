<?php

/**
 * Subclass for representing a row from the 'fcrecdespag'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcrecdespag.php 32426 2009-09-02 03:49:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcrecdespag extends BaseFcrecdespag
{

	public function hydrate(ResultSet $rs, $startcol = 1) {
		parent :: hydrate($rs, $startcol);

		$this->nomdes = Herramientas :: getX('coddes', 'fcdefdesc', 'nomdes', self :: getCodrede());

//Select NomDes from FCDefDesc where CodDes='" + ObtenerValorRegistro(TablaPagos!CodReDe) + "
	}


}

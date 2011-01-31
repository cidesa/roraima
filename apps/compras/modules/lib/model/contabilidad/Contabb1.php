<?php

/**
 * Subclase para representar una fila de la tabla 'contabb1'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.contabilidad
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Contabb1.php 32405 2009-09-01 21:27:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Contabb1 extends BaseContabb1
{
	protected $salper = 0;
    protected $salacu = 0;

	public function afterHydrate() {
      $this->salper = H::FormatoMonto($this->getTotdeb()-$this->getTotcre());
      $this->salacu = H::FormatoMonto(0);
    }
}

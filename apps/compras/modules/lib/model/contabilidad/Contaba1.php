<?php

/**
 * Subclase para representar una fila de la tabla 'contaba1'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.contabilidad
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Contaba1.php 32405 2009-09-01 21:27:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Contaba1 extends BaseContaba1 {
	protected $stapin="";

    public function getStapin() {
    	switch ($this->getStatus()) {
    		case "A":
    			return "ABIERTO";
    			break;
    		case "C":
    			return "CERRADO";
    	}
    }
}
<?php

/**
 * Subclase para representar una fila de la tabla 'apernueper'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.sima_user
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Apernueper extends BaseApernueper
{
	  protected $listab=array();
          protected $modulo="";
          protected $concatenado="";
          protected $nomtab_r="";          

   public function __toString()
    {
		return $this->getNombre();
    }

}

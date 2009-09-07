<?php

/**
 * Subclase para representar una fila de la tabla 'npcatpre'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npcatpre extends BaseNpcatpre
{
	public function getNomcatnew()
    {
      return self::getNomcat();
    }

    public function getCodcatnew()
    {
      return self::getCodcat();
    }
}

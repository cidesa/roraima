<?php

/**
 * Subclase para representar una fila de la tabla 'dftabtip'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.documentos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Dftabtip extends BaseDftabtip
{
  public function __toString()
  {
    return $this->tipdoc.' - '.Documentos::getDesDoc($this->tipdoc);
  }

  public function getDestipdoc()
  {
    return $this->tipdoc.' - '.Documentos::getDesDoc($this->tipdoc);
  }

}

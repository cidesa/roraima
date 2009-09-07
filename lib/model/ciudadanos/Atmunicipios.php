<?php

/**
 * Subclase para representar una fila de la tabla 'atmunicipios'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.ciudadanos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Atmunicipios extends BaseAtmunicipios
{
  protected $desest ='';

  public function __toString()
  {
    return $this->desest." - ".$this->desmun;
  }

  public function afterHydrate()
  {
    $estado = $this->getAtestados();
    if($estado!='') $this->desest = $estado->getDesest();

  }

}

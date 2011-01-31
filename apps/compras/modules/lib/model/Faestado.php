<?php

/**
 * Subclass for representing a row from the 'faestado'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Faestado extends BaseFaestado
{
  protected $nompai ='';

  public function __toString()
  {
    return $this->nomedo;
  }

  public function afterHydrate()
  {
    $pais = $this->getFapais();
    if($pais!='') $this->nompai = $pais->getNompai();

  }

}

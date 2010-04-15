<?php

/**
 * Subclass for representing a row from the 'faestado'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Faestado.php 33699 2009-10-01 22:15:36Z dmartinez $
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

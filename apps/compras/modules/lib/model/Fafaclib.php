<?php

/**
 * Subclase para representar una fila de la tabla 'fafaclib'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Fafaclib extends BaseFafaclib
{
  protected $rifpro="";

  public function getNompro()
  {
   return Herramientas::getX('RIFPRO','Facliente','Nompro',$this->rifpro);
  }

  public function afterHydrate()
  {
        $this->rifpro=Herramientas::getX('CODPRO','Facliente','Rifpro',self::getCodcli());
  }


}

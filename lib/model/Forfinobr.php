<?php

/**
 * Subclase para representar una fila de la tabla 'forfinobr'.
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
class Forfinobr extends BaseForfinobr
{
    protected $mondis=0.00;
    protected $monasi=0.00;
    protected $nomext="";

    public function getNomext()
    {
      return Herramientas::getX('CODFIN','Fortipfin','Nomext',self::getCodparing());
    }

   public function setNomext()
   {
     return $this->nomext;
   }
}

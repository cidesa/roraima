<?php

/**
 * Subclase para representar una fila de la tabla 'cpcontra'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.presupuesto
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Cpcontra extends BaseCpcontra
{
    protected $obj=array();
    protected $marcara="";

    public function getNompar()
    {
            return Herramientas::getX('CODPAR', 'Prepartidas', 'Nompar',self::getCodparma());

    }

    public function getNomparde()
    {
            return Herramientas::getX('CODPAR', 'Prepartidas', 'Nompar',self::getCodparde());
    }

    public function getMascara()
   {
     return H::getMascaraPartidaGenerica();
   }

   public function setMascara()
   {
     return $this->mascara;
   }    
}

<?php

/**
 * Subclase para representar una fila de la tabla 'fordefobr'.
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
class Fordefobr extends BaseFordefobr
{
    protected $longitud="";
    protected $mascara="";

   public function getLongitud()
   {
     return strlen(H::getObtener_FormatoPartida_Formulacion());
   }

   public function setLongitud()
   {
     return $this->longitud;
   }

   public function getMascara()
   {
     return H::getObtener_FormatoPartida_Formulacion();
   }

   public function setMascara()
   {
     return $this->mascara;
   }

    public function getNomparegr()
    {
      return Herramientas::getX('CODPAREGR','Fordefparegr','Nomparegr',self::getCodparegr());
    }

}

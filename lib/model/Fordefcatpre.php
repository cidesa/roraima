<?php

/**
 * Subclass for representing a row from the 'fordefcatpre'.
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
class Fordefcatpre extends BaseFordefcatpre
{
    protected $longitud="";
    protected $mascara="";
    
    public function getCodunieje()
    {
        return "";
    }

    public function getNomemp()
    {
      return Herramientas::getX('CODEMP','Nphojint','Nomemp',self::getCodemp());
    }

   public function getLongitud()
   {
     return strlen(H::getObtener_FormatoCategoria_Formulacion());
   }

   public function setLongitud()
   {
     return $this->longitud;
   }

   public function getMascara()
   {
     return H::getObtener_FormatoCategoria_Formulacion();
   }

   public function setMascara()
   {
     return $this->mascara;
   }
}

<?php

/**
 * Subclase para representar una fila de la tabla 'forasounicat'.
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
class Forasounicat extends BaseForasounicat
{
    protected $longitud="";
    protected $mascara="";
    protected $obj=array();

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

    public function getNomcat()
    {
      return Herramientas::getX('CODCAT','Fordefcatpre','Nomcat',self::getCodcat());
    }

    public function getNomuni()
    {
      return Herramientas::getX('CODUNI','Fordefunieje','Nomuni',self::getCoduni());
    }
}

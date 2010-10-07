<?php

/**
 * Subclase para representar una fila de la tabla 'forasoproobj'.
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
class Forasoproobj extends BaseForasoproobj
{
    protected $longitud="";
    protected $mascara="";

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

    public function getDesobj()
    {
      return Herramientas::getX('CODOBJ','Fordefobj','Desobj',self::getCodobj());
    }

    public function getNompro()
    {
      return Herramientas::getX('CODPRO','Fordefproble','Nompro',self::getCodpro());
    }
}

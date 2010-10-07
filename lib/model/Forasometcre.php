<?php

/**
 * Subclass for representing a row from the 'forasometcre'.
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
class Forasometcre extends BaseForasometcre
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

    public function getDesmet()
    {
      return Herramientas::getX('CODMET','Fordefmet','Desmet',self::getCodmet());
    }
}

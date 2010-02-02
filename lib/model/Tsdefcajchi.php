<?php

/**
 * Subclase para representar una fila de la tabla 'tsdefcajchi'.
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
class Tsdefcajchi extends BaseTsdefcajchi
{

   protected $longitud="";

   public function getLongitud()
   {
     return strlen(Herramientas::getObtener_FormatoCategoria());
   }

   public function setLongitud()
   {
     return $this->longitud;
   }


    public function getNomcat()
    {
        return Herramientas::getX('codcat','Npcatpre','nomcat',self::getCodcat());
    }

    public function getNomben()
    {
        return Herramientas::getX('cedrif','Opbenefi','nomben',self::getCedrif());
    }

    public function getNomcue()
    {
        return Herramientas::getX('numcue','Tsdefban','nomcue',self::getNumcue());
    }

    public function getDestip()
    {
        return Herramientas::getX('codtip','Tstipmov','destip',self::getCodtip());
    }

    public function getNomext()
    {
        return Herramientas::getX('tipcau','Cpdoccau','nomext',self::getTipcau());
    }

}

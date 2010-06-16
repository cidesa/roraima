<?php

/**
 * Subclase para representar una fila de la tabla 'caunifor'.
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
class Caunifor extends BaseCaunifor
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

}

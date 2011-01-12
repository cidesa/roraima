<?php

/**
 * Subclase para representar una fila de la tabla 'forconcar'.
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
class Forconcar extends BaseForconcar
{
    protected $check="";
    protected $obj=array();
    protected $longitud="";


   public function getLongitud()
   {
     return strlen(Herramientas::ObtenerFormato('Npdefgen','Forcar'));
   }

   public function setLongitud()
   {
     return $this->longitud;
   }

    public function getNomcar()
    {
        return Herramientas::getX('codcar','Npcargos','nomcar',self::getCodcar());
    }

    public function getNomcon()
    {
        return Herramientas::getX('codcon','Npdefcpt','nomcon',self::getCodcon());
    }
}

<?php

/**
 * Subclase para representar una fila de la tabla 'npcatnomemp'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npcatnomemp extends BaseNpcatnomemp
{
    protected $longitud="";
    protected $mascara="";
    protected $obj1=array();
    protected $obj2=array();
    protected $anadir="";
    protected $conceptos="";
    protected $fila="";

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

   public function getNomemp()
   {
      return Herramientas::getX('CODEMP','Nphojint','Nomemp',self::getCodemp());
   }

   public function getNomcar()
   {
      return Herramientas::getX('CODCAR','Npcargos','Nomcar',self::getCodcar());
   }
}


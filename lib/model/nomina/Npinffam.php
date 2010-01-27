<?php

/**
 * Subclase para representar una fila de la tabla 'npinffam'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npinffam extends BaseNpinffam
{
	protected $edafamact=0;
	protected $seghcm=0;

 public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
	  if($this->seghcm == 'S' || $this->seghcm == 1)
	    $this->seghcm='S';
	  else
	  	$this->seghcm=0;
		
      if (self::getFecNac())
      {
	      $sql = "select  Extract(year from age(now(),'" . self::getFecNac() . "')) as edad";
		  if (Herramientas :: BuscarDatos($sql, & $result))
				$this->edafamact=$result[0]['edad'];
      }
   }

   public function getNomgua()
    {
      return Herramientas::getX('codcon','Npguarde','nomgua',self::getCodgua());
    }
}

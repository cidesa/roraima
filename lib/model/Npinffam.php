<?php

/**
 * Subclass for representing a row from the 'npinffam' table.
 *
 *
 *
 * @package lib.model
 */
class Npinffam extends BaseNpinffam
{
	protected $edafamact=0;

 public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      if (self::getFecNac())
      {
	      $sql = "select  Extract(year from age(now(),'" . self::getFecNac() . "')) as edad";
		  if (Herramientas :: BuscarDatos($sql, & $result))
				$this->edafamact=$result[0]['edad'];
      }
   }
}

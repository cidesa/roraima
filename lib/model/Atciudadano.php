<?php

/**
 * Subclass for representing a row from the 'atciudadano' table.
 *
 *
 *
 * @package lib.model
 */
class Atciudadano extends BaseAtciudadano
{
  protected $municipios = array();
  protected $parroquias = array();
  protected $cedsol = '';
  protected $nomsol = '';
  protected $cedben = '';
  protected $nomben = '';
  protected $edaact = '';  

  public function afterHydrate()
  {
    $this->cedsol = $this->getCedciu();
    $this->nomsol = $this->getNomciu().' '.$this->getApeciu();
    $this->cedben = $this->getCedciu();
    $this->nomben = $this->getNomciu().' '.$this->getApeciu();

		$sql = "select  Extract(year from age(now(),'" . self::getFecnac() . "')) as edad";
		if (Herramientas :: BuscarDatos($sql, & $result))
			$this->edaact = $result[0]['edad'];
		else
		  $this->edaact = 0;

  }

  public function __toString()
  {
    return $this->getNomciu().' '.$this->getApeciu();
  }
    

}

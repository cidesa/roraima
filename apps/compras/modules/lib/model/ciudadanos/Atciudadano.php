<?php

/**
 * Subclase para representar una fila de la tabla 'atciudadano'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.ciudadanos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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

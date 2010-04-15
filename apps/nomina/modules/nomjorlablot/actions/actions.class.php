<?php

/**
 * nomjorlablot actions.
 *
 * @package    Roraima
 * @subpackage nomjorlablot
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomjorlablotActions extends autonomjorlablotActions
{
	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	{
				
		parent::executeEdit();
	}
	
  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpdefjorlabFromRequest()
  {
    $npdefjorlab = $this->getRequestParameter('npdefjorlab');

    if (isset($npdefjorlab['codnom']))
    {
      $this->npdefjorlab->setCodnom($npdefjorlab['codnom']);
    }
    if (isset($npdefjorlab['idejor']))
    {
      $this->npdefjorlab->setIdejor($npdefjorlab['idejor']);
    }
    if (isset($npdefjorlab['lunes']))
    {
    	$this->npdefjorlab->setLunes('2');
    }else $this->npdefjorlab->setLunes(null);
    if (isset($npdefjorlab['martes']))
    {
      $this->npdefjorlab->setMartes('3');
    }else $this->npdefjorlab->setMartes(null);
    if (isset($npdefjorlab['miercoles']))
    {
      $this->npdefjorlab->setMiercoles('4');
    }else $this->npdefjorlab->setMiercoles(null);
    if (isset($npdefjorlab['jueves']))
    {
      $this->npdefjorlab->setJueves('5');
    }else $this->npdefjorlab->setJueves(null);
    if (isset($npdefjorlab['viernes']))
    {
      $this->npdefjorlab->setViernes('6');
    }else $this->npdefjorlab->setViernes(null);
    if (isset($npdefjorlab['sabado']))
    {
      $this->npdefjorlab->setSabado('7');
    }else $this->npdefjorlab->setSabado(null);
    if (isset($npdefjorlab['domingo']))
    {
      $this->npdefjorlab->setDomingo('1');
    }else $this->npdefjorlab->setDomingo(null);
  }
	
}

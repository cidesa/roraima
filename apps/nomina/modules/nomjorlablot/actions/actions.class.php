<?php

/**
 * nomjorlablot actions.
 *
 * @package    siga
 * @subpackage nomjorlablot
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomjorlablotActions extends autonomjorlablotActions
{
	public function executeEdit()
	{
				
		parent::executeEdit();
	}
	
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

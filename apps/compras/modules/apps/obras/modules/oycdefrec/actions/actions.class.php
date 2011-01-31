<?php

/**
 * oycdefrec actions.
 *
 * @package    Roraima
 * @subpackage oycdefrec
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycdefrecActions extends autooycdefrecActions
{

  protected function deleteCarecaud($carecaud)
  {
  	$resp = Obras::eliminarCarecaud($carecaud);
    if($resp==-1){
      $this->coderror = $resp;
      $err = Herramientas::obtenerMensajeError($this->coderror);
      $this->getRequest()->setError('',$err);
    }

  }

  /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveCarecaud($carecaud)
  {
	$carecaud->save();
  }

  protected function getCarecaudOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $carecaud = new Carecaud();

    }
    else
    {
      $carecaud = CarecaudPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($carecaud);
    }

    return $carecaud;
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCarecaudFromRequest()
  {
    $carecaud = $this->getRequestParameter('carecaud');

    if (isset($carecaud['codrec']))
    {
      $this->carecaud->setCodrec($carecaud['codrec']);
    }
    if (isset($carecaud['desrec']))
    {
      $this->carecaud->setDesrec($carecaud['desrec']);
    }
    if (isset($carecaud['limrec']))
    {
      $this->carecaud->setLimrec($carecaud['limrec']);
    }
    if (isset($carecaud['canutr']))
    {
      $this->carecaud->setCanutr($carecaud['canutr']);
    }
    if (isset($carecaud['codtiprec']))
    {
      $this->carecaud->setCodtiprec($carecaud['codtiprec']);
    }
    if (isset($carecaud['destiprec']))
    {
      $this->carecaud->setDestiprec($carecaud['destiprec']);
    }
  }

    /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
	  		$dato=CatiprecPeer::getDestip($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
	    }

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}


}

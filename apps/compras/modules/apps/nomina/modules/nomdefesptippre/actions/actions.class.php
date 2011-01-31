<?php

/**
 * nomdefesptippre actions.
 *
 * @package    Roraima
 * @subpackage nomdefesptippre
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefesptippreActions extends autonomdefesptippreActions
{


  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->nptippre = $this->getNptippreOrCreate();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNptippreFromRequest();

      $this->saveNptippre($this->nptippre);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefesptippre/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefesptippre/list');
      }
      else
      {
        return $this->redirect('nomdefesptippre/edit?id='.$this->nptippre->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
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

	  		$dato=Herramientas::getX('codcon','Npdefcpt','nomcon',strtoupper($this->getRequestParameter('codcon')));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}



  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNptippreFromRequest()
  {
    $nptippre = $this->getRequestParameter('nptippre');

    if (isset($nptippre['codcon']))
    {
      $this->nptippre->setCodcon(str_pad($nptippre['codcon'],3,'0',STR_PAD_LEFT));
    }
    if (isset($nptippre['tippre']))
    {
      $this->nptippre->setTippre($nptippre['tippre']);
    }
    if (isset($nptippre['codtippre']))
    {
      $this->nptippre->setCodtippre(str_pad($nptippre['codtippre'],4,'0',STR_PAD_LEFT));
    }
    if (isset($nptippre['destippre']))
    {
      $this->nptippre->setDestippre($nptippre['destippre']);
    }
  }

}

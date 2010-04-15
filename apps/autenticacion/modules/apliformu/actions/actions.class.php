<?php

/**
 * apliformu actions.
 *
 * @package    Roraima
 * @subpackage apliformu
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class apliformuActions extends autoapliformuActions
{
  public function CargarModulos()
  {
    $c = new Criteria();
    $lista_mod = AplicacionPeer::doSelect($c);

    $modulos = array();

    foreach($lista_mod as $obj_mod)
    {
      $modulos += array($obj_mod->getCodapl() => $obj_mod->getNomapl());
    }
    return $modulos;
  }

  public function CargarDivisiones()
  {
    $c = new Criteria();
    $lista_div = DivisionPeer::doSelect($c);

    $divisiones = array();

    foreach($lista_div as $obj_div)
    {
      $divisiones += array($obj_div->getCoddiv() => $obj_div->getdesdiv());
    }
    return $divisiones;
  }

    /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->aplifor = $this->getApliforOrCreate();
    $this->listaapli=$this->CargarModulos();
    $this->listadiv=$this->CargarDivisiones();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateApliforFromRequest();

      $this->saveAplifor($this->aplifor);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('apliformu/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('apliformu/list');
      }
      else
      {
        return $this->redirect('apliformu/edit?id='.$this->aplifor->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

    /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateApliforFromRequest()
  {
    $aplifor = $this->getRequestParameter('aplifor');
    $this->listaapli=$this->CargarModulos();
    $this->listadiv=$this->CargarDivisiones();

    if (isset($aplifor['codapl']))
    {
      $this->aplifor->setCodapl($aplifor['codapl']);
    }
    if (isset($aplifor['coddiv']))
    {
      $this->aplifor->setCoddiv($aplifor['coddiv']);
    }
    if (isset($aplifor['desopc']))
    {
      $this->aplifor->setDesopc($aplifor['desopc']);
    }
    if (isset($aplifor['nomopc']))
    {
      $this->aplifor->setNomopc($aplifor['nomopc']);
    }
  }
}

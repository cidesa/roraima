<?php

/**
 * apliformu actions.
 *
 * @package    siga
 * @subpackage apliformu
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
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

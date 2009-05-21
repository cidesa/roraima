<?php

/**
 * almtiprecpro actions.
 *
 * @package    siga
 * @subpackage almtiprecpro
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almtiprecproActions extends autoalmtiprecproActions
{
  private $coderror = -1;

  public function validateEdit()
  {
    $resp=-1;

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
       $this->catiprec = $this->getCatiprecOrCreate();
       $catiprec = $this->getRequestParameter('catiprec');
       $valor = $catiprec['codtiprec'];
       $campo='codtiprec';
       $resp=Herramientas::ValidarCodigo($valor,$this->catiprec,$campo);
      if($resp!=-1)
      {
        $this->coderror = $resp;
        return false;
      } else return true;
    }else return true;
 }

 public function handleErrorEdit()
  {
    $this->labels = $this->getLabels();

    $this->catiprec = $this->getCatiprecOrCreate();
    $this->updateCatiprecFromRequest();


    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1)
      {
        $err = Herramientas::obtenerMensajeError($this->coderror);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;

  }

  public function executeDelete()
  {
    $this->catiprec = CatiprecPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->catiprec);

    try
    {
      $c= new Criteria();
      $c->add(CarecaudPeer::CODTIPREC,$this->catiprec->getCodtiprec());
      $datos= CarecaudPeer::doSelect($c);
      if (!$datos)
     {
      $this->deleteCatiprec($this->catiprec);
      $this->Bitacora('Elimino');
     }
     else
     {
       $this->getRequest()->setError('delete', 'Could not delete the selected Catiprec. Make sure it does not have any associated items.');
      return $this->forward('almtiprecpro', 'list');
     }

    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Catiprec. Make sure it does not have any associated items.');
      return $this->forward('almtiprecpro', 'list');
    }

    return $this->redirect('almtiprecpro/list');
  }

}

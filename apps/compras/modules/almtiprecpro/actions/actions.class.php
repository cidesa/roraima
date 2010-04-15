<?php

/**
 * almtiprecpro actions.
 *
 * @package    Roraima
 * @subpackage almtiprecpro
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almtiprecproActions extends autoalmtiprecproActions
{
  private $coderror = -1;

  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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

 /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
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

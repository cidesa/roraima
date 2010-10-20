<?php

/**
 * camigtxtvenalm actions.
 *
 * @package    siga
 * @subpackage camigtxtvenalm
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class camigtxtvenalmActions extends autocamigtxtvenalmActions
{

  public function executeIndex()
  {
    return $this->forward('camigtxtvenalm', 'edit');
  }

  public function editing()
  {

  }

  /**
   * FunciÃ³n principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->camigtxtven = $this->getCamigtxtvenOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCamigtxtvenFromRequest();

      if($this->saveCamigtxtven($this->camigtxtven) ==-1){
        {
          if ($this->cad=="")
             $this->setFlash('notice', 'Archivo fue Migrado Satisfactoriamente.');
          else $this->setFlash('notice', 'Archivo fue Migrado Parcialmente. Los Siguientes ArtÃ­culos no poseen equivalencia: '.$this->cad);

         $id= $this->camigtxtven->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('camigtxtvenalm/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('camigtxtvenalm/list');
        }
        else
        {
            return $this->redirect('camigtxtvenalm/edit?id='.$this->camigtxtven->getId());
        }

      }else{
        $this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    switch ($ajax){
      case '1':
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }


  /**
   *
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;
    if($this->getRequest()->getMethod() == sfRequest::POST){
      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }

  protected function updateError()
  {
    $this->cad="";
    return true;
  }

  public function saving($clasemodelo)
  {
    $error=Compras::MigrarVentas($clasemodelo,&$cadena);
    $this->cad=$cadena;
    return $error;
  }


}

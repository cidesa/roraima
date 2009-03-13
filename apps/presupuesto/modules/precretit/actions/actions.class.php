<?php

/**
 * precretit actions.
 *
 * @package    siga
 * @subpackage precretit
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class precretitActions extends autoprecretitActions
{

  public function executeIndex()
  {
    return $this->forward('precretit', 'create');
  }

  public function executeList()
  {
    return $this->redirect('precretit', 'create');
  }

  public function executeDelete()
  {
    return $this->redirect('precretit', 'create');
  }


  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {


  }



  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->cpdeftit = $this->getCpdeftitOrCreate();
      $this->updateCpdeftitFromRequest();

      $this->coderr = Presupuesto::validarPrecretit($this->cpdeftit);

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($cpdeftit)
  {
    return Presupuesto::salvarPrecretit($cpdeftit);
  }

  public function deleting($clasemodelo)
  {
    return -1;
  }


}

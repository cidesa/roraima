<?php

/**
 * docrutv2 actions.
 *
 * @package    siga
 * @subpackage docrutv2
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class docrutv2Actions extends autodocrutv2Actions
{

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    // pager
    $this->pager = new sfPropelPager('Dftabtip', 10);
    $c = new Criteria();

    $c->addJoin(DftabtipPeer::ID, DfrutadocPeer::ID_DFTABTIP );
    $c->setDistinct();
    //$c->addGroupByColumn(DfrutadocPeer::ID);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {

    $this->configGrid();

  }

  public function configGrid()
  {

    $c = new Criteria();
    $c->add(DfrutadocPeer::ID_DFTABTIP ,$this->dftabtip->getId());
    $reg = DfrutadocPeer::doSelect($c);

    $this->obj = Herramientas::getConfigGrid('grid_dfrutadoc',$reg);

    $this->params['grid'] = $this->obj;

    $tablas = array();

    $c = new Criteria();
    $dftabtip = DftabtipPeer::doSelect($c);

    foreach($dftabtip as $tabtip){
      $tablas[$tabtip->getId()] = $tabtip->__toString();
    }

    $this->params['tablas'] = $tablas;

  }

  public function executeAjax()
  {

  }


  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->params=array();
      $this->dftabtip = $this->getDftabtipOrCreate();
      $this->updateDftabtipFromRequest();

      $this->configGrid();
      $this->grid = Herramientas::CargarDatosGridv2($this,$this->obj);

      $this->coderr = Documentos::validarDocrutv2($this->dftabtip,$this->grid);

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
    $this->params=array();
    $this->dftabtip = $this->getDftabtipOrCreate();

    $this->configGrid();

  }

  public function saving($clasemodelo)
  {
    $this->params=array();
    $this->dftabtip = $this->getDftabtipOrCreate();
    $this->updateDftabtipFromRequest();

    $this->configGrid();
    $this->grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    $this->coderr = Documentos::salvarDocrutv2($this->dftabtip,$this->grid);
    

    return $this->coderr;
    //return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}

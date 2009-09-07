<?php

/**
 * generales actions.
 *
 * @package    Roraima
 * @subpackage generales
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * @version    SVN: $Id$
 */
class generalesActions extends sfActions
{

  public function executeLogin()
  {


  }

  public function executeCatalogo()
  {

    $clase = $this->getRequestParameter('clase');
    if($clase)
    {
      $c = new Criteria();
      $this->registros = array();
      $this->campos = array();
      $this->columnas = array();
      $this->tabla = '';
      $str = '$this->registros = '.ucfirst(strtolower($clase)).'Peer::doSelect($c);';
      eval($str);
      $str = '$this->campos = '.ucfirst(strtolower($clase)).'Peer::getArrayFieldsNames();';
      eval($str);
      $str = '$this->tabla = ucfirst(strtolower('.$clase.'Peer::TABLE_NAME));';
      eval($str);
      $str = '$this->columnas = '.ucfirst(strtolower($clase)).'Peer::getColumsNames();';
      eval($str);

      /*

      $this->processSort();
      $this->processFilters();
    $this->setVars();
      $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/caregart/filters');

      // pager
      $this->pager = new sfPropelPager('Caregart', 100);
      $c = new Criteria();
      $this->addSortCriteria($c);
      $this->addFiltersCriteria($c);
      $this->pager->setCriteria($c);
      $this->pager->setPage($this->getRequestParameter('page', 1));
      $this->pager->init();

    */

    }
    else return sfView::SUCCESS;


  }

  public function executeAutocomplete()
  {
  $fieldwhere = $this->getRequestParameter('fieldwhere','');
  $table = $this->getRequestParameter('table','');
  $fieldget = $this->getRequestParameter('fieldget','');
  $val = $this->getRequestParameter('val','');
  $val = $this->getRequestParameter($val,'');

  $this->tags=Herramientas::autocompleteAjax($fieldwhere,$table,$fieldget,$val);
  }

// Acciones de errores de autenticación

  public function executeRouting()
  {

  }

  public function executeError404()
  {

  }

  public function executeNologin()
  {
    $this->getUser()->setAttribute('urlreferente',$this->getRequest()->getUri());
  }

  public function executeNocredentials()
  {

  }


}

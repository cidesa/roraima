<?php

/**
 * fordefobjmet actions.
 *
 * @package    siga
 * @subpackage fordefobjmet
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class fordefobjmetActions extends autofordefobjmetActions
{
  /**
   * FunciÃ³n principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/forasometobj/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Forasometobj', 15);
    $c = new Criteria();

    $c->addSelectColumn(ForasometobjPeer::CODOBJ);
    $c->addSelectColumn("'' AS CODMET");
    $c->addSelectColumn("max(ID) AS ID");

    $c->addGroupByColumn(ForasometobjPeer::CODOBJ);

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
    $this->configGridMetas($this->forasometobj->getCodobj());
  }

   public function configGridMetas($codobj='')
  {
    $c = new Criteria();
    $c->add(ForasometobjPeer::CODOBJ,$codobj);
    $metas = ForasometobjPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/fordefobjmet/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_metas');

    $this->obj =$this->columnas[0]->getConfig($metas);

    $this->forasometobj->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $ajax = $this->getRequestParameter('ajax','');
    $javascript=""; $dato="";

    switch ($ajax){
      case '1':
         $u= new Criteria();
         $u->add(FordefobjPeer::CODOBJ,$codigo);
         $result= FordefobjPeer::doSelectOne($u);
         if ($result)
         {
           $dato=$result->getDesobj();
         }else $javascript="alert_('El Objetivo no Existe'); $('forasometobj_codobj').value=''; $('forasometobj_codobj').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      case '2':
         $u= new Criteria();
         $u->add(FordefmetPeer::CODMET,$codigo);
         $result= FordefmetPeer::doSelectOne($u);
         if ($result)
         {
             $dato=$result->getDesmet();
             $javascript="validarmetarepetida('".$cajtexcom."')";
         }else $javascript="alert_('La Acci&oacute;n no Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
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

        $this->forasometobj = $this->getForasometobjOrCreate();
        $this->updateForasometobjFromRequest();
        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

        if ($this->forasometobj->getId()==''){
            $o= new Criteria();
            $o->add(ForasometobjPeer::CODOBJ,$this->getRequestParameter('forasometobj[codobj]'));
            $result=ForasometobjPeer::doSelect($o);
            if ($result)
                $this->coderr=324;

            if (count($grid[0])==0)
                $this->coderr=323;
        }

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * FunciÃ³n para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Formulacion::grabarMetasObjetivos($clasemodelo,$grid);

    return -1;
  }

  public function deleting($clasemodelo)
  {
    Herramientas::EliminarRegistro('Forasometobj','Codobj',$clasemodelo->getCodobj());
    return -1;
  }


}

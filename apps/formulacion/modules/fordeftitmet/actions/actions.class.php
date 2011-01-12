<?php

/**
 * fordeftitmet actions.
 *
 * @package    siga
 * @subpackage fordeftitmet
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class fordeftitmetActions extends autofordeftitmetActions
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/forasometcre/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Forasometcre', 15);
    $c = new Criteria();

    $c->addSelectColumn(ForasometcrePeer::CODCAT);
    $c->addSelectColumn("'' AS CODMET");
    $c->addSelectColumn("max(ID) AS ID");

    $c->addGroupByColumn(ForasometcrePeer::CODCAT);

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
    $this->configGridMetas($this->forasometcre->getCodcat());
  }

   public function configGridMetas($codcat='')
  {
    $c = new Criteria();
    $c->add(ForasometcrePeer::CODCAT,$codcat);
    $metas = ForasometcrePeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/fordeftitmet/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_metas');

    $this->obj =$this->columnas[0]->getConfig($metas);

    $this->forasometcre->setObj($this->obj);
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
         $longitud = $this->getRequestParameter('longitud');
         $u= new Criteria();
         $u->add(FordefcatprePeer::CODCAT,$codigo);
         $result= FordefcatprePeer::doSelectOne($u);
         if ($result)
         {
            if ($longitud==strlen($codigo)){
             $dato=$result->getNomcat();
            }else $javascript="alert_('La Categoria Program&aacute;tica no es de Ultimo Nivel'); $('forasometcre_codcat').value=''; $('forasometcre_codcat').focus();";
         }else $javascript="alert_('La Categoria Program&aacute;tica no Existe'); $('forasometcre_codcat').value=''; $('forasometcre_codcat').focus();";

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

        $this->forasometcre = $this->getForasometcreOrCreate();
        $this->updateForasometcreFromRequest();
        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

        if ($this->forasometcre->getId()==''){
            $o= new Criteria();
            $o->add(ForasometcrePeer::CODCAT,$this->getRequestParameter('forasometcre[codcat]'));
            $result=ForasometcrePeer::doSelect($o);
            if ($result)
                $this->coderr=325;

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
    Formulacion::grabarMetasCategorias($clasemodelo,$grid);

    return -1;
  }

  public function deleting($clasemodelo)
  {
    Herramientas::EliminarRegistro('Forasometcre','Codcat',$clasemodelo->getCodcat());
    return -1;
  }

/**
   * FunciÃ³n principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->forasometcre = $this->getForasometcreOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateForasometcreFromRequest();

      if($this->saveForasometcre($this->forasometcre) ==-1){
        {$this->setFlash('notice', 'Your modifications have been saved');

         $id= $this->forasometcre->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('fordeftitmet/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('fordeftitmet/list');
        }
        else
        {
            return $this->redirect('fordeftitmet/edit');
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


}

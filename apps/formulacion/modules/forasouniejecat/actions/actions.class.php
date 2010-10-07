<?php

/**
 * forasouniejecat actions.
 *
 * @package    siga
 * @subpackage forasouniejecat
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class forasouniejecatActions extends autoforasouniejecatActions
{

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/forasounicat/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Forasounicat', 15);
    $c = new Criteria();
   
    $c->addSelectColumn(ForasounicatPeer::CODCAT);
    $c->addSelectColumn("'' AS CODUNI");
    $c->addSelectColumn("max(ID) AS ID");

    $c->addGroupByColumn(ForasounicatPeer::CODCAT);

    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid()
  {
    $this->configGridUnidades($this->forasounicat->getCodcat());
  }

   public function configGridUnidades($codcat='')
  {
    $c = new Criteria();
    $c->add(ForasounicatPeer::CODCAT,$codcat);
    $unidades = ForasounicatPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/forasouniejecat/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_unidades');

    $this->obj =$this->columnas[0]->getConfig($unidades);

    $this->forasounicat->setObj($this->obj);
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
            }else $javascript="alert_('La Categoria Program&aacute;tica no es de Ultimo Nivel'); $('forasounicat_codcat').value=''; $('forasounicat_codcat').focus();";
         }else $javascript="alert_('La Categoria Program&aacute;tica no Existe'); $('forasounicat_codcat').value=''; $('forasounicat_codcat').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      case '2':
         $u= new Criteria();
         $u->add(FordefuniejePeer::CODUNI,$codigo);
         $result= FordefuniejePeer::doSelectOne($u);
         if ($result)
         {
             $dato=$result->getNomuni();
             $javascript="validarrepetido('".$cajtexcom."')";
         }else $javascript="alert_('La Unidad Ejecutora no Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";

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
        $this->forasounicat = $this->getForasounicatOrCreate();
        $this->updateForasounicatFromRequest();
        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

        if ($this->forasounicat->getId()==''){
            $o= new Criteria();
            $o->add(ForasounicatPeer::CODCAT,$this->getRequestParameter('forasounicat[codcat]'));
            $result=ForasounicatPeer::doSelect($o);
            if ($result)
                $this->coderr=321;

            if (count($grid[0])==0)
                $this->coderr=320;
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
    Formulacion::grabarCategoriaUnidades($clasemodelo,$grid);

    return -1;
  }

  public function deleting($clasemodelo)
  {
    Herramientas::EliminarRegistro('Forasounicat','Codcat',$clasemodelo->getCodcat());
    return -1;
  }


}
